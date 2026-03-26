<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=insertion");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Insertion & Emploi" est 9
$page_id = 9;

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
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= htmlspecialchars($blocs['insertion_header_image']['chemin_fichier'] ?? 'assets/images/travaux_ouvrier.jpg') ?>');">
        <h1><?= $blocs['insertion_h1']['contenu_texte_publie'] ?? 'Insertion & Emploi' ?></h1>
    </section>

    <main class="container">
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">
                <?= $blocs['insertion_p_1']['contenu_texte_publie'] ?? 'Nœux Environnement est une structure d’insertion par l’activité économique.' ?>
            </p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">
                <?= $blocs['insertion_p_2']['contenu_texte_publie'] ?? 'Derrière chaque chantier nature, chaque atelier de jardinage ou chaque panier de légumes, il y a des personnes en parcours d’insertion qui reprennent pied dans l’emploi.' ?>
            </p>
        </section>

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['insertion_h2_1']['contenu_texte_publie'] ?? 'L’insertion par l’activité économique, concrètement' ?></h2>
                    <p><?= $blocs['insertion_p_3']['contenu_texte_publie'] ?? 'L’association porte un Atelier Chantier d’Insertion (ACI) basé sur plusieurs supports permanents :' ?></p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><?= $blocs['insertion_li_1']['contenu_texte_publie'] ?? 'gestion des milieux naturels (zones humides, cours d’eau, sentiers, friches, etc.) ;' ?></li>
                        <li><?= $blocs['insertion_li_2']['contenu_texte_publie'] ?? 'maraîchage biologique et jardinage écologique ;' ?></li>
                        <li><?= $blocs['insertion_li_3']['contenu_texte_publie'] ?? 'et ponctuellement la sensibilisation à l’environnement (animations, chantiers participatifs…).' ?></li>
                    </ul>
                    <p><?= $blocs['insertion_p_4']['contenu_texte_publie'] ?? 'Ces activités servent à la fois à rendre des services au territoire et à proposer un cadre de travail à des personnes éloignées de l’emploi.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['insertion_img_1']['chemin_fichier'] ?? 'assets/images/travaux_ouvrier2.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['insertion_img_1']['texte_alt'] ?? 'Equipe en insertion') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['insertion_h2_2']['contenu_texte_publie'] ?? 'Qui peut intégrer un parcours d’insertion ?' ?></h2>
                <p><?= $blocs['insertion_p_5']['contenu_texte_publie'] ?? 'Les postes sont destinés à des personnes qui rencontrent des difficultés d’accès à l’emploi (longue période sans emploi, problèmes sociaux…), sont éligibles à l’IAE (orientation par Pôle Emploi, Mission Locale, PLIE, services sociaux…), et souhaitent s’engager dans une démarche active pour construire ou reconstruire un projet professionnel.' ?></p>
                <p><?= $blocs['insertion_p_6']['contenu_texte_publie'] ?? 'Les profils sont très variés : jeunes, adultes, parents isolés, personnes ayant besoin de reprendre confiance après une période difficile, etc.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['insertion_h2_3']['contenu_texte_publie'] ?? 'Les supports de travail : des activités utiles au territoire' ?></h2>
                <p><?= $blocs['insertion_p_7']['contenu_texte_publie'] ?? 'Les salariés en insertion travaillent principalement sur :' ?></p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li><?= $blocs['insertion_li_4']['contenu_texte_publie'] ?? 'entretien et restauration de milieux naturels (cours d’eau, fossés, sentiers, terrils, marais, etc.) ;' ?></li>
                    <li><?= $blocs['insertion_li_5']['contenu_texte_publie'] ?? 'jardinage écologique et maraîchage bio (préparation des sols, cultures, récolte, ventes) ;' ?></li>
                    <li><?= $blocs['insertion_li_6']['contenu_texte_publie'] ?? 'certains projets de menuiserie écologique (nichoirs, hôtels à insectes, mangeoires…) ;' ?></li>
                    <li><?= $blocs['insertion_li_7']['contenu_texte_publie'] ?? 'ponctuellement, participation à des animations ou événements.' ?></li>
                </ul>
                <p><?= $blocs['insertion_p_8']['contenu_texte_publie'] ?? 'Ces activités sont encadrées par des encadrants techniques qui organisent le travail, transmettent les gestes professionnels et veillent à la sécurité.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2><?= $blocs['insertion_h2_4']['contenu_texte_publie'] ?? 'Le suivi social et l’accompagnement professionnel' ?></h2>
                    <p><?= $blocs['insertion_p_9']['contenu_texte_publie'] ?? 'Le parcours ne se limite pas au travail sur le chantier.' ?></p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><?= $blocs['insertion_li_8']['contenu_texte_publie'] ?? '<strong>Le suivi social</strong> vise à identifier et lever les freins : logement, mobilité, santé, démarches administratives, garde d’enfants, etc.' ?></li>
                        <li><?= $blocs['insertion_li_9']['contenu_texte_publie'] ?? '<strong>L’accompagnement professionnel</strong> aide à construire un projet : bilans de compétences, découverte de métiers, mise en relation avec des formations, recherche de stages, d’immersions ou d’emplois.' ?></li>
                    </ul>
                    <p><?= $blocs['insertion_p_10']['contenu_texte_publie'] ?? 'L’idée est de bâtir, pas à pas, un parcours individualisé pour chaque salarié.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['insertion_img_2']['chemin_fichier'] ?? 'assets/images/travaux_ouvrier.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['insertion_img_2']['texte_alt'] ?? 'Accompagnement professionnel') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['insertion_h2_5']['contenu_texte_publie'] ?? 'Objectif : un emploi durable ou une formation' ?></h2>
                <p><?= $blocs['insertion_p_11']['contenu_texte_publie'] ?? 'L’ACI n’est pas une fin en soi : c’est un sas de retour à l’emploi. Pendant le contrat d’insertion, l’équipe travaille avec le salarié pour clarifier un projet professionnel réaliste, développer des compétences transférables et préparer la sortie.' ?></p>
                <p><?= $blocs['insertion_p_12']['contenu_texte_publie'] ?? 'L’objectif final est que la personne puisse quitter Nœux Environnement pour une solution durable : emploi, alternance, formation longue… et non revenir dans un parcours d’urgence.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="grid-2">
                <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                    <div class="card-content">
                        <h3><?= $blocs['insertion_h3_1']['contenu_texte_publie'] ?? 'Pour les candidats' ?></h3>
                        <p><?= $blocs['insertion_p_13']['contenu_texte_publie'] ?? 'Vous pensez répondre aux critères de l’IAE et vous êtes intéressé par un poste à Nœux Environnement ? Parlez-en avec votre référent emploi ou consultez nos offres.' ?></p>
                        <a href="<?= htmlspecialchars($blocs['insertion_a_1']['url_publie'] ?? 'index.php?view=nous-rejoindre') ?>" class="btn btn-primary">
                            <?= $blocs['insertion_a_1']['contenu_texte_publie'] ?? 'Voir nos offres d’emploi & stages' ?>
                        </a>
                    </div>
                </div>
                <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                    <div class="card-content">
                        <h3><?= $blocs['insertion_h3_2']['contenu_texte_publie'] ?? 'Pour les partenaires et employeurs' ?></h3>
                        <p><?= $blocs['insertion_p_14']['contenu_texte_publie'] ?? 'Vous êtes une entreprise, une collectivité, une structure sociale et vous souhaitez proposer des immersions, recruter des salariés sortant de l’ACI, ou monter un projet en lien avec nos activités ?' ?></p>
                        <a href="<?= htmlspecialchars($blocs['insertion_a_2']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-secondary">
                            <?= $blocs['insertion_a_2']['contenu_texte_publie'] ?? 'Nous contacter pour un partenariat emploi' ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>