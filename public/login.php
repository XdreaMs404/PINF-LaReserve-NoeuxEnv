<?php
require_once __DIR__ . '/../config/bootstrap.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic CSRF Check
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        $error = "Session invalide, veuillez recharger la page.";
    } else {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Format d'email invalide.";
        } else {
            if (Auth::login($email, $password)) {

                // Redirection selon le rôle
                if (Auth::hasRole('lecteur')) { // "lecteur" ou mieux accède à l'admin
                    header('Location: admin/index.php');
                } else {
                    header('Location: index.php');
                }
                exit;
            } else {
                $error = "Identifiants incorrects.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - La Réserve</title>
    <!-- Réutilisation du CSS existant (chemin relatif adapté si besoin) -->
    <link rel="stylesheet" href="/reserve/css/style.css">
    <style>
        /* Styles spécifiques pour le login si CSS existant ne suffit pas */
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; // Si disponible ?>

    <div class="login-container">
        <h1>Connexion</h1>

        <?php if (isset($_GET['reset']) && $_GET['reset'] === 'success'): ?>
            <div style="color: green; margin-bottom: 15px;">
                Votre mot de passe a été mis à jour avec succès. Vous pouvez vous connecter.
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post" action="">
            <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div style="margin-bottom: 15px; text-align: right;">
                <a href="mot-de-passe-oublie.php">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn">Se connecter</button>
        </form>
    </div>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>