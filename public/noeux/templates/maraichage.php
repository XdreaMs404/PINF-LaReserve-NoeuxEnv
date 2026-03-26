<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=maraichage");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Maraîchage" est 6
$page_id = 22;

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
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= htmlspecialchars($blocs['maraichage_header_image']['chemin_fichier'] ?? 'assets/images/potagers.jpg') ?>');">
        <h1><?= $blocs['maraichage_h1']['contenu_texte_publie'] ?? 'Maraîchage & Alimentation Durable' ?></h1>
    </section>

    <main class="container">
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">
                <?= $blocs['maraichage_p_1']['contenu_texte_publie'] ?? 'Depuis 2005, Nœux Environnement développe un projet de maraîchage biologique qui associe insertion professionnelle, production de légumes et sensibilisation à l’environnement.' ?>
            </p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">
                <?= $blocs['maraichage_p_2']['contenu_texte_publie'] ?? 'L’idée : produire des légumes de saison, sans produits chimiques, pour les habitants du territoire, tout en créant des emplois d’insertion.' ?>
            </p>
        </section>

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['maraichage_h2_1']['contenu_texte_publie'] ?? 'Des jardins solidaires sur le territoire' ?></h2>
                    <p><?= $blocs['maraichage_p_3']['contenu_texte_publie'] ?? 'Au fil des années, plusieurs jardins du cœur ont vu le jour sur différentes communes, avec des parcelles de tailles variées où l’on cultive une grande diversité de légumes : salades, carottes, petits pois, oignons, ail, échalotes, courgettes, betteraves rouges, concombres…' ?></p>
                    <p><?= $blocs['maraichage_p_4']['contenu_texte_publie'] ?? 'Aujourd’hui, l’activité maraîchère est aussi fortement présente à La Réserve, écolieu vivant de l’Artois, qui devient un véritable site de production bio en insertion.' ?></p>
                    <p><?= $blocs['maraichage_p_5']['contenu_texte_publie'] ?? 'Les parcelles et serres sont cultivées en agriculture biologique, travaillées avec des rotations de cultures pour préserver les sols, et entretenues par des équipes en insertion.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['maraichage_img_1']['chemin_fichier'] ?? 'assets/images/potagers.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['maraichage_img_1']['texte_alt'] ?? 'Jardins maraîchers') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['maraichage_h2_2']['contenu_texte_publie'] ?? 'Une agriculture respectueuse de l’environnement' ?></h2>
                <p><?= $blocs['maraichage_p_6']['contenu_texte_publie'] ?? 'Dans nos jardins :' ?></p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li><?= $blocs['maraichage_li_1']['contenu_texte_publie'] ?? 'aucun engrais chimique ;' ?></li>
                    <li><?= $blocs['maraichage_li_2']['contenu_texte_publie'] ?? 'pas de pesticides ni d’insecticides ;' ?></li>
                    <li><?= $blocs['maraichage_li_3']['contenu_texte_publie'] ?? 'des amendements organiques et des techniques simples pour enrichir le sol ;' ?></li>
                    <li><?= $blocs['maraichage_li_4']['contenu_texte_publie'] ?? 'un travail sur la biodiversité (haies, mares, zones refuges, nichoirs, hôtels à insectes).' ?></li>
                </ul>
                <p><?= $blocs['maraichage_p_7']['contenu_texte_publie'] ?? 'Cette manière de produire permet de proposer des légumes sains, de saison et locaux, de limiter l’impact sur l’eau et les sols, et de créer un cadre d’apprentissage riche pour les salariés.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['maraichage_h2_3']['contenu_texte_publie'] ?? 'Comment se procurer nos légumes ?' ?></h2>
                <p><?= $blocs['maraichage_p_8']['contenu_texte_publie'] ?? 'Les légumes produits par Nœux Environnement sont proposés :' ?></p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li><?= $blocs['maraichage_li_5']['contenu_texte_publie'] ?? 'en paniers de légumes préparés chaque semaine ;' ?></li>
                    <li><?= $blocs['maraichage_li_6']['contenu_texte_publie'] ?? 'lors de ventes sur place et marchés, notamment à La Réserve ;' ?></li>
                    <li><?= $blocs['maraichage_li_7']['contenu_texte_publie'] ?? 'via la plateforme de producteurs locaux LeCourtCircuit.fr, où “Les Maraîchers de Nœux Environnement” sont présents comme producteur bio, avec La Réserve comme point de retrait.' ?></li>
                </ul>
                <p><?= $blocs['maraichage_p_9']['contenu_texte_publie'] ?? 'Les paniers contiennent selon la saison : salades, pommes de terre, carottes, poireaux, oignons, courges, radis, tomates, choux, etc.' ?></p>
                <a href="<?= htmlspecialchars($blocs['maraichage_a_1']['url_publie'] ?? 'index.php?view=paniers') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                    <?= $blocs['maraichage_a_1']['contenu_texte_publie'] ?? 'Tout savoir sur nos paniers de légumes' ?>
                </a>
            </div>
        </section>

        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2><?= $blocs['maraichage_h2_4']['contenu_texte_publie'] ?? 'Le panier solidaire : accessible à tous' ?></h2>
                    <p><?= $blocs['maraichage_p_10']['contenu_texte_publie'] ?? 'En complément des paniers “classiques”, l’association met en place un “panier solidaire”. Le même panier de légumes peut être proposé à prix réduit pour certaines familles, la réduction dépendant du quotient familial communiqué par la CAF.' ?></p>
                    <p><?= $blocs['maraichage_p_11']['contenu_texte_publie'] ?? 'Ce système permet de soutenir des ménages aux revenus plus modestes, tout en maintenant un prix juste pour les producteurs.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['maraichage_img_2']['chemin_fichier'] ?? 'assets/images/vente_legume.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['maraichage_img_2']['texte_alt'] ?? 'Panier de légumes') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2><?= $blocs['maraichage_h2_5']['contenu_texte_publie'] ?? 'La Réserve, lieu de vente et de rencontre' ?></h2>
                <p><?= $blocs['maraichage_p_12']['contenu_texte_publie'] ?? 'Chaque semaine, La Réserve devient un lieu de rendez-vous pour les amateurs de produits locaux : vente directe de légumes de Nœux Environnement, retrait des commandes passées sur LeCourtCircuit.fr, et parfois présence d’autres producteurs.' ?></p>
                <p><?= $blocs['maraichage_p_13']['contenu_texte_publie'] ?? 'C’est l’occasion de discuter avec les maraîchers, découvrir les jardins et rencontrer d’autres acteurs du territoire.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['maraichage_h2_6']['contenu_texte_publie'] ?? 'Apprendre un métier en produisant des légumes' ?></h2>
                <p><?= $blocs['maraichage_p_14']['contenu_texte_publie'] ?? 'L’activité maraîchère sert de support de travail aux salariés en parcours d’insertion : préparation des sols, semis, plantation, désherbage manuel, récolte, lavage, pesée, préparation des paniers, accueil des clients.' ?></p>
                <p><?= $blocs['maraichage_p_15']['contenu_texte_publie'] ?? 'Ces tâches permettent de développer des compétences techniques en agriculture écologique et en logistique, des habitudes professionnelles et une meilleure connaissance du tissu local.' ?></p>
            </div>
        </section>

        <section class="content-section" style="text-align: center;">
            <h2><?= $blocs['maraichage_h2_7']['contenu_texte_publie'] ?? 'Mieux manger, plus près de chez soi' ?></h2>
            <p><?= $blocs['maraichage_p_16']['contenu_texte_publie'] ?? 'À travers ce projet maraîcher, Nœux Environnement souhaite encourager la consommation de produits frais, de saison, issus du territoire, montrer que l’on peut manger mieux sans forcément dépenser plus, et proposer des supports pédagogiques pour parler alimentation, santé, budget et gaspillage alimentaire.' ?></p>
        </section>

    </main>