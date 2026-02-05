<?php
require_once __DIR__ . '/../config/bootstrap.php';

use Services\Mailer;

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        $error = "Session invalide, veuillez recharger la page.";
    } else {
        $email = trim($_POST['email'] ?? '');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Format d'email invalide.";
        } else {
            // Requête pour voir si utilisateur existe
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = :email AND actif = 1");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user) {
                // Génération token
                $token = bin2hex(random_bytes(32));
                $tokenHash = hash('sha256', $token);
                $expireLe = date('Y-m-d H:i:s', time() + 1800); // +30min

                // Supprimer anciens tokens
                $del = $pdo->prepare("DELETE FROM reinitialisations_mdp WHERE utilisateur_id = :uid");
                $del->execute(['uid' => $user['id']]);

                // Insérer nouveau token
                $ins = $pdo->prepare("INSERT INTO reinitialisations_mdp (utilisateur_id, jeton_hash, expire_le, date_creation) VALUES (:uid, :hash, :expire, NOW())");
                $ins->execute([
                    'uid' => $user['id'],
                    'hash' => $tokenHash,
                    'expire' => $expireLe
                ]);

                // Préparer lien
                // En dev/prod, on essaie de détecter le host
                $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
                $host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
                $link = "$scheme://$host/reset-mot-de-passe.php?token=$token";

                $html = "
                <h1>Réinitialisation de mot de passe</h1>
                <p>Cliquez sur le lien ci-dessous pour changer votre mot de passe :</p>
                <p><a href=\"$link\">$link</a></p>
                <p>Ce lien expire dans 30 minutes.</p>
                ";

                Mailer::sendMail($email, "Réinitialisation mot de passe - La Réserve", $html, "Lien : $link");
            }

            // Message générique
            $message = "Si cette adresse est enregistrée associée à un compte actif, vous recevrez un email avec les instructions.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - La Réserve</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 20px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .success {
            color: green;
            margin-bottom: 20px;
            font-weight: bold;
            background: #e8f5e9;
            padding: 10px;
            border-radius: 4px;
        }

        .error {
            color: red;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <div class="container">
        <h1>Mot de passe oublié ?</h1>

        <?php if ($message): ?>
            <div class="success">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">

            <div class="form-group">
                <label for="email">Entrez votre adresse email</label>
                <input type="email" id="email" name="email" required placeholder="exemple@email.com">
            </div>

            <button type="submit" class="btn">Envoyer le lien</button>
        </form>
        <p><a href="login.php">Retour à la connexion</a></p>
    </div>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>