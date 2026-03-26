<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=accueil");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Accueil" de La Réserve est 12
$page_id = 12;

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

    <section class="hero" style="background-image: url('<?= htmlspecialchars($blocs['hero_image']['chemin_fichier'] ?? 'assets/images/acceuil_locaux.jpeg') ?>');">
        <div class="hero-content">
            <h1><?= $blocs['hero_titre']['contenu_texte_publie'] ?? 'La Réserve – écolieu vivant de l’Artois' ?></h1>
            <p><?= $blocs['hero_paragraphe_1']['contenu_texte_publie'] ?? 'À Nœux-les-Mines, une ancienne friche commerciale s’est transformée en écolieu vivant, ouvert à toutes et tous.' ?></p>
            <p><?= $blocs['hero_paragraphe_2']['contenu_texte_publie'] ?? 'La Réserve est un lieu où l’on expérimente concrètement la transition écologique et solidaire : un bâtiment réhabilité, des jardins, des animations, et des parcours d\'insertion.' ?></p>
            <div class="hero-buttons">
                <a href="<?= htmlspecialchars($blocs['hero_bouton_1']['url_publie'] ?? 'index.php?view=reserver-salle') ?>" class="btn btn-secondary">
                    <?= $blocs['hero_bouton_1']['contenu_texte_publie'] ?? 'Découvrir les salles' ?>
                </a>
                <a href="<?= htmlspecialchars($blocs['hero_bouton_2']['url_publie'] ?? 'index.php?view=visites') ?>" class="btn btn-primary">
                    <?= $blocs['hero_bouton_2']['contenu_texte_publie'] ?? 'Visites & Animations' ?>
                </a>
            </div>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2><?= $blocs['section1_titre']['contenu_texte_publie'] ?? 'Un écolieu vivant, pour qui, pour quoi ?' ?></h2>
                <p><?= $blocs['section1_intro']['contenu_texte_publie'] ?? 'La Réserve, c’est :' ?></p>
                <ul style="list-style: disc; display: inline-block; text-align: left; margin-top: 1rem;">
                    <li><?= $blocs['section1_item_1']['contenu_texte_publie'] ?? 'un lieu de vie où se croisent habitants, associations, scolaires, collectivités, entreprises ;' ?></li>
                    <li><?= $blocs['section1_item_2']['contenu_texte_publie'] ?? 'un site démonstrateur de la transition écologique : bâtiment, énergie, eau, sols, biodiversité, agriculture durable, alimentation, inclusion sociale ;' ?></li>
                    <li><?= $blocs['section1_item_3']['contenu_texte_publie'] ?? 'un tiers-lieu social et nourricier, au service du territoire.' ?></li>
                </ul>
                <p style="margin-top: 1rem;"><?= $blocs['section1_conclusion']['contenu_texte_publie'] ?? 'Le projet s’appuie sur l’expérience de Nœux Environnement : gestion des milieux naturels, insertion par l’activité économique, éducation à l’environnement et alimentation durable.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title"><?= $blocs['section2_titre']['contenu_texte_publie'] ?? 'Ce que vous pouvez faire à La Réserve' ?></h2>
            <div class="grid-3">
                <div class="card">
                    <h3><?= $blocs['section2_card1_titre']['contenu_texte_publie'] ?? '1. Découvrir le lieu' ?></h3>
                    <p><?= $blocs['section2_card1_texte']['contenu_texte_publie'] ?? 'Comprendre comment une ancienne friche commerciale a été transformée en écolieu : l’histoire du projet, la réhabilitation du bâtiment, la désimperméabilisation des sols, les plantations, les jardins, la ferme maraîchère…' ?></p>
                    <a href="<?= htmlspecialchars($blocs['section2_card1_bouton']['url_publie'] ?? 'index.php?view=decouvrir') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                        <?= $blocs['section2_card1_bouton']['contenu_texte_publie'] ?? 'Découvrir La Réserve' ?>
                    </a>
                </div>
                <div class="card">
                    <h3><?= $blocs['section2_card2_titre']['contenu_texte_publie'] ?? '2. Participer' ?></h3>
                    <p><?= $blocs['section2_card2_texte']['contenu_texte_publie'] ?? 'Prendre part à des visites guidées du site, des balades et ateliers (jardinage, sol vivant, biodiversité, alimentation durable…), des journées thématiques et événements tout public.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['section2_card2_bouton']['url_publie'] ?? 'index.php?view=visites') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                        <?= $blocs['section2_card2_bouton']['contenu_texte_publie'] ?? 'Visites & animations' ?>
                    </a>
                </div>
                <div class="card">
                    <h3><?= $blocs['section2_card3_titre']['contenu_texte_publie'] ?? '3. Manger local' ?></h3>
                    <p><?= $blocs['section2_card3_texte']['contenu_texte_publie'] ?? 'Retrouver des produits locaux : légumes bio produits sur place, marché à La Réserve à certains moments, point relais de commandes de producteurs locaux.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['section2_card3_bouton']['url_publie'] ?? '../noeux/index.php?view=maraichage') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                        <?= $blocs['section2_card3_bouton']['contenu_texte_publie'] ?? 'Marché & alimentation' ?>
                    </a>
                </div>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['chiffres_titre']['contenu_texte_publie'] ?? 'La Réserve en quelques chiffres' ?></h2>
                    <ul style="list-style: disc; margin-left: 1.5rem;">
                        <li><?= $blocs['chiffres_item_1']['contenu_texte_publie'] ?? '<strong>25 000 m²</strong> : surface de l’ancienne friche commerciale, attenante à des terres agricoles ;' ?></li>
                        <li><?= $blocs['chiffres_item_2']['contenu_texte_publie'] ?? 'plus de <strong>2 000 m²</strong> de bâtiment réhabilité ;' ?></li>
                        <li><?= $blocs['chiffres_item_3']['contenu_texte_publie'] ?? 'environ <strong>7 000 m²</strong> d’espaces extérieurs repensés : cours, jardins, cheminements, maraîchage, verger, micro-forêt, zones d’essai ;' ?></li>
                        <li><?= $blocs['chiffres_item_4']['contenu_texte_publie'] ?? 'plus de <strong>1 450 m²</strong> désimperméabilisés pour laisser l’eau s’infiltrer de nouveau ;' ?></li>
                        <li><?= $blocs['chiffres_item_5']['contenu_texte_publie'] ?? 'plus de <strong>100 arbres plantés</strong>, 400 m de haies, un verger et une micro-forêt ;' ?></li>
                        <li><?= $blocs['chiffres_item_6']['contenu_texte_publie'] ?? 'près de <strong>1 hectare</strong> de maraîchage biologique, avec des serres et des cultures de plein champ.' ?></li>
                    </ul>
                    <p style="margin-top: 1rem;"><?= $blocs['chiffres_conclusion']['contenu_texte_publie'] ?? 'Ces chiffres montrent qu’il est possible de redonner vie à un site très artificialisé, en le rendant à la fois utile à la nature et aux habitants.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['chiffres_image']['chemin_fichier'] ?? 'assets/images/avant_après.webp') ?>" 
                         alt="<?= htmlspecialchars($blocs['chiffres_image']['texte_alt'] ?? 'Plan de La Réserve') ?>">
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2><?= $blocs['section4_titre']['contenu_texte_publie'] ?? 'Un projet porté par Nœux Environnement' ?></h2>
                <p><?= $blocs['section4_texte_1']['contenu_texte_publie'] ?? 'La Réserve est portée par l’association Nœux Environnement, créée en 1991 : gestion et protection des milieux naturels, insertion par l’activité économique, éducation à l’environnement, maraîchage biologique et alimentation durable.' ?></p>
                <p><?= $blocs['section4_texte_2']['contenu_texte_publie'] ?? 'La Réserve s’inscrit naturellement dans la continuité de ces actions, en offrant un lieu où tout se rassemble.' ?></p>
                <a href="<?= htmlspecialchars($blocs['section4_bouton']['url_publie'] ?? '../noeux/index.php?view=accueil') ?>" class="btn btn-secondary" style="margin-top: 1rem;">
                    <?= $blocs['section4_bouton']['contenu_texte_publie'] ?? 'En savoir plus sur Nœux Environnement' ?>
                </a>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title"><?= $blocs['avenir_titre']['contenu_texte_publie'] ?? 'À venir à La Réserve' ?></h2>
            <div
                style="text-align: center; padding: 2rem; border: 2px dashed var(--secondary-color); border-radius: 8px;">
                <p style="margin-bottom:15px; color:#334155;"><?= $blocs['avenir_texte']['contenu_texte_publie'] ?? 'Retrouvez tous nos événements, chantiers nature, ateliers et visites directement sur notre agenda dédié !' ?></p>
                <a href="<?= htmlspecialchars($blocs['avenir_bouton']['url_publie'] ?? 'index.php?view=agenda') ?>" class="btn btn-accent">
                    <?= $blocs['avenir_bouton']['contenu_texte_publie'] ?? 'Visualiser l\'agenda complet' ?>
                </a>
            </div>
        </section>

    </main>