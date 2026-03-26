<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=la-reserve");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "La Réserve" (Côté Noeux) est bien le 25
$page_id = 25; 

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

    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= htmlspecialchars($blocs['la-reserve_header_image']['chemin_fichier'] ?? 'assets/images/lareservehero_bellephoto_nuit.jpg') ?>');">
        <h1><?= $blocs['la-reserve_h1']['contenu_texte_publie'] ?? 'La Réserve, écolieu vivant de l’Artois' ?></h1>
    </section>

    <main class="container">
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">
                <?= $blocs['la-reserve_p_1']['contenu_texte_publie'] ?? 'La Réserve, c’est notre nouveau lieu de vie et de travail à Nœux-les-Mines. Ancien supermarché et grande friche commerciale, le site a été entièrement transformé pour devenir un écolieu vivant, ouvert aux habitants, aux partenaires, aux scolaires et à tous les curieux.' ?>
            </p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">
                <?= $blocs['la-reserve_p_2']['contenu_texte_publie'] ?? 'On y trouve à la fois des jardins et parcelles de maraîchage bio, des salles pour se réunir et se former, des espaces pour les animations, ateliers et événements, et les locaux de Nœux Environnement.' ?>
            </p>
        </section>

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['la-reserve_h2_1']['contenu_texte_publie'] ?? 'D’une friche commerciale à un écolieu vivant' ?></h2>
                    <p><?= $blocs['la-reserve_p_3']['contenu_texte_publie'] ?? 'Pendant des années, le site était une ancienne friche commerciale, avec un bâtiment de supermarché et de grands parkings. Aujourd’hui, La Réserve est devenue un démonstrateur de la transition écologique et solidaire, un tiers-lieu géré par Nœux Environnement, et un endroit où se rencontrent biodiversité, agriculture durable, pédagogie et insertion.' ?></p>
                    <p><?= $blocs['la-reserve_p_4']['contenu_texte_publie'] ?? 'Une partie du foncier est consacrée au bâtiment rénové, l’autre à des espaces extérieurs : jardins, terres agricoles, espaces d’essais, zones plus naturelles.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['la-reserve_img_1']['chemin_fichier'] ?? 'assets/images/lareservehero_bellephoto_nuit.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['la-reserve_img_1']['texte_alt'] ?? 'La Réserve rénovée') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['la-reserve_h2_2']['contenu_texte_publie'] ?? 'Un bâtiment démonstrateur de la transition écologique' ?></h2>
                <p><?= $blocs['la-reserve_p_5']['contenu_texte_publie'] ?? 'La Réserve n’est pas qu’un bâtiment “classique” : réutilisation d’une structure existante plutôt que de construire ailleurs, choix de matériaux sobres et performants, réflexion sur la gestion de l’eau et de l’énergie, liens forts avec la nature autour du bâtiment.' ?></p>
                <p><?= $blocs['la-reserve_p_6']['contenu_texte_publie'] ?? 'Le site sert de support pédagogique : visites, ateliers, événements permettent d’expliquer concrètement comment on peut rénover, réutiliser, végétaliser et faire évoluer des lieux existants.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2><?= $blocs['la-reserve_h2_3']['contenu_texte_publie'] ?? 'Des jardins et du maraîchage bio en insertion' ?></h2>
                    <p><?= $blocs['la-reserve_p_7']['contenu_texte_publie'] ?? 'Autour du bâtiment, La Réserve accueille des parcelles de maraîchage biologique, des zones plantées (haies, bosquets, bandes fleuries), et des espaces pédagogiques (jardin, sol vivant, compost, mare, etc.).' ?></p>
                    <p><?= $blocs['la-reserve_p_8']['contenu_texte_publie'] ?? 'Les jardins sont cultivés par Les Maraîchers de Nœux Environnement, une équipe en insertion qui produit des légumes bio vendus en paniers, sur place et via la plateforme LeCourtCircuit.fr.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['la-reserve_img_2']['chemin_fichier'] ?? 'assets/images/potagers.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['la-reserve_img_2']['texte_alt'] ?? 'Jardins de La Réserve') ?>">
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['la-reserve_h2_4']['contenu_texte_publie'] ?? 'Des salles et espaces pour se réunir' ?></h2>
                <p><?= $blocs['la-reserve_p_9']['contenu_texte_publie'] ?? 'À l’intérieur, La Réserve propose plusieurs types d’espaces : bureaux pour l’équipe, salles de réunion et de formation, espaces modulables pour des ateliers et conférences, et lieux de convivialité.' ?></p>
                <p><?= $blocs['la-reserve_p_10']['contenu_texte_publie'] ?? 'Ces salles permettent d’organiser des réunions de travail, des formations, des rencontres thématiques et des événements plus festifs liés à la transition écologique et solidaire.' ?></p>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['la-reserve_h2_5']['contenu_texte_publie'] ?? 'Un lieu ouvert aux habitants et aux partenaires' ?></h2>
                <p><?= $blocs['la-reserve_p_11']['contenu_texte_publie'] ?? 'La Réserve accueille régulièrement des animations tout public, des événements (inauguration, journées portes ouvertes, fêtes), un petit marché de producteurs locaux, et des actions plus spécifiques.' ?></p>
                <p><?= $blocs['la-reserve_p_12']['contenu_texte_publie'] ?? 'Habitants, élus, associations, structures sociales, entreprises… tout le monde peut venir découvrir le lieu, participer à une activité ou échanger sur un projet.' ?></p>
            </div>
        </section>

        <section class="content-section" style="text-align: center;">
            <h2><?= $blocs['la-reserve_h2_6']['contenu_texte_publie'] ?? 'Comment découvrir La Réserve ?' ?></h2>
            <p><?= $blocs['la-reserve_p_13']['contenu_texte_publie'] ?? 'La Réserve se situe : <strong>22 bis rue Nationale, 62290 Nœux-les-Mines</strong>.' ?></p>
            <p><?= $blocs['la-reserve_p_14']['contenu_texte_publie'] ?? 'Un site internet dédié présente également La Réserve plus en détail.' ?></p>
            <div class="hero-buttons" style="margin-top: 2rem;">
                <a href="<?= htmlspecialchars($blocs['la-reserve_a_1']['url_publie'] ?? '../reserve/index.php?view=accueil') ?>" class="btn btn-secondary">
                    <?= $blocs['la-reserve_a_1']['contenu_texte_publie'] ?? 'Découvrir le site de la Réserve' ?>
                </a>
            </div>
        </section>

    </main>