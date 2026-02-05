<?php
require_once __DIR__ . '/../config/bootstrap.php';

$error = '';
$success = '';
$token = $_GET['token'] ?? '';

// Vérification préliminaire du token (format)
if (empty($token) || strlen($token) % 2 !== 0) {
    die("Token invalide ou manquant.");
}

$tokenHash = hash('sha256', $token);

// Vérifier validité token
$pdo = Database::getConnection();
$stmt = $pdo->prepare("
    SELECT * FROM reinitialisations_mdp 
    WHERE jeton_hash = :hash 
    AND utilise_le IS NULL 
    AND expire_le > NOW() 
    LIMIT 1
");
$stmt->execute(['hash' => $tokenHash]);
$resetRequest = $stmt->fetch();

if (!$resetRequest) {
    die("Ce lien de réinitialisation est invalide ou a expiré.");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        $error = "Session expirée, réessayez.";
    } else {
        $pass1 = $_POST['password'] ?? '';
        $pass2 = $_POST['password_confirm'] ?? '';

        if (strlen($pass1) < 8) {
            $error = "Le mot de passe doit faire au moins 8 caractères.";
        } elseif ($pass1 !== $pass2) {
            $error = "Les mots de passe ne correspondent pas.";
        } else {
            // Hashage et Update
            $newHash = password_hash($pass1, PASSWORD_DEFAULT);

            // Mise à jour utilisateur
            // On récupère l'user ID depuis la demande de reset
            $updUser = $pdo->prepare("UPDATE utilisateurs SET mot_de_passe_hash = :hash WHERE id = :id");
            $updUser->execute([
                'hash' => $newHash,
                'id' => $resetRequest['utilisateur_id']
            ]);

            // Marquer token comme utilisé
            $updToken = $pdo->prepare("UPDATE reinitialisations_mdp SET utilise_le = NOW() WHERE jeton_hash = :hash");
            $updToken->execute(['hash' => $tokenHash]);

            // Redirection vers login
            header('Location: login.php?reset=success');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mot de passe - La Réserve</title>
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

        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <div class="container">
        <h1>Nouveau mot de passe</h1>

        <?php if ($error): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">

            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="password" required minlength="8">
            </div>

            <div class="form-group">
                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" id="password_confirm" name="password_confirm" required minlength="8">
            </div>

            <button type="submit" class="btn">Enregistrer</button>
        </form>
    </div>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>