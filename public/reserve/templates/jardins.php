<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=jardins");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Jardins" est 14
$page_id = 14;

// 3. On récupère TOUS les blocs de cette page
$stmt = $pdo->prepare("
    SELECT b.*, m.chemin_fichier, m.texte_alt 
    FROM blocs_page b 
    LEFT JOIN medias m ON b.media_publie_id = m.id 
    WHERE b.page_id = :page_id
");
$stmt->execute(['page_id' => $page_id]);
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 4. On réorganise les résultats par leur nom (titre_publie)
$blocs = [];
foreach ($resultats as $row) {
    $blocs[$row['titre_publie']] = $row;
}
?>

    <section class="hero" style="background-image: url('<?= htmlspecialchars($blocs['jardins_hero_img']['chemin_fichier'] ?? 'assets/images/lareservehero_bellephoto_nuit.jpg') ?>');">
        <div class="hero-content">
            <h1><?= $blocs['jardins_hero_h1']['contenu_texte_publie'] ?? 'Jardins & Maraîchage' ?></h1>
            <p><?= $blocs['jardins_hero_p']['contenu_texte_publie'] ?? 'Autour du bâtiment de La Réserve, des jardins et des parcelles de maraîchage biologique ont été aménagés. On y produit des légumes de saison, on y teste des pratiques de jardinage au naturel, et on y accueille des visites, ateliers et animations.' ?></p>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['jardins_h2_1']['contenu_texte_publie'] ?? 'Qui cultive les jardins ?' ?></h2>
                    <p><?= $blocs['jardins_p_1']['contenu_texte_publie'] ?? 'Les jardins de La Réserve sont cultivés par l’équipe des Maraîchers de Nœux Environnement. Leur rôle : préparer les sols, semer, planter, récolter, et participer à la vente.' ?></p>
                    <p><?= $blocs['jardins_p_2']['contenu_texte_publie'] ?? 'Cette équipe fonctionne comme un atelier d’insertion : des personnes éloignées de l’emploi y travaillent, se forment et construisent un projet professionnel, encadrées par des professionnels.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['jardins_img_1']['chemin_fichier'] ?? 'assets/images/interieur_bois_maquette_locaux.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['jardins_img_1']['texte_alt'] ?? 'Maraîchers au travail') ?>">
                </div>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title"><?= $blocs['jardins_h2_2']['contenu_texte_publie'] ?? 'Des légumes bio, de saison' ?></h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem auto;"><?= $blocs['jardins_p_3']['contenu_texte_publie'] ?? 'Les jardins sont cultivés en agriculture biologique : pas de pesticides, pas d’engrais de synthèse, travail sur la fertilité naturelle du sol. L\'arrosage est raisonné pour économiser l\'eau.' ?></p>
            <div class="grid-2">

                <div class="card">
                    <h3><?= $blocs['jardins_h3_1']['contenu_texte_publie'] ?? 'Où les trouver ?' ?></h3>
                    <ul style="text-align: left; list-style: disc; margin-left: 1.5rem;">
                        <li><a href="<?= htmlspecialchars($blocs['jardins_a_1']['url_publie'] ?? '../noeux/index.php?view=paniers') ?>"><?= $blocs['jardins_a_1']['contenu_texte_publie'] ?? 'Vendus en paniers de légumes' ?></a></li>
                        <li><a href="<?= htmlspecialchars($blocs['jardins_a_2']['url_publie'] ?? 'index.php?view=marche-alimentation') ?>"><?= $blocs['jardins_a_2']['contenu_texte_publie'] ?? 'Sur le marché de La Réserve' ?></a></li>
                        <li><a href="<?= htmlspecialchars($blocs['jardins_a_3']['url_publie'] ?? 'index.php?view=marche-alimentation') ?>"><?= $blocs['jardins_a_3']['contenu_texte_publie'] ?? 'En circuits courts (points relais)' ?></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['jardins_h2_3']['contenu_texte_publie'] ?? 'Un jardin pour le sol vivant et la biodiversité' ?></h2>
                <p><?= $blocs['jardins_p_4']['contenu_texte_publie'] ?? 'On met en avant des pratiques simples :' ?></p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li><?= $blocs['jardins_li_4']['contenu_texte_publie'] ?? '<strong>Sol vivant</strong> : paillage, compost, pas de labour profond.' ?></li>
                    <li><?= $blocs['jardins_li_5']['contenu_texte_publie'] ?? '<strong>Rotations de cultures</strong> : pour ne pas épuiser le sol.' ?></li>
                    <li><?= $blocs['jardins_li_6']['contenu_texte_publie'] ?? '<strong>Plantes compagnes</strong> : associations fleurs/légumes.' ?></li>
                    <li><?= $blocs['jardins_li_7']['contenu_texte_publie'] ?? '<strong>Zones refuges</strong> : haies, bandes fleuries pour la faune.' ?></li>
                </ul>
                <p style="margin-top: 1rem;"><?= $blocs['jardins_p_5']['contenu_texte_publie'] ?? 'Ces choix permettent d\'avoir des légumes de qualité, de réduire les intrants et de favoriser la biodiversité.' ?></p>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2><?= $blocs['jardins_h2_4']['contenu_texte_publie'] ?? 'Des jardins pour apprendre' ?></h2>
                    <p><?= $blocs['jardins_p_6']['contenu_texte_publie'] ?? 'Les jardins servent aussi de support pédagogique pour :' ?></p>
                    <ul style="list-style: disc; margin-left: 1.5rem;">
                        <li><?= $blocs['jardins_li_8']['contenu_texte_publie'] ?? 'Accueillir des classes (semer, observer, comprendre la saisonnalité).' ?></li>
                        <li><?= $blocs['jardins_li_9']['contenu_texte_publie'] ?? 'Proposer des ateliers tout public (compost, paillage, cuisine).' ?></li>
                        <li><?= $blocs['jardins_li_10']['contenu_texte_publie'] ?? 'Tester des idées et expérimenter.' ?></li>
                    </ul>
                    <p style="margin-top: 1rem;"><?= $blocs['jardins_p_7']['contenu_texte_publie'] ?? 'Les jardins deviennent un support concret pour comprendre ce qui se passe "sous nos pieds" et dans notre assiette.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['jardins_img_2']['chemin_fichier'] ?? 'assets/images/visite_jardin.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['jardins_img_2']['texte_alt'] ?? 'Animation jardin') ?>">
                </div>
            </div>
        </section>

        <section class="content-section" style="text-align: center;">
            <h2 class="section-title"><?= $blocs['jardins_h2_5']['contenu_texte_publie'] ?? 'Visites et ateliers dans les jardins' ?></h2>
            <p><?= $blocs['jardins_p_8']['contenu_texte_publie'] ?? 'Vous pouvez découvrir les jardins lors d’événements, de visites guidées ou d\'animations scolaires.' ?></p>
            <div class="hero-buttons" style="margin-top: 2rem;">
                <a href="<?= htmlspecialchars($blocs['jardins_a_4']['url_publie'] ?? 'index.php?view=agenda') ?>" class="btn btn-primary">
                    <?= $blocs['jardins_a_4']['contenu_texte_publie'] ?? 'Voir les prochaines visites' ?>
                </a>
                <a href="<?= htmlspecialchars($blocs['jardins_a_5']['url_publie'] ?? 'index.php?view=visites') ?>" class="btn btn-secondary">
                    <?= $blocs['jardins_a_5']['contenu_texte_publie'] ?? 'Organiser une visite de groupe' ?>
                </a>
            </div>
        </section>

    </main>