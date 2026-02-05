<?php
// public/admin/utilisateurs/ajouter.php
require_once __DIR__ . '/../../../config/bootstrap.php';

Auth::requireRole('administrateur');

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification CSRF
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF - Veuillez réessayer.");
    }

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'utilisateur';
    $actif = isset($_POST['actif']) ? 1 : 0;

    // Validation simple
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email invalide.";
    } elseif (strlen($password) < 8) {
        $error = "Le mot de passe doit faire au moins 8 caractères.";
    } else {
        $pdo = Database::getConnection();
        // Vérifier unicité email
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            $error = "Cet email est déjà utilisé.";
        } else {
            // Insertion
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (email, mot_de_passe_hash, role, actif, date_creation, date_modification) VALUES (:email, :hash, :role, :actif, NOW(), NOW())");
            try {
                $stmt->execute([
                    ':email' => $email,
                    ':hash' => $hash,
                    ':role' => $role,
                    ':actif' => $actif
                ]);
                header('Location: index.php?msg=Utilisateur ajouté avec succès');
                exit;
            } catch (PDOException $e) {
                $error = "Erreur lors de l'ajout : " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur - Admin</title>
    <link rel="stylesheet" href="/reserve/css/style.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-secondary {
            background: #6c757d;
            text-decoration: none;
            display: inline-block;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Ajouter un utilisateur</h1>

        <?php if ($error): ?>
            <div class="alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe (min 8 car.)</label>
                <input type="password" name="password" id="password" required minlength="8">
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select name="role" id="role">
                    <option value="utilisateur">Utilisateur</option>
                    <option value="lecteur">Lecteur</option>
                    <option value="redacteur">Rédacteur</option>
                    <option value="administrateur">Administrateur</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="actif" checked> Compte actif
                </label>
                <small style="color: #666; display: block; margin-top: 5px;">Décochez pour empêcher l'utilisateur de se
                    connecter sans supprimer son compte.</small>
            </div>

            <button type="submit" class="btn">Créer l'utilisateur</button>
            <a href="index.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>

</html>