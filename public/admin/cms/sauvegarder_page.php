<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
Auth::requireRole('redacteur');

$pdo = Database::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['page_id']) && isset($_POST['blocs'])) {
    
    // CSRF Protection
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF - Veuillez réessayer.");
    }

    $page_id = (int) $_POST['page_id'];
    $page_titre = trim($_POST['page_titre'] ?? '');
    $page_url = trim($_POST['page_url'] ?? '');
    
    $userId = $_SESSION['user']['id'];
    $isAdmin = Auth::hasRole('administrateur');

    // Mise à jour de la page (Titre et Slug)
    if (!empty($page_titre) && !empty($page_url)) {
        if ($isAdmin) {
            $stmtPg = $pdo->prepare("UPDATE pages SET titre_publie = :titre, titre_propose = NULL, identifiant_url = :url, statut = 'publie', date_modification = NOW(), dernier_modifie_par_id = :uid WHERE id = :id");
        } else {
            $stmtPg = $pdo->prepare("UPDATE pages SET titre_propose = :titre, identifiant_url = :url, statut = 'a_valider', date_modification = NOW(), dernier_modifie_par_id = :uid WHERE id = :id");
        }
        $stmtPg->execute(['titre' => $page_titre, 'url' => $page_url, 'id' => $page_id, 'uid' => $userId]);
    }

    $blocs = $_POST['blocs'];

    if ($isAdmin) {
        $stmtTexte = $pdo->prepare("UPDATE blocs_page SET contenu_texte_publie = :texte, contenu_texte_propose = NULL, statut = 'publie', dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtLien = $pdo->prepare("UPDATE blocs_page SET contenu_texte_publie = :texte, contenu_texte_propose = NULL, url_publie = :url, url_propose = NULL, statut = 'publie', dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtMedia = $pdo->prepare("UPDATE blocs_page SET media_publie_id = :media_id, media_propose_id = NULL, statut = 'publie', dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
    } else {
        $stmtTexte = $pdo->prepare("UPDATE blocs_page SET contenu_texte_propose = :texte, statut = 'a_valider', dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtLien = $pdo->prepare("UPDATE blocs_page SET contenu_texte_propose = :texte, url_propose = :url, statut = 'a_valider', dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtMedia = $pdo->prepare("UPDATE blocs_page SET media_propose_id = :media_id, statut = 'a_valider', dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
    }

    $stmtDb = $pdo->prepare("SELECT id, type, contenu_texte_publie, contenu_texte_propose, url_publie, url_propose, media_publie_id, media_propose_id FROM blocs_page WHERE page_id = :pid");
    $stmtDb->execute(['pid' => $page_id]);
    $dbBlocs = [];
    while($row = $stmtDb->fetch(PDO::FETCH_ASSOC)) { $dbBlocs[$row['id']] = $row; }

    foreach ($blocs as $bloc_id => $donnees) {
        $db = $dbBlocs[$bloc_id] ?? null;
        if (!$db) continue;

        $hasChanged = false;
        $clean = function($s) { return trim(str_replace(["\r\n", "\r"], "\n", $s ?? '')); };

        if (isset($donnees['texte'])) {
            $currText = $clean($db['contenu_texte_propose'] ?? $db['contenu_texte_publie']);
            if ($clean($donnees['texte']) !== $currText) $hasChanged = true;
        }
        if (isset($donnees['url'])) {
            $currUrl = $clean($db['url_propose'] ?? $db['url_publie']);
            if ($clean($donnees['url']) !== $currUrl) $hasChanged = true;
        }
        if (isset($donnees['media_id'])) {
            if ((int)$donnees['media_id'] !== (int)($db['media_propose_id'] ?? $db['media_publie_id'])) $hasChanged = true;
        }

        if ($isAdmin || $hasChanged) {
            if (isset($donnees['texte']) && !isset($donnees['url'])) {
                $stmtTexte->execute(['texte' => $donnees['texte'], 'id' => $bloc_id, 'uid' => $userId]);
            }
            elseif (isset($donnees['texte']) && isset($donnees['url'])) {
                $stmtLien->execute(['texte' => $donnees['texte'], 'url' => $donnees['url'], 'id' => $bloc_id, 'uid' => $userId]);
            }
            elseif (isset($donnees['media_id']) && $donnees['media_id'] !== '') {
                $stmtMedia->execute(['media_id' => (int) $donnees['media_id'], 'id' => $bloc_id, 'uid' => $userId]);
            }
        }
    }

    header("Location: editer.php?id=" . $page_id . "&success=1");
    exit;

} else {
    die("Aucune donnée reçue.");
}