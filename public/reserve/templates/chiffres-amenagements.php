<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=chiffres-amenagements");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Chiffres & Aménagements" est 27
$page_id = 27;

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

    <section class="hero" style="background-image: url('<?= htmlspecialchars($blocs['chiffres-amenagements_hero_img']['chemin_fichier'] ?? '../assets/images/visite_jardin.jpg') ?>');">
        <div class="hero-content">
            <h1><?= $blocs['chiffres-amenagements_hero_h1']['contenu_texte_publie'] ?? 'Chiffres & Aménagements' ?></h1>
            <p><?= $blocs['chiffres-amenagements_hero_p']['contenu_texte_publie'] ?? 'Cette page donne quelques repères concrets sur La Réserve : surfaces, aménagements, choix techniques. Elle permet de mieux comprendre ce qui a été fait sur le site pour en faire un démonstrateur de la transition écologique.' ?></p>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['chiffres-amenagements_h2_1']['contenu_texte_publie'] ?? 'Surfaces et aménagements' ?></h2>
                    <h3><?= $blocs['chiffres-amenagements_h3_1']['contenu_texte_publie'] ?? 'Surfaces du site' ?></h3>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-bottom: 1.5rem;">
                        <li><?= $blocs['chiffres-amenagements_li_1']['contenu_texte_publie'] ?? '<strong>Ancien site de grande distribution</strong> : environ 25 000 m² de friche commerciale attenants à des terres agricoles.' ?></li>
                        <li><?= $blocs['chiffres-amenagements_li_2']['contenu_texte_publie'] ?? '<strong>Bâtiment réhabilité</strong> : plus de 2 000 m².' ?></li>
                        <li><?= $blocs['chiffres-amenagements_li_3']['contenu_texte_publie'] ?? '<strong>Espaces extérieurs repensés</strong> : environ 7 000 m² comprenant cours, cheminements, jardins, maraîchage, verger, micro-forêt, espaces de tests.' ?></li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['chiffres-amenagements_img_1']['chemin_fichier'] ?? 'assets/images/interieur_bois_maquette_locaux.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['chiffres-amenagements_img_1']['texte_alt'] ?? 'Maquette intérieur bois') ?>">
                </div>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2><?= $blocs['chiffres-amenagements_h2_2']['contenu_texte_publie'] ?? 'Le bâtiment : un démonstrateur de rénovation frugale' ?></h2>
                    <h3><?= $blocs['chiffres-amenagements_h3_2']['contenu_texte_publie'] ?? 'Un bâtiment réhabilité plutôt qu’un bâtiment neuf' ?></h3>
                    <p><?= $blocs['chiffres-amenagements_p_1']['contenu_texte_publie'] ?? 'Le choix a été fait de réutiliser l’existant : garder la structure, retravailler l’enveloppe, repenser l’intérieur. C’est un exemple concret de réhabilitation frugale : faire le maximum avec ce qui existe déjà.' ?></p>

                    <h3 style="margin-top: 1.5rem;"><?= $blocs['chiffres-amenagements_h3_3']['contenu_texte_publie'] ?? 'Quelques éléments techniques' ?></h3>
                    <ul style="list-style: disc; margin-left: 1.5rem;">
                        <li><?= $blocs['chiffres-amenagements_li_4']['contenu_texte_publie'] ?? 'Utilisation de matériaux biosourcés et de solutions de réemploi.' ?></li>
                        <li><?= $blocs['chiffres-amenagements_li_5']['contenu_texte_publie'] ?? 'Panneaux photovoltaïques pour l’électricité.' ?></li>
                        <li><?= $blocs['chiffres-amenagements_li_6']['contenu_texte_publie'] ?? 'Dispositifs bioclimatiques (apports solaires, ventilation, isolation).' ?></li>
                        <li><?= $blocs['chiffres-amenagements_li_7']['contenu_texte_publie'] ?? 'Gestion de l’eau (récupération, infiltration).' ?></li>
                    </ul>
                    <p style="margin-top: 1rem;"><?= $blocs['chiffres-amenagements_p_2']['contenu_texte_publie'] ?? 'Le bâtiment devient ainsi un support pour des visites techniques, des formations et des animations pédagogiques.' ?></p>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['chiffres-amenagements_img_2']['chemin_fichier'] ?? 'assets/images/travaux_ouvrier.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['chiffres-amenagements_img_2']['texte_alt'] ?? 'Bâtiment réhabilité') ?>">
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['chiffres-amenagements_h2_3']['contenu_texte_publie'] ?? 'Maraîchage & alimentation' ?></h2>
                <h3><?= $blocs['chiffres-amenagements_h3_4']['contenu_texte_publie'] ?? 'Une ferme maraîchère à La Réserve' ?></h3>
                <p><?= $blocs['chiffres-amenagements_p_3']['contenu_texte_publie'] ?? 'Sur le site, environ 1 hectare est dédié au maraîchage biologique (plein champ, serres tunnels, serre chapelle). Les Maraîchers de Nœux Environnement y produisent des légumes bio de saison vendus en paniers, sur le marché ou en circuits courts.' ?></p>
                <p><?= $blocs['chiffres-amenagements_p_4']['contenu_texte_publie'] ?? 'Le maraîchage est à la fois une activité économique locale, un support d’insertion professionnelle et un terrain d’expérimentation pédagogique.' ?></p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2><?= $blocs['chiffres-amenagements_h2_4']['contenu_texte_publie'] ?? 'Un site ressource pour les professionnels' ?></h2>
                <p><?= $blocs['chiffres-amenagements_p_5']['contenu_texte_publie'] ?? 'Au-delà du grand public, La Réserve accueille collectivités, bureaux d’études, écoles et entreprises pour des visites techniques sur la désimperméabilisation, la réhabilitation frugale, ou le tiers-lieu nourricier.' ?></p>
                <p style="margin-top: 1rem; font-weight: bold;"><?= $blocs['chiffres-amenagements_p_6']['contenu_texte_publie'] ?? 'La Réserve est à la fois un lieu à vivre au quotidien et un site ressource pour celles et ceux qui veulent transformer concrètement leurs territoires.' ?></p>
                <a href="<?= htmlspecialchars($blocs['chiffres-amenagements_a_1']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-primary" style="margin-top: 2rem;">
                    <?= $blocs['chiffres-amenagements_a_1']['contenu_texte_publie'] ?? 'Organiser une visite technique' ?>
                </a>
            </div>
        </section>

    </main>