<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=accueil");
    die("");
}

// 1. Connexion à la base (adapte selon comment ta classe Database est appelée)
$pdo = Database::getConnection();

// 2. L'ID de la page "Accueil" de Noeux Environnement est 1 (d'après ton SQL)
$page_id = 1;

// 3. On récupère TOUS les blocs de cette page, en joignant la table medias pour avoir le chemin des images
$stmt = $pdo->prepare("
    SELECT b.*, m.chemin_fichier, m.texte_alt 
    FROM blocs_page b 
    LEFT JOIN medias m ON b.media_publie_id = m.id 
    WHERE b.page_id = :page_id
");
$stmt->execute(['page_id' => $page_id]);
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 4. On réorganise les résultats pour pouvoir les appeler facilement par leur nom (titre_publie)
$blocs = [];
foreach ($resultats as $row) {
    // Exemple : $blocs['hero_titre'] contiendra toutes les infos de ce bloc
    $blocs[$row['titre_publie']] = $row;
}
?>

<main class="container">
    <section class="hero">
        <div class="hero-content">
            <h1><?= $blocs['hero_titre']['contenu_texte_publie'] ?? 'Nœux Environnement' ?></h1>
            <p class="subtitle"><?= $blocs['hero_sous_titre']['contenu_texte_publie'] ?? 'Gestion et protection des milieux naturels et insertion socio-professionnelle des personnes éloignées de l’emploi.' ?></p>
            <div class="hero-buttons">
                <a href="<?= htmlspecialchars($blocs['hero_bouton_1']['url_publie'] ?? 'index.php?view=nos-actions') ?>" class="btn btn-primary">
                    <?= $blocs['hero_bouton_1']['contenu_texte_publie'] ?? 'Découvrir nos actions' ?>
                </a>
                <a href="<?= htmlspecialchars($blocs['hero_bouton_2']['url_publie'] ?? 'index.php?view=la-reserve') ?>" class="btn btn-secondary">
                    <?= $blocs['hero_bouton_2']['contenu_texte_publie'] ?? 'En savoir plus sur La Réserve' ?>
                </a>
                <a href="<?= htmlspecialchars($blocs['hero_bouton_3']['url_publie'] ?? 'index.php?view=paniers') ?>" class="btn btn-primary">
                    <?= $blocs['hero_bouton_3']['contenu_texte_publie'] ?? 'Commander un panier de légumes' ?>
                </a>
            </div>
        </div>
    </section>

    <section class="content-section container">
        <div class="text-image-block">
            <div class="text-content">
                <p><?= $blocs['intro_paragraphe_1']['contenu_texte_publie'] ?? 'Depuis 1991, Nœux Environnement agit pour la nature, la biodiversité et l’insertion sur le territoire de Nœux-les-Mines et des communes voisines.' ?></p>
                <p><?= $blocs['intro_paragraphe_2']['contenu_texte_publie'] ?? 'Nous intervenons sur les milieux naturels, développons un maraîchage biologique, accompagnons des personnes vers l’emploi et organisons des animations pour tous.' ?></p>
            </div>
        </div>
    </section>

    <section class="container">
        <h2 class="section-title">Nos principaux domaines d’action</h2>
        <div class="grid-4">
            <article class="card">
                <div class="card-image">
                    <img src="assets/images/visite_jardin.jpg" alt="Nature et Territoires">
                </div>
                <div class="card-content">
                    <h3>Nature & territoires</h3>
                    <p>Nous menons des chantiers d’entretien et de restauration de milieux naturels : cours d’eau, zones humides, sentiers, friches, espaces verts...</p>
                    <a href="index.php?view=nature-territoires" class="btn btn-primary">En savoir plus</a>
                </div>
            </article>

            <article class="card">
                <div class="card-image">
                    <img src="assets/images/potagers.jpg" alt="Maraîchage Biologique">
                </div>
                <div class="card-content">
                    <h3>Maraîchage & alimentation durable</h3>
                    <p>Nos équipes cultivent des légumes bio de saison sur des parcelles maraîchères, notamment à La Réserve.</p>
                    <a href="index.php?view=maraichage" class="btn btn-primary">En savoir plus</a>
                </div>
            </article>

            <article class="card">
                <div class="card-image">
                    <img src="assets/images/travaux_ouvrier.jpg" alt="Insertion et Emploi">
                </div>
                <div class="card-content">
                    <h3>Insertion & emploi</h3>
                    <p>Nœux Environnement est un Atelier Chantier d’Insertion : nous employons des personnes éloignées de l’emploi et les accompagnons.</p>
                    <a href="index.php?view=insertion" class="btn btn-primary">En savoir plus</a>
                </div>
            </article>

            <article class="card">
                <div class="card-image">
                    <img src="assets/images/cours_education_enfant.jpg" alt="Éducation à l'environnement">
                </div>
                <div class="card-content">
                    <h3>Éducation & sensibilisation</h3>
                    <p>Nous proposons des animations nature et environnement pour les écoles, les centres de loisirs, les associations et le grand public.</p>
                    <a href="assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf" target="_blank" class="btn btn-primary">Télécharger le guide pédagogique</a>
                </div>
            </article>
        </div>
    </section>

    <section class="content-section container">
        <div class="text-image-block">
            <div class="text-content">
                <h2><?= $blocs['reserve_titre']['contenu_texte_publie'] ?? 'La Réserve, écolieu vivant de l’Artois' ?></h2>
                <p><?= $blocs['reserve_paragraphe_1']['contenu_texte_publie'] ?? 'La Réserve est notre nouveau lieu de travail et de vie à Nœux-les-Mines. Ancienne friche commerciale transformée, elle rassemble un bâtiment rénové, des jardins, des parcelles maraîchères et des espaces d’animation.' ?></p>
                <p><?= $blocs['reserve_paragraphe_2']['contenu_texte_publie'] ?? 'C’est un lieu pour expérimenter la transition écologique, accueillir des groupes, organiser des événements et rencontrer les habitants.' ?></p>
                <div class="la-reserve-buttons">
                    <a href="<?= htmlspecialchars($blocs['reserve_bouton']['url_publie'] ?? 'index.php?view=la-reserve') ?>" class="btn btn-secondary">
                        <?= $blocs['reserve_bouton']['contenu_texte_publie'] ?? 'Découvrir La Réserve' ?>
                    </a>
                </div>
            </div>
            <div class="image-content">
                <img src="<?= htmlspecialchars($blocs['reserve_image']['chemin_fichier'] ?? 'assets/images/lareservehero_bellephoto_nuit.jpg') ?>" 
                     alt="<?= htmlspecialchars($blocs['reserve_image']['texte_alt'] ?? 'La Réserve') ?>">
            </div>
        </div>
    </section>

    <section class="container content-section" style="background-color: var(--light-gray); padding: 3rem; border-radius: 8px; text-align: center;">
        <h2 class="section-title">Agir avec Nœux Environnement</h2>
        <p style="margin-bottom: 2rem; max-width: 800px; margin-left: auto; margin-right: auto;">Vous pouvez soutenir les actions de Nœux Environnement de plusieurs façons : en devenant bénévole, en travaillant avec nous, en participant à nos événements ou en choisissant nos paniers de légumes.</p>
        <div class="hero-buttons">
            <a href="index.php?view=nous-rejoindre" class="btn btn-primary">Devenir bénévole</a>
            <a href="index.php?view=nous-rejoindre" class="btn btn-secondary">Voir nos offres d’emploi & stages</a>
            <a href="index.php?view=paniers" class="btn btn-primary">Découvrir les paniers de légumes</a>
        </div>
    </section>

    <section class="container content-section" style="text-align: center;">
        <h2 class="section-title">Nos partenaires</h2>
        <div class="partners-grid">
            <img src="assets/images/partenaire/logo-republique-francaise_partenaire.jpg" alt="République Française" class="partner-logo">
            <img src="assets/images/partenaire/Région_Hauts-de-France_logo_partenaire.svg" alt="Région Hauts-de-France" class="partner-logo">
            <img src="assets/images/partenaire/Logo_Conseil_Departemental_62.png" alt="Département du Pas-de-Calais" class="partner-logo">
            <img src="assets/images/partenaire/logo-Cofinance-par-l-Union-europeenne_partenaire.png" alt="Union Européenne" class="partner-logo">
            <img src="assets/images/partenaire/logo_communaute_agglomeration_bethune_bruay.jpeg" alt="CABBALR" class="partner-logo">
            <img src="assets/images/partenaire/logo_agence_national_cohesion_territoires.png" alt="ANCT" class="partner-logo">
            <img src="assets/images/partenaire/logo_plie_arrondissement_bethune_partenaire.png" alt="PLIE Béthune" class="partner-logo">
        </div>
        <a href="index.php?view=partenaires" class="btn btn-secondary" style="margin-top: 2rem;">Découvrir nos partenaires</a>
    </section>

</main>