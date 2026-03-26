<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=nos-actions");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Nos actions" est 3
$page_id = 3;

// 3. On récupère TOUS les blocs de cette page, avec les images associées
$stmt = $pdo->prepare("
    SELECT b.*, m.chemin_fichier, m.texte_alt 
    FROM blocs_page b 
    LEFT JOIN medias m ON b.media_publie_id = m.id 
    WHERE b.page_id = :page_id
");
$stmt->execute(['page_id' => $page_id]);
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 4. On réorganise les résultats
$blocs = [];
foreach ($resultats as $row) {
    $blocs[$row['titre_publie']] = $row;
}
?>

    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= htmlspecialchars($blocs['nos-actions_header_image']['chemin_fichier'] ?? 'assets/images/visite_jardin.jpg') ?>');">
        <h1><?= $blocs['nos-actions_h1']['contenu_texte_publie'] ?? 'Nos Actions' ?></h1>
    </section>

    <main class="container">
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">
                <?= $blocs['nos-actions_p_1']['contenu_texte_publie'] ?? 'Nœux Environnement mène des actions toute l’année, avec des publics très différents : habitants, scolaires, collectivités, structures sociales, entreprises…' ?>
            </p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">
                <?= $blocs['nos-actions_p_2']['contenu_texte_publie'] ?? 'Pour y voir plus clair, nous présentons notre travail autour de quatre grands domaines qui se complètent.' ?>
            </p>
        </section>

        <div class="grid-2">
            <article class="card">
                <div class="card-image">
                    <img src="<?= htmlspecialchars($blocs['nos-actions_img_1']['chemin_fichier'] ?? 'assets/images/visite_jardin.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nos-actions_img_1']['texte_alt'] ?? 'Nature et Territoires') ?>">
                </div>
                <div class="card-content">
                    <h3><?= $blocs['nos-actions_h3_1']['contenu_texte_publie'] ?? 'Nature & territoires' ?></h3>
                    <p><?= $blocs['nos-actions_p_3']['contenu_texte_publie'] ?? 'Nous intervenons sur les milieux naturels pour les préserver et les rendre plus accueillants : cours d’eau, fossés, mares, zones humides ; haies, talus, petites zones boisées ; sentiers de promenade, parcs, friches à requalifier.' ?></p>
                    <p><?= $blocs['nos-actions_p_4']['contenu_texte_publie'] ?? 'Nos équipes réalisent des chantiers d’entretien et de restauration, en lien avec les communes et les autres partenaires.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['nos-actions_a_1']['url_publie'] ?? 'index.php?view=nature-territoires') ?>" class="btn btn-primary">
                        <?= htmlspecialchars($blocs['nos-actions_a_1']['contenu_texte_publie'] ?? 'En savoir plus') ?>
                    </a>
                </div>
            </article>

            <article class="card">
                <div class="card-image">
                    <img src="<?= htmlspecialchars($blocs['nos-actions_img_2']['chemin_fichier'] ?? 'assets/images/potagers.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nos-actions_img_2']['texte_alt'] ?? 'Maraîchage Biologique') ?>">
                </div>
                <div class="card-content">
                    <h3><?= $blocs['nos-actions_h3_2']['contenu_texte_publie'] ?? 'Maraîchage & alimentation durable' ?></h3>
                    <p><?= $blocs['nos-actions_p_5']['contenu_texte_publie'] ?? 'Nous développons un maraîchage biologique sur plusieurs parcelles, avec des cultures variées selon les saisons. Les légumes sont proposés en paniers, sur des marchés et via des plateformes comme LeCourtCircuit.' ?></p>
                    <p><?= $blocs['nos-actions_p_6']['contenu_texte_publie'] ?? 'Une partie de cette activité sert aussi à mettre en place des dispositifs solidaires, comme le panier solidaire.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['nos-actions_a_2']['url_publie'] ?? 'index.php?view=maraichage') ?>" class="btn btn-primary">
                        <?= htmlspecialchars($blocs['nos-actions_a_2']['contenu_texte_publie'] ?? 'En savoir plus') ?>
                    </a>
                </div>
            </article>

            <article class="card">
                <div class="card-image">
                    <img src="<?= htmlspecialchars($blocs['nos-actions_img_3']['chemin_fichier'] ?? 'assets/images/travaux_ouvrier.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nos-actions_img_3']['texte_alt'] ?? 'Insertion et Emploi') ?>">
                </div>
                <div class="card-content">
                    <h3><?= $blocs['nos-actions_h3_3']['contenu_texte_publie'] ?? 'Insertion & emploi' ?></h3>
                    <p><?= $blocs['nos-actions_p_7']['contenu_texte_publie'] ?? 'Nos chantiers ne sont pas seulement des chantiers techniques : ce sont des supports d’insertion. Nous proposons des emplois en contrats d’insertion, un accompagnement social et professionnel, et des mises en situation de travail sur des activités utiles au territoire.' ?></p>
                    <p><?= $blocs['nos-actions_p_8']['contenu_texte_publie'] ?? 'L’objectif est d’aider chaque personne à reprendre confiance et à accéder à un emploi durable.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['nos-actions_a_3']['url_publie'] ?? 'index.php?view=insertion') ?>" class="btn btn-primary">
                        <?= htmlspecialchars($blocs['nos-actions_a_3']['contenu_texte_publie'] ?? 'En savoir plus') ?>
                    </a>
                </div>
            </article>

            <article class="card">
                <div class="card-image">
                    <img src="<?= htmlspecialchars($blocs['nos-actions_img_4']['chemin_fichier'] ?? 'assets/images/cours_education_enfant.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nos-actions_img_4']['texte_alt'] ?? 'Éducation à l\'environnement') ?>">
                </div>
                <div class="card-content">
                    <h3><?= $blocs['nos-actions_h3_4']['contenu_texte_publie'] ?? 'Éducation & sensibilisation' ?></h3>
                    <p><?= $blocs['nos-actions_p_9']['contenu_texte_publie'] ?? 'Nous accueillons et nous intervenons auprès de nombreux publics : écoles, centres de loisirs, groupes d’adultes, entreprises. Les thématiques abordées : biodiversité, eau, jardin, alimentation...' ?></p>
                    <p><?= $blocs['nos-actions_p_10']['contenu_texte_publie'] ?? 'Les animations se déroulent à La Réserve, sur des sites naturels, ou directement dans les structures partenaires.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['nos-actions_a_4']['url_publie'] ?? 'assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf') ?>" target="_blank" class="btn btn-primary">
                        <?= htmlspecialchars($blocs['nos-actions_a_4']['contenu_texte_publie'] ?? 'Télécharger le guide pédagogique') ?>
                    </a>
                </div>
            </article>
        </div>

        <section class="content-section"
            style="margin-top: 4rem; background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['nos-actions_h2_1']['contenu_texte_publie'] ?? 'La Réserve : un lieu qui rassemble nos actions' ?></h2>
                    <p><?= $blocs['nos-actions_p_11']['contenu_texte_publie'] ?? 'La plupart de ces actions se croisent à La Réserve, notre “écolieu vivant de l’Artois” :' ?></p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><?= $blocs['nos-actions_li_1']['contenu_texte_publie'] ?? 'site de production maraîchère,' ?></li>
                        <li><?= $blocs['nos-actions_li_2']['contenu_texte_publie'] ?? 'lieu d’accueil pour les animations et événements,' ?></li>
                        <li><?= $blocs['nos-actions_li_3']['contenu_texte_publie'] ?? 'espace de travail pour les équipes,' ?></li>
                        <li><?= $blocs['nos-actions_li_4']['contenu_texte_publie'] ?? 'point relais et lieu de vie pour les habitants.' ?></li>
                    </ul>
                    <a href="<?= htmlspecialchars($blocs['nos-actions_a_5']['url_publie'] ?? 'index.php?view=la-reserve') ?>" class="btn btn-secondary">
                        <?= htmlspecialchars($blocs['nos-actions_a_5']['contenu_texte_publie'] ?? 'Découvrir La Réserve') ?>
                    </a>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['nos-actions_img_reserve']['chemin_fichier'] ?? 'assets/images/lareservehero_bellephoto_nuit.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nos-actions_img_reserve']['texte_alt'] ?? 'La Réserve') ?>">
                </div>
            </div>
        </section>

    </main>