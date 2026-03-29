<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
Auth::requireRole('redacteur');

$pdo = Database::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['page_id']) && isset($_POST['type_bloc'])) {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF - Veuillez réessayer.");
    }

    $page_id = (int) $_POST['page_id'];
    $type = trim($_POST['type_bloc']);

    // Check if style column exists, if not create it (Auto-migration)
    try {
        $stmtCol = $pdo->query("SHOW COLUMNS FROM blocs_page LIKE 'style'");
        if ($stmtCol->rowCount() == 0) {
            $pdo->exec("ALTER TABLE blocs_page ADD style VARCHAR(50) NOT NULL DEFAULT 'normal'");
        }
    } catch (Exception $e) {
        // Ignorer l'erreur si l'utilisateur n'a pas les droits DDL
    }

    // Calcul de l'ordre max
    $stmt = $pdo->prepare("SELECT MAX(ordre) as max_ordre FROM blocs_page WHERE page_id = :page_id");
    $stmt->execute(['page_id' => $page_id]);
    $res = $stmt->fetch();
    $nouvel_ordre = ($res['max_ordre'] ? $res['max_ordre'] : 0) + 10;

    $isAdmin = Auth::hasRole('administrateur');
    $statut = $isAdmin ? 'brouillon' : 'a_valider';

    $stmtInsert = $pdo->prepare("INSERT INTO blocs_page (page_id, ordre, type, statut, style, date_creation, dernier_modifie_par_id) VALUES (:page_id, :ordre, :type, :statut, 'normal', NOW(), :uid)");
    
    $stmtInsert->execute([
        'page_id' => $page_id,
        'ordre' => $nouvel_ordre,
        'type' => $type,
        'statut' => $statut,
        'uid' => $_SESSION['user']['id'] ?? null
    ]);

    header("Location: editer.php?id=" . $page_id . "&success=1");
    exit;
} else {
    die("Requête invalide.");
}
