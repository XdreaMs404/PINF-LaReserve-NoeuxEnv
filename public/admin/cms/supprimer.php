<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

// Seul un administrateur peut supprimer une page
Auth::requireRole('administrateur');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Vérification de sécurité (faille CSRF)
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur de sécurité. Veuillez réessayer.");
    }
    
    $pdo = Database::getConnection();
    $id = (int) $_POST['id'];
    
    // Suppression de la page. 
    // Grâce au "ON DELETE CASCADE" dans la base de données, 
    // les blocs liés à cette page seront supprimés automatiquement.
    $stmt = $pdo->prepare("DELETE FROM pages WHERE id = ?");
    $stmt->execute([$id]);
    
    // Redirection vers l'accueil avec un message de succès
    header('Location: index.php?msg=' . urlencode('La page a été supprimée avec succès.'));
    exit;
} else {
    die("Requête invalide.");
}
