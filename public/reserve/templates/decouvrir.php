<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=decouvrir");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Découvrir" (La Réserve) est 13
$page_id = 13;

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

    <section class="hero" style="background-image: url('<?= htmlspecialchars($blocs['decouvrir_hero_img']['chemin_fichier'] ?? 'assets/images/potagers.jpg') ?>');">
        <div class="hero-content">
            <h1><?= $blocs['decouvrir_h1']['contenu_texte_publie'] ?? 'Découvrir La Réserve' ?></h1>
            <p><?= $blocs['decouvrir_hero_p']['contenu_texte_publie'] ?? 'La Réserve, c’est l’histoire d’un lieu qui change de visage : un ancien site de grande distribution, très minéral, peu accueillant pour la nature, devenu un écolieu vivant, ouvert au public et au service du territoire.' ?></p>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['decouvrir_h2_1']['contenu_texte_publie'] ?? 'D’une friche commerciale à un écolieu vivant' ?></h2>
                    <p><?= $blocs['decouvrir_p_1']['contenu_texte_publie'] ?? 'Pendant des années, le site de La Réserve n’était qu’un grand bâtiment de supermarché et de vastes parkings bitumés.' ?></p>
                    <p><?= $blocs['decouvrir_p_2']['contenu_texte_publie'] ?? 'Avec La Réserve, Nœux Environnement et ses partenaires ont voulu :' ?></p>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                        <li><?= $blocs['decouvrir_li_1']['contenu_texte_publie'] ?? 'réutiliser ce lieu au lieu de construire ailleurs ;' ?></li>
                        <li><?= $blocs['decouvrir_li_2']['contenu_texte_publie'] ?? 'désimperméabiliser une partie des surfaces ;' ?></li>
                        <li><?= $blocs['decouvrir_li_3']['contenu_texte_publie'] ?? 'ramener de la nature : arbres, haies, verger, jardins, micro-forêt, mares ;' ?></li>
                        <li><?= $blocs['decouvrir_li_4']['contenu_texte_publie'] ?? 'en faire un lieu de rencontres, d’expérimentations et de pédagogie.' ?></li>
                    </ul>
                    <p style="margin-top: 1rem;"><?= $blocs['decouvrir_p_3']['contenu_texte_publie'] ?? 'L’objectif : montrer qu’il est possible de transformer une friche commerciale en un espace fertile, accueillant, vivant.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['decouvrir_img_1']['chemin_fichier'] ?? 'assets/images/acceuil_locaux.jpeg') ?>" 
                         alt="<?= htmlspecialchars($blocs['decouvrir_img_1']['texte_alt'] ?? 'Transformation du site') ?>">
                </div>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title"><?= $blocs['decouvrir_h2_2']['contenu_texte_publie'] ?? 'Un laboratoire à ciel ouvert' ?></h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem auto;"><?= $blocs['decouvrir_p_4']['contenu_texte_publie'] ?? 'La Réserve est pensée comme un laboratoire à ciel ouvert de la transition écologique et solidaire. On y travaille sur plusieurs dimensions :' ?></p>
            <div class="grid-3">
                <div class="card">
                    <h3><?= $blocs['decouvrir_h3_1']['contenu_texte_publie'] ?? 'Bâtiment & Énergie' ?></h3>
                    <p><?= $blocs['decouvrir_p_5']['contenu_texte_publie'] ?? 'Rénovation et transformation d’un bâtiment existant, solutions bioclimatiques, énergie renouvelable, confort d’usage.' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['decouvrir_h3_2']['contenu_texte_publie'] ?? 'Eau & Sols' ?></h3>
                    <p><?= $blocs['decouvrir_p_6']['contenu_texte_publie'] ?? 'Désimperméabilisation, infiltration de l’eau de pluie, travail sur le sol vivant.' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['decouvrir_h3_3']['contenu_texte_publie'] ?? 'Biodiversité' ?></h3>
                    <p><?= $blocs['decouvrir_p_7']['contenu_texte_publie'] ?? 'Plantation d’arbres, haies, verger, micro-forêt, zones enherbées, mares, habitats pour la faune.' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['decouvrir_h3_4']['contenu_texte_publie'] ?? 'Agriculture & Alimentation' ?></h3>
                    <p><?= $blocs['decouvrir_p_8']['contenu_texte_publie'] ?? 'Maraîchage biologique, circuits courts, point relais, cuisine et gaspillage alimentaire.' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['decouvrir_h3_5']['contenu_texte_publie'] ?? 'Insertion & Lien Social' ?></h3>
                    <p><?= $blocs['decouvrir_p_9']['contenu_texte_publie'] ?? 'Parcours d’insertion, chantiers avec des habitants, événements à destination de tous.' ?></p>
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem;"><?= $blocs['decouvrir_p_10']['contenu_texte_publie'] ?? 'La Réserve est un lieu où l’on peut voir, toucher, comprendre ce que signifie la transition écologique dans la vie quotidienne.' ?></p>
        </section>

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['decouvrir_h2_3']['contenu_texte_publie'] ?? 'Un tiers-lieu nourricier et social' ?></h2>
                    <p><?= $blocs['decouvrir_p_11']['contenu_texte_publie'] ?? 'La Réserve est un tiers-lieu : un espace qui n’est ni seulement un bâtiment, ni seulement une ferme, ni seulement un centre social… mais un peu tout ça à la fois.' ?></p>
                    <p><?= $blocs['decouvrir_p_12']['contenu_texte_publie'] ?? 'On peut y :' ?></p>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                        <li><?= $blocs['decouvrir_li_5']['contenu_texte_publie'] ?? 'acheter des légumes bio et locaux ;' ?></li>
                        <li><?= $blocs['decouvrir_li_6']['contenu_texte_publie'] ?? 'participer à des ateliers cuisine ou jardin ;' ?></li>
                        <li><?= $blocs['decouvrir_li_7']['contenu_texte_publie'] ?? 'venir travailler ou se réunir ;' ?></li>
                        <li><?= $blocs['decouvrir_li_8']['contenu_texte_publie'] ?? 'se former aux métiers de la transition ;' ?></li>
                        <li><?= $blocs['decouvrir_li_9']['contenu_texte_publie'] ?? 'simplement se promener et observer la nature.' ?></li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['decouvrir_img_2']['chemin_fichier'] ?? 'assets/images/plan_vue_de_haut_locaux.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['decouvrir_img_2']['texte_alt'] ?? 'Vue de haut') ?>">
                </div>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content" style="text-align: center;">
                <h2><?= $blocs['decouvrir_h2_4']['contenu_texte_publie'] ?? 'Un projet collectif' ?></h2>
                <p><?= $blocs['decouvrir_p_13']['contenu_texte_publie'] ?? 'La Réserve n’existerait pas sans l\'engagement de Nœux Environnement, le soutien de collectivités (commune, intercommunalité, Région, Département), l\'appui de programmes régionaux et européens, des partenaires techniques, et des associations, habitants et structures locales.' ?></p>
                <p><?= $blocs['decouvrir_p_14']['contenu_texte_publie'] ?? 'La Réserve est donc à la fois un lieu géré par Nœux Environnement, et un projet partagé avec de nombreux acteurs du territoire.' ?></p>
                <div
                    style="margin-top: 2rem; display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; align-items: center;">
                    <img src="assets/images/partenaire/logo-republique-francaise_partenaire.jpg"
                        alt="République Française" style="max-height: 80px;">
                    <img src="assets/images/partenaire/Région_Hauts-de-France_logo_partenaire.svg"
                        alt="Région Hauts-de-France" style="max-height: 80px;">
                    <img src="assets/images/logo_noeux_environnement.png" alt="Nœux Environnement"
                        style="max-height: 100px;">
                    <img src="assets/images/partenaire/logo-Cofinance-par-l-Union-europeenne_partenaire.png"
                        alt="Union Européenne" style="max-height: 80px;">
                    <img src="assets/images/partenaire/logo_plie_arrondissement_bethune_partenaire.png"
                        alt="PLIE Béthune" style="max-height: 80px;">
                </div>
            </div>
        </section>

    </main>