<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
Auth::requireRole('redacteur'); // Empêche les lecteurs

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF - Veuillez réessayer.");
    }

    $page_id = (int)($_POST['page_id'] ?? 0);
    $bloc_id = (int)($_POST['bloc_id'] ?? 0);
    $media_id = (int)($_POST['media_id'] ?? 0);

    if ($page_id && $bloc_id && $media_id) {
        $pdo = Database::getConnection();
        
        $userId = $_SESSION['user']['id'];
        $isAdmin = Auth::hasRole('administrateur');

        // Différenciation Rédacteur vs Admin pour l'approbation d'image
        if ($isAdmin) {
            $stmt = $pdo->prepare("UPDATE blocs_page SET media_publie_id = ?, media_propose_id = NULL, statut = 'publie', dernier_modifie_par_id = ?, date_modification = NOW() WHERE id = ? AND page_id = ?");
        } else {
            $stmt = $pdo->prepare("UPDATE blocs_page SET media_propose_id = ?, statut = 'a_valider', dernier_modifie_par_id = ?, date_modification = NOW() WHERE id = ? AND page_id = ?");
        }
        $stmt->execute([$media_id, $userId, $bloc_id, $page_id]);
        
        // On redirige vers la page d'édition, ancré spécifiquement sur le bloc modifié
        header("Location: editer.php?id={$page_id}&success=1#bloc-{$bloc_id}");
        exit;
    }
}

header('Location: /admin/pages/index.php');
exit;
