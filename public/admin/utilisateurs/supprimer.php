<?php
// public/admin/utilisateurs/supprimer.php
require_once __DIR__ . '/../../../config/bootstrap.php';

Auth::requireRole('administrateur');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification CSRF
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF - Veuillez réessayer.");
    }

    $id = $_POST['id'] ?? null;
    $currentUser = Auth::user('id');

    if (!$id) {
        header('Location: index.php?msg=Id manquant');
        exit;
    }

    // Protection : interdit de se supprimer soi-même
    if ($id == $currentUser) {
        die("Action interdite : vous ne pouvez pas supprimer votre propre compte.");
    }

    $pdo = Database::getConnection();

    // Vérifier si l'utilisateur existe
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE id = ?");
    $stmt->execute([$id]);
    if (!$stmt->fetch()) {
        header('Location: index.php?msg=Utilisateur introuvable');
        exit;
    }

    // Suppression
    $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
    try {
        $stmt->execute([$id]);
        header('Location: index.php?msg=Utilisateur supprimé avec succès');
        exit;
    } catch (PDOException $e) {
        die("Erreur lors de la suppression : " . $e->getMessage());
    }
} else {
    // Redirection si accès direct sans POST
    header('Location: index.php');
    exit;
}
