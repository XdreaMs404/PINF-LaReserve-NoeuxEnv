<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=nature-territoires");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Nature & Territoires" est 4
$page_id = 21;

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
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= htmlspecialchars($blocs['nature-territoires_header_image']['chemin_fichier'] ?? 'assets/images/visite_jardin.jpg') ?>');">
        <h1><?= $blocs['nature-territoires_h1']['contenu_texte_publie'] ?? 'Nature & Territoires' ?></h1>
    </section>

    <main class="container">
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">
                <?= $blocs['nature-territoires_p_1']['contenu_texte_publie'] ?? 'Depuis ses débuts, Nœux Environnement est très présente sur les milieux naturels du territoire : cours d’eau, zones humides, sentiers, petits bois, friches, jardins…' ?>
            </p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">
                <?= $blocs['nature-territoires_p_2']['contenu_texte_publie'] ?? 'L’objectif est double : améliorer la qualité des sites (biodiversité, paysage, usages) et proposer des chantiers supports d’insertion pour nos salariés.' ?>
            </p>
        </section>

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['nature-territoires_h2_1']['contenu_texte_publie'] ?? 'Nos principaux types d’interventions' ?></h2>
                    <p><?= $blocs['nature-territoires_p_3']['contenu_texte_publie'] ?? 'Nous réalisons, par exemple :' ?></p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><?= $blocs['nature-territoires_li_1']['contenu_texte_publie'] ?? '<strong>Sur les cours d’eau et fossés :</strong> enlèvement sélectif de la végétation gênante, dégagement d’embâcles, petits travaux pour stabiliser les berges, entretien des abords.' ?></li>
                        <li><?= $blocs['nature-territoires_li_2']['contenu_texte_publie'] ?? '<strong>Sur les zones humides et mares :</strong> entretien des berges, création ou remise en état de mares, fauche raisonnée, mise en valeur de ces zones souvent méconnues.' ?></li>
                        <li><?= $blocs['nature-territoires_li_3']['contenu_texte_publie'] ?? '<strong>Sur les haies, talus et petits bois :</strong> plantations d’arbres et d’arbustes, taille d’entretien, actions pour maintenir des corridors écologiques et des refuges pour la faune.' ?></li>
                        <li><?= $blocs['nature-territoires_li_4']['contenu_texte_publie'] ?? '<strong>Sur les sentiers et espaces de promenade :</strong> débroussaillage, entretien des chemins, pose ou entretien de petits équipements (panneaux, barrières, mobilier simple).' ?></li>
                        <li><?= $blocs['nature-territoires_li_5']['contenu_texte_publie'] ?? '<strong>Sur des friches et anciens sites délaissés :</strong> remise en état progressive, transformation en espaces plus accueillants pour les habitants et pour la nature.' ?></li>
                    </ul>
                    <p><?= $blocs['nature-territoires_p_4']['contenu_texte_publie'] ?? 'Ces interventions sont adaptées à chaque site : nous discutons avec la commune ou le partenaire pour bien comprendre les besoins et les usages.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['nature-territoires_img_1']['chemin_fichier'] ?? 'assets/images/benevole_potager.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nature-territoires_img_1']['texte_alt'] ?? 'Chantier nature') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['nature-territoires_h2_2']['contenu_texte_publie'] ?? 'Travailler avec la nature, pas contre elle' ?></h2>
                <p><?= $blocs['nature-territoires_p_5']['contenu_texte_publie'] ?? 'Sur nos chantiers, nous cherchons à trouver le bon équilibre entre :' ?></p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li><?= $blocs['nature-territoires_li_6']['contenu_texte_publie'] ?? 'la sécurité et le confort pour les usagers (riverains, promeneurs, pêcheurs…) ;' ?></li>
                    <li><?= $blocs['nature-territoires_li_7']['contenu_texte_publie'] ?? 'le respect des cycles naturels (périodes de nidification, floraison, etc.) ;' ?></li>
                    <li><?= $blocs['nature-territoires_li_8']['contenu_texte_publie'] ?? 'la préservation de zones refuges pour la faune et la flore.' ?></li>
                </ul>
                <p><?= $blocs['nature-territoires_p_6']['contenu_texte_publie'] ?? 'Concrètement, cela signifie : limiter autant que possible les interventions lourdes, garder des zones “plus sauvages” là où c’est possible, privilégier des techniques simples et robustes.' ?></p>
                <p><?= $blocs['nature-territoires_p_7']['contenu_texte_publie'] ?? 'Nous sommes régulièrement en contact avec des structures spécialisées (CPIE, associations naturalistes, techniciens rivières…) pour ajuster nos pratiques et nos choix.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2><?= $blocs['nature-territoires_h2_3']['contenu_texte_publie'] ?? 'Les chantiers nature comme support d’insertion' ?></h2>
                    <p><?= $blocs['nature-territoires_p_8']['contenu_texte_publie'] ?? 'Les chantiers sur les milieux naturels sont aussi des lieux d’apprentissage pour les salariés en insertion qui rejoignent l’association.' ?></p>
                    <p><?= $blocs['nature-territoires_p_9']['contenu_texte_publie'] ?? 'Ils permettent de :' ?></p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><?= $blocs['nature-territoires_li_9']['contenu_texte_publie'] ?? 'reprendre un rythme de travail,' ?></li>
                        <li><?= $blocs['nature-territoires_li_10']['contenu_texte_publie'] ?? 'apprendre à travailler en équipe,' ?></li>
                        <li><?= $blocs['nature-territoires_li_11']['contenu_texte_publie'] ?? 'se former à l’utilisation d’outils (débroussailleuse, tronçonneuse, petits engins…),' ?></li>
                        <li><?= $blocs['nature-territoires_li_12']['contenu_texte_publie'] ?? 'découvrir les règles de sécurité,' ?></li>
                        <li><?= $blocs['nature-territoires_li_13']['contenu_texte_publie'] ?? 'mieux connaître le territoire et ses enjeux environnementaux.' ?></li>
                    </ul>
                    <p><?= $blocs['nature-territoires_p_10']['contenu_texte_publie'] ?? 'Ces compétences peuvent ensuite être mobilisées dans des emplois d’entretien d’espaces verts, de travaux publics, de logistique, de maintenance, etc.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['nature-territoires_img_2']['chemin_fichier'] ?? 'assets/images/travaux_ouvrier.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['nature-territoires_img_2']['texte_alt'] ?? 'Salariés en insertion') ?>">
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['nature-territoires_h2_4']['contenu_texte_publie'] ?? 'Nos partenaires sur le terrain' ?></h2>
                <p><?= $blocs['nature-territoires_p_11']['contenu_texte_publie'] ?? 'Nous travaillons principalement pour des communes et intercommunalités, des syndicats de rivières ou de bassins versants, des structures environnementales (CEN, associations…), et parfois des bailleurs, des structures sociales ou d’autres partenaires publics.' ?></p>
                <p><?= $blocs['nature-territoires_p_12']['contenu_texte_publie'] ?? 'Les interventions peuvent être ponctuelles, pour remettre un site en état, ou régulières, dans le cadre de conventions ou de contrats d’entretien.' ?></p>

                <h3 style="margin-top: 2rem; color: var(--primary-color);"><?= $blocs['nature-territoires_h3_1']['contenu_texte_publie'] ?? 'Quelques exemples de réalisations' ?></h3>
                <div class="grid-3" style="margin-top: 1rem;">
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <h4><?= $blocs['nature-territoires_h4_1']['contenu_texte_publie'] ?? 'Restauration de berges' ?></h4>
                            <p><?= $blocs['nature-territoires_p_13']['contenu_texte_publie'] ?? 'Dégagement d’embâcles et remise en place d’une végétation adaptée pour un cours d’eau plus lisible et des berges plus stables.' ?></p>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <h4><?= $blocs['nature-territoires_h4_2']['contenu_texte_publie'] ?? 'Entretien de sentier' ?></h4>
                            <p><?= $blocs['nature-territoires_p_14']['contenu_texte_publie'] ?? 'Entretien d\'un cheminement et fauche raisonnée dans un espace naturel ouvert au public.' ?></p>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <h4><?= $blocs['nature-territoires_h4_3']['contenu_texte_publie'] ?? 'Plantation de haies' ?></h4>
                            <p><?= $blocs['nature-territoires_p_15']['contenu_texte_publie'] ?? 'Plantation de haies champêtres le long de parcelles et de chemins pour offrir des refuges à la faune et limiter l\'érosion.' ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--primary-color); color: var(--white); padding: 3rem; border-radius: 8px; text-align: center;">
            <h2 style="color: var(--white);"><?= $blocs['nature-territoires_h2_5']['contenu_texte_publie'] ?? 'Travaillons ensemble' ?></h2>
            <p style="margin-bottom: 2rem;"><?= $blocs['nature-territoires_p_16']['contenu_texte_publie'] ?? 'Vous êtes une commune, une intercommunalité, une association ou une structure gestionnaire et vous avez un projet nature ?' ?></p>
            <a href="<?= htmlspecialchars($blocs['nature-territoires_a_1']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-secondary"
                style="background-color: var(--white); color: var(--primary-color);">
                <?= $blocs['nature-territoires_a_1']['contenu_texte_publie'] ?? 'Nous contacter pour un projet nature' ?>
            </a>
        </section>

    </main>