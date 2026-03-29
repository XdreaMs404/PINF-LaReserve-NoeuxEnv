<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
Auth::requireRole('administrateur');

$pdo = Database::getConnection();

if (isset($_GET['id']) && isset($_GET['page_id'])) {
    
    $bloc_id = (int) $_GET['id'];
    $page_id = (int) $_GET['page_id'];

    $stmtDelete = $pdo->prepare("DELETE FROM blocs_page WHERE id = :id AND page_id = :page_id");
    $stmtDelete->execute(['id' => $bloc_id, 'page_id' => $page_id]);

    header("Location: editer.php?id=" . $page_id . "&success=1");
    exit;
} else {
    die("Requête invalide.");
}
