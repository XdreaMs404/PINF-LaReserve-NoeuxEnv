<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=nous-rejoindre");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Nous rejoindre" est 23
$page_id = 23;

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
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= htmlspecialchars($blocs['nous-rejoindre_header_image']['chemin_fichier'] ?? 'assets/images/equipe_noeux_environnement.jpg') ?>');">
        <h1><?= $blocs['nous-rejoindre_h1']['contenu_texte_publie'] ?? 'Nous Rejoindre' ?></h1>
    </section>

    <main class="container">
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">
                <?= $blocs['nous-rejoindre_p_1']['contenu_texte_publie'] ?? 'Vous avez envie de vous impliquer à nos côtés ? Il existe plusieurs façons de rejoindre Nœux Environnement : en tant que bénévole, comme salarié en insertion ou salarié “classique”, ou via un stage ou un service civique.' ?>
            </p>
        </section>

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['nous-rejoindre_h2_1']['contenu_texte_publie'] ?? 'Devenir bénévole à Nœux Environnement' ?></h2>
                    <p><?= $blocs['nous-rejoindre_p_2']['contenu_texte_publie'] ?? 'Les bénévoles ont une place importante dans la vie de l’association. Ils peuvent venir donner un coup de main lors des chantiers participatifs, sur des événements, pendant des ateliers, ou sur des tâches plus ponctuelles.' ?></p>
                    <p><?= $blocs['nous-rejoindre_p_3']['contenu_texte_publie'] ?? 'Ce que vous pouvez faire : tenir un stand, participer à un chantier nature, aider à l’entretien des jardins, donner un coup de main sur une action de sensibilisation, prêter vos compétences.' ?></p>
                    <p><?= $blocs['nous-rejoindre_p_4']['contenu_texte_publie'] ?? 'Il n’est pas nécessaire d’être expert : la motivation et l’envie de participer sont les plus importantes.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['nous-rejoindre_a_1']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                        <?= $blocs['nous-rejoindre_a_1']['contenu_texte_publie'] ?? 'Je veux devenir bénévole' ?>
                    </a>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['nous-rejoindre_img_1']['chemin_fichier'] ?? 'assets/images/visite_jardin.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nous-rejoindre_img_1']['texte_alt'] ?? 'Bénévolat nature') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['nous-rejoindre_h2_2']['contenu_texte_publie'] ?? 'Travailler à Nœux Environnement' ?></h2>
                <p><?= $blocs['nous-rejoindre_p_5']['contenu_texte_publie'] ?? 'Nœux Environnement est aussi un employeur via son Atelier Chantier d’Insertion (ACI) et ponctuellement via des postes plus classiques.' ?></p>

                <h3 style="margin-top: 1.5rem; color: var(--primary-color);"><?= $blocs['nous-rejoindre_h3_1']['contenu_texte_publie'] ?? 'Les postes en insertion' ?></h3>
                <p><?= $blocs['nous-rejoindre_p_6']['contenu_texte_publie'] ?? 'Les contrats d’insertion concernent des postes comme ouvrier sur les chantiers nature, ouvrier maraîcher, ou participation à certaines activités de sensibilisation. Ces contrats sont réservés à des personnes éligibles à l’IAE.' ?></p>
                <p><?= $blocs['nous-rejoindre_p_7']['contenu_texte_publie'] ?? 'En plus du travail sur le terrain, chaque salarié bénéficie d’un suivi social et d’un accompagnement professionnel.' ?></p>

                <h3 style="margin-top: 1.5rem; color: var(--primary-color);"><?= $blocs['nous-rejoindre_h3_2']['contenu_texte_publie'] ?? 'Comment candidater ?' ?></h3>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li><?= $blocs['nous-rejoindre_li_1']['contenu_texte_publie'] ?? '<strong>Pour un poste en insertion :</strong> parlez-en à votre référent (Pôle Emploi, Mission Locale, PLIE) ou contactez-nous.' ?></li>
                    <li><?= $blocs['nous-rejoindre_li_2']['contenu_texte_publie'] ?? '<strong>Pour un autre poste :</strong> consultez les offres en cours et envoyez CV + lettre de motivation.' ?></li>
                </ul>
                <a href="<?= htmlspecialchars($blocs['nous-rejoindre_a_2']['url_publie'] ?? '#') ?>" class="btn btn-secondary" style="margin-top: 1rem;">
                    <?= $blocs['nous-rejoindre_a_2']['contenu_texte_publie'] ?? 'Voir nos offres d’emploi' ?>
                </a>
            </div>
        </section>

        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2><?= $blocs['nous-rejoindre_h2_3']['contenu_texte_publie'] ?? 'Stages & Service Civique' ?></h2>
                    <p><?= $blocs['nous-rejoindre_p_8']['contenu_texte_publie'] ?? 'Nœux Environnement accueille régulièrement des stagiaires et des volontaires en Service Civique, en particulier sur les missions de sensibilisation à l’environnement, de lien avec les habitants et d’animation.' ?></p>
                    <p><?= $blocs['nous-rejoindre_p_9']['contenu_texte_publie'] ?? 'Les missions peuvent porter sur l’éducation à l’environnement, la communication, ou l’appui aux projets de l’association.' ?></p>
                    <a href="<?= htmlspecialchars($blocs['nous-rejoindre_a_3']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                        <?= $blocs['nous-rejoindre_a_3']['contenu_texte_publie'] ?? 'Proposer ma candidature' ?>
                    </a>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['nous-rejoindre_img_2']['chemin_fichier'] ?? 'assets/images/cours_education_enfant.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nous-rejoindre_img_2']['texte_alt'] ?? 'Service Civique') ?>">
                </div>
            </div>
        </section>

    </main>