<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
use Services\Uploader;

// Seuls redacteur et admin peuvent ajouter
Auth::requireRole('redacteur');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        $error = "Session invalide.";
    } else {
        $siteId = (int) $_POST['site_id'];
        $alt = trim($_POST['alt_text'] ?? '');

        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            try {
                Uploader::uploadImage($_FILES['image'], $siteId, $alt);
                // Redirect vers index avec message
                header('Location: index.php?msg=Image uploadée avec succès');
                exit;
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        } else {
            $error = "Veuillez sélectionner une image.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un média - Administration</title>
    <link rel="stylesheet" href="/reserve/css/style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
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
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="admin-panel">
        <h1>Ajouter un média</h1>
        <a href="index.php">Retour liste</a>

        <div class="form-container">
            <?php if ($error): ?>
                <div class="error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">

                <div class="form-group">
                    <label for="site_id">Site concerné</label>
                    <select name="site_id" id="site_id">
                        <option value="1">Nœux Environnement</option>
                        <option value="2">La Réserve</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Fichier (JPG, PNG, WEBP - Max 5Mo)</label>
                    <input type="file" name="image" id="image" required accept=".jpg,.jpeg,.png,.webp">
                </div>

                <div class="form-group">
                    <label for="alt_text">Texte alternatif (Description)</label>
                    <input type="text" name="alt_text" id="alt_text" placeholder="Ex: Vue du jardin en été">
                </div>

                <button type="submit" class="btn">Uploader</button>
            </form>
        </div>
    </div>
</body>

</html>