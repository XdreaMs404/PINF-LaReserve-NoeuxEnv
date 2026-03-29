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
    $page_statut = $_POST['page_statut'] ?? '';
    
    $userId = $_SESSION['user']['id'];
    $isAdmin = Auth::hasRole('administrateur');

    $nouveau_statut = 'a_valider';
    if ($isAdmin) {
        $nouveau_statut = 'publie';
    }
    if ($page_statut === 'brouillon') {
        $nouveau_statut = 'brouillon';
    }

    // Mise à jour de la page (Titre et Slug)
    if (!empty($page_titre) && !empty($page_url)) {
        if ($isAdmin) {
            $stmtPg = $pdo->prepare("UPDATE pages SET titre_publie = :titre, titre_propose = NULL, identifiant_url = :url, statut = :statut, date_modification = NOW(), dernier_modifie_par_id = :uid WHERE id = :id");
        } else {
            $stmtPg = $pdo->prepare("UPDATE pages SET titre_propose = :titre, identifiant_url = :url, statut = :statut, date_modification = NOW(), dernier_modifie_par_id = :uid WHERE id = :id");
        }
        $stmtPg->execute(['titre' => $page_titre, 'url' => $page_url, 'statut' => $nouveau_statut, 'id' => $page_id, 'uid' => $userId]);
    }

    $blocs = $_POST['blocs'];

    if ($isAdmin) {
        $stmtTexte = $pdo->prepare("UPDATE blocs_page SET contenu_texte_publie = :texte, contenu_texte_propose = NULL, statut = 'publie', style = :style, dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtLien = $pdo->prepare("UPDATE blocs_page SET contenu_texte_publie = :texte, contenu_texte_propose = NULL, url_publie = :url, url_propose = NULL, statut = 'publie', style = :style, dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtMedia = $pdo->prepare("UPDATE blocs_page SET media_publie_id = :media_id, media_propose_id = NULL, statut = 'publie', style = :style, dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
    } else {
        $stmtTexte = $pdo->prepare("UPDATE blocs_page SET contenu_texte_propose = :texte, statut = 'a_valider', style = :style, dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtLien = $pdo->prepare("UPDATE blocs_page SET contenu_texte_propose = :texte, url_propose = :url, statut = 'a_valider', style = :style, dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
        $stmtMedia = $pdo->prepare("UPDATE blocs_page SET media_propose_id = :media_id, statut = 'a_valider', style = :style, dernier_modifie_par_id = :uid, date_modification = NOW() WHERE id = :id");
    }

    // Try to get style and ordre if migration has been processed, else default
    try {
        $stmtDb = $pdo->prepare("SELECT id, type, titre_publie, titre_propose, contenu_texte_publie, contenu_texte_propose, url_publie, url_propose, media_publie_id, media_propose_id, style, ordre FROM blocs_page WHERE page_id = :pid");
        $stmtDb->execute(['pid' => $page_id]);
    } catch (Exception $e) {
        $stmtDb = $pdo->prepare("SELECT id, type, titre_publie, titre_propose, contenu_texte_publie, contenu_texte_propose, url_publie, url_propose, media_publie_id, media_propose_id, ordre FROM blocs_page WHERE page_id = :pid");
        $stmtDb->execute(['pid' => $page_id]);
    }
    
    $dbBlocs = [];
    while($row = $stmtDb->fetch(PDO::FETCH_ASSOC)) { $dbBlocs[$row['id']] = $row; }

    foreach ($blocs as $bloc_id => $donnees) {
        $db = $dbBlocs[$bloc_id] ?? null;
        if (!$db) continue;

        // --- GESTION DE L'ORDRE (Indépendante du contenu) ---
        if (isset($donnees['ordre'])) {
            $input_ordre = (int)$donnees['ordre'];
            $db_ordre = (int)($db['ordre'] ?? 0);
            if ($input_ordre !== $db_ordre) {
                $stmtOrdre = $pdo->prepare("UPDATE blocs_page SET ordre = :ordre WHERE id = :id");
                $stmtOrdre->execute(['ordre' => $input_ordre, 'id' => $bloc_id]);
            }
        }
        // --- GESTION DU TITRE (Indépendante du contenu) ---
        if (isset($donnees['titre_publie'])) {
            $input_titre = trim($donnees['titre_publie']);
            $db_titre = trim($db['titre_publie'] ?: ($db['titre_propose'] ?? ''));
            if ($input_titre !== $db_titre) {
                $stmtTitre = $pdo->prepare("UPDATE blocs_page SET titre_publie = :titre, titre_propose = :titre WHERE id = :id");
                $stmtTitre->execute(['titre' => $input_titre ?: null, 'id' => $bloc_id]);
            }
        }
        // ----------------------------------------------------

        $hasChanged = false;
        $clean = function($s) { return trim(str_replace(["\r\n", "\r"], "\n", $s ?? '')); };

        $input_style = $donnees['style'] ?? 'normal';
        $db_style = $db['style'] ?? 'normal';
        if ($input_style !== $db_style) $hasChanged = true;

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
                $stmtTexte->execute(['texte' => $donnees['texte'], 'style' => $input_style, 'id' => $bloc_id, 'uid' => $userId]);
            }
            elseif (isset($donnees['texte']) && isset($donnees['url'])) {
                $stmtLien->execute(['texte' => $donnees['texte'], 'url' => $donnees['url'], 'style' => $input_style, 'id' => $bloc_id, 'uid' => $userId]);
            }
            elseif (isset($donnees['media_id']) && $donnees['media_id'] !== '') {
                $stmtMedia->execute(['media_id' => (int) $donnees['media_id'], 'style' => $input_style, 'id' => $bloc_id, 'uid' => $userId]);
            }
        }
    }

    header("Location: editer.php?id=" . $page_id . "&success=1");
    exit;

} else {
    die("Aucune donnée reçue.");
}