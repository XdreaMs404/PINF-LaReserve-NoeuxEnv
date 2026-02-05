<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php");
	die("");
}
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noeux Environnement</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/images/logo_noeux_environnement.png" type="image/png">
    <script src="/shared/config.js"></script>
</head>
<body>

 <header>
        <nav>
            <a href="index.php" class="logo">
                <img src="assets/images/logo_noeux_environnement.png" alt="Logo Noeux Environnement">
                Noeux Environnement
            </a>
            <ul class="nav-links">
                <li><a href="index.php?view=accueil" class="active">Accueil</a></li>
                <li><a href="index.php?view=qui-sommes-nous">Qui sommes-nous ?</a></li>
                <li><a href="index.php?view=nos-actions">Nos Actions</a></li>
                <li><a href="index.php?view=la-reserve">La Réserve</a></li>
                <li><a href="index.php?view=paniers">Paniers Bio</a></li>

                <li><a href="index.php?view=nous-rejoindre">Nous rejoindre</a></li>
                <li><a href="index.php?view=contact">Contact</a></li>
                <li><a href="https://www.helloasso.com/associations/noeux-environnement/formulaires/1" target="_blank"
                        class="btn-don">Faire un don</a></li>
            </ul>
        </nav>
    </header>
    