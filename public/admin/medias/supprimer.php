<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
use Services\Uploader;

// Seuls redacteur et admin peuvent supprimer
Auth::requireRole('redacteur');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF");
    }

    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    if ($id > 0) {
        if (Uploader::deleteMedia($id)) {
            $msg = "Média supprimé.";
        } else {
            $msg = "Erreur lors de la suppression.";
        }
    } else {
        $msg = "ID invalide.";
    }
} else {
    $msg = "Méthode non autorisée.";
}

header('Location: index.php?msg=' . urlencode($msg));
exit;
