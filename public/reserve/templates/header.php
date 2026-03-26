<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php");
	die("");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Réserve - Nœux Environnement</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/images/logo_noeux_environnement.png" type="image/png">
    <script src="/shared/config.js"></script>

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
                <li><a href="index.php?view=accueil" class="active">Accueil</a></li>
                <li><a href="index.php?view=decouvrir">Découvrir</a></li>
                <li><a href="index.php?view=chiffres-amenagements">Chiffres & Aménagements</a></li>
                <li><a href="index.php?view=jardins">Jardins</a></li>
                <li><a href="index.php?view=reserver-salle">Salles</a></li>
                <li><a href="index.php?view=visites">Visites</a></li>
                <li><a href="index.php?view=agenda">Agenda</a></li>
                <li><a href="index.php?view=contact">Contact</a></li>
            </ul>
            <a href="../noeux/index.php?view=accueil" class="btn-back">Retour Nœux Environnement</a>

        </nav>
    </header>