<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php");
	die("");
}

// ---- Gestion Visibilité Menu ----
$hiddenPages = [];
try {
    $db = class_exists('Database') ? Database::getConnection() : null;
    $isRedacteur = isset($_SESSION['role']) && in_array($_SESSION['role'], ['redacteur', 'admin']);
    
    if ($db && !$isRedacteur) {
        $stmtHidden = $db->query("SELECT identifiant_url FROM pages WHERE statut = 'brouillon' AND site_id = 2");
        while($r = $stmtHidden->fetch()) {
            $hiddenPages[] = $r['identifiant_url'];
        }
    }
} catch(Exception $e) {}
// ---------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Réserve - Nœux Environnement</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/images/logo_noeux_environnement.png" type="image/png">
    <script src="../shared/config.js"></script>

    <?php if (isset($view) && $view === 'agenda'): ?>
    <script src="https://cdn.jsdelivr.net/npm/ical.js@1.5.0/build/ical.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/icalendar@6.1.10/index.global.min.js'></script>
    <?php endif; ?>
</head>
<body>
 <header>
        <nav>
            <a href="index.php?view=accueil" class="logo">La Réserve</a>
            <ul class="nav-links">
                <?php if (!in_array('accueil', $hiddenPages)): ?><li><a href="index.php?view=accueil" class="<?= isset($view) && $view=='accueil'?'active':'' ?>">Accueil</a></li><?php endif; ?>
                <?php if (!in_array('decouvrir', $hiddenPages)): ?><li><a href="index.php?view=decouvrir">Découvrir</a></li><?php endif; ?>
                <?php if (!in_array('chiffres-amenagements', $hiddenPages)): ?><li><a href="index.php?view=chiffres-amenagements">Chiffres & Aménagements</a></li><?php endif; ?>
                <?php if (!in_array('jardins', $hiddenPages)): ?><li><a href="index.php?view=jardins">Jardins</a></li><?php endif; ?>
                <?php if (!in_array('reserver-salle', $hiddenPages)): ?><li><a href="index.php?view=reserver-salle">Salles</a></li><?php endif; ?>
                <?php if (!in_array('visites', $hiddenPages)): ?><li><a href="index.php?view=visites">Visites</a></li><?php endif; ?>
                <?php if (!in_array('agenda', $hiddenPages)): ?><li><a href="index.php?view=agenda">Agenda</a></li><?php endif; ?>
                <?php if (!in_array('contact', $hiddenPages)): ?><li><a href="index.php?view=contact">Contact</a></li><?php endif; ?>
            </ul>
            <a href="../noeux/index.php?view=accueil" class="btn-back">Retour Nœux Environnement</a>

        </nav>
    </header>