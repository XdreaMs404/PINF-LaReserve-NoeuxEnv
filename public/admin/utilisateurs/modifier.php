<?php
// public/admin/utilisateurs/modifier.php
require_once __DIR__ . '/../../../config/bootstrap.php';

Auth::requireRole('administrateur');

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$pdo = Database::getConnection();
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("Utilisateur introuvable.");
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification CSRF
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF - Veuillez réessayer.");
    }

    $role = $_POST['role'] ?? 'utilisateur';
    $actif = isset($_POST['actif']) ? 1 : 0;

    // Gestion du changement de mot de passe (optionnel)
    $newPassword = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    $updatePassword = false;
    $passwordHash = $user['mot_de_passe_hash'];

    if (!empty($newPassword)) {
        if ($newPassword !== $confirmPassword) {
            $error = "Les mots de passe ne correspondent pas.";
        } elseif (strlen($newPassword) < 8) {
            $error = "Le mot de passe doit faire au moins 8 caractères.";
        } else {
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatePassword = true;
        }
    }

    if (!$error) {
        // Mise à jour
        $sql = "UPDATE utilisateurs SET role = :role, actif = :actif, date_modification = NOW()";
        $params = [
            ':role' => $role,
            ':actif' => $actif,
            ':id' => $id
        ];

        if ($updatePassword) {
            $sql .= ", mot_de_passe_hash = :hash";
            $params[':hash'] = $passwordHash;
        }

        $sql .= " WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute($params);
            header('Location: index.php?msg=Utilisateur modifié avec succès');
            exit;
        } catch (PDOException $e) {
            $error = "Erreur lors de la modification : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un utilisateur - Admin</title>
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
            background: #ffc107;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 10px 15px;
            border-radius: 4px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }

        .readonly {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        legend {
            padding: 0 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Modifier un utilisateur</h1>

        <?php if ($error): ?>
            <div class="alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">

            <div class="form-group">
                <label>Email</label>
                <input type="email" value="<?= htmlspecialchars($user['email']) ?>" class="readonly" readonly disabled>
                <small>L'email ne peut pas être modifié.</small>
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select name="role" id="role">
                    <option value="utilisateur" <?= $user['role'] === 'utilisateur' ? 'selected' : '' ?>>Utilisateur
                    </option>
                    <option value="lecteur" <?= $user['role'] === 'lecteur' ? 'selected' : '' ?>>Lecteur</option>
                    <option value="redacteur" <?= $user['role'] === 'redacteur' ? 'selected' : '' ?>>Rédacteur</option>
                    <option value="administrateur" <?= $user['role'] === 'administrateur' ? 'selected' : '' ?>>
                        Administrateur</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="actif" <?= $user['actif'] ? 'checked' : '' ?>> Compte actif
                </label>
                <small style="color: #666; display: block; margin-top: 5px;">Décochez pour empêcher l'utilisateur de se
                    connecter sans supprimer son compte.</small>
            </div>

            <fieldset>
                <legend>Réinitialiser le mot de passe (Optionnel)</legend>
                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password" minlength="8">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmer le mot de passe</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                </div>
            </fieldset>

            <button type="submit" class="btn">Enregistrer les modifications</button>
            <a href="index.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>

</html>