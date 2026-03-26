<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=visites");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Visites" est 16
$page_id = 16;

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

    <section class="hero" style="background-image: url('<?= htmlspecialchars($blocs['visites_hero_img']['chemin_fichier'] ?? 'assets/images/inauguration_festive_exterieur_locaux.jpg') ?>');">
        <div class="hero-content">
            <h1><?= $blocs['visites_hero_h1']['contenu_texte_publie'] ?? 'Visites & Animations' ?></h1>
            <p><?= $blocs['visites_hero_p_1']['contenu_texte_publie'] ?? 'La Réserve est un lieu qui se visite et qui se vit.' ?></p>
            <p><?= $blocs['visites_hero_p_2']['contenu_texte_publie'] ?? 'Nous accueillons toute l’année : des visites guidées du site (bâtiment, jardins, maraîchage), des animations nature et jardin, des ateliers autour de l’alimentation, et des journées professionnelles et techniques.' ?></p>
            <p><?= $blocs['visites_hero_p_3']['contenu_texte_publie'] ?? 'Que vous soyez habitants, enseignants, animateurs, association, entreprise ou collectivité, nous pouvons construire avec vous une visite ou une animation adaptée.' ?></p>
            <div class="hero-buttons">
                <a href="<?= htmlspecialchars($blocs['visites_hero_a_1']['url_publie'] ?? 'index.php?view=agenda') ?>" class="btn btn-accent">
                    <?= $blocs['visites_hero_a_1']['contenu_texte_publie'] ?? 'Voir les prochains événements' ?>
                </a>
                <a href="<?= htmlspecialchars($blocs['visites_hero_a_2']['url_publie'] ?? 'index.php?view=contact&subject=visite') ?>" class="btn btn-primary">
                    <?= $blocs['visites_hero_a_2']['contenu_texte_publie'] ?? 'Demander une visite ou une animation' ?>
                </a>
            </div>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <h2 class="section-title"><?= $blocs['visites_h2_1']['contenu_texte_publie'] ?? 'Pour le grand public et les familles' ?></h2>
            <div class="text-content">
                <p><?= $blocs['visites_p_1']['contenu_texte_publie'] ?? 'Plusieurs fois par an, La Réserve propose des visites et ateliers ouverts à tous :' ?></p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li><?= $blocs['visites_li_1']['contenu_texte_publie'] ?? '<strong>visites guidées du site</strong> (histoire de la friche, bâtiment, jardins, maraîchage…) ;' ?></li>
                    <li><?= $blocs['visites_li_2']['contenu_texte_publie'] ?? '<strong>balades dans les jardins</strong> : sol vivant, compost, biodiversité ;' ?></li>
                    <li><?= $blocs['visites_li_3']['contenu_texte_publie'] ?? '<strong>ateliers pratiques</strong> : jardiner au naturel, bricolage nature, cuisine des légumes de saison…' ?></li>
                </ul>
                <p style="margin-top: 1rem;"><?= $blocs['visites_p_2']['contenu_texte_publie'] ?? 'Ces rendez-vous sont annoncés dans notre agenda.' ?></p>
                <div
                    style="margin-top: 2rem; padding: 1.5rem; background-color: var(--background-color); border-left: 5px solid var(--accent-color); border-radius: 4px;">
                    <p><?= $blocs['visites_p_3']['contenu_texte_publie'] ?? '🔎 <strong>Pour connaître les prochaines dates, consultez la page Agenda.</strong>' ?></p>
                    <p><?= $blocs['visites_p_4']['contenu_texte_publie'] ?? 'Si vous souhaitez organiser un groupe de particuliers (amis, voisins, association…), contactez-nous via la page Contact & demandes.' ?></p>
                </div>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content">
                <h2><?= $blocs['visites_h2_2']['contenu_texte_publie'] ?? 'Venir avec une classe ou un groupe de jeunes' ?></h2>
                <p><?= $blocs['visites_p_5']['contenu_texte_publie'] ?? 'En lien avec Nœux Environnement, La Réserve accueille des :' ?></p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li><?= $blocs['visites_li_4']['contenu_texte_publie'] ?? 'classes (de la maternelle au lycée),' ?></li>
                    <li><?= $blocs['visites_li_5']['contenu_texte_publie'] ?? 'centres de loisirs et structures jeunesse,' ?></li>
                    <li><?= $blocs['visites_li_6']['contenu_texte_publie'] ?? 'groupes d’enfants ou d’ados accompagnés par des éducateurs.' ?></li>
                </ul>
                <p style="margin-top: 1rem;"><?= $blocs['visites_p_6']['contenu_texte_publie'] ?? 'Les animations s’appuient sur le bâtiment (énergie, matériaux, eau), les jardins et le maraîchage, et les espaces extérieurs (biodiversité, sols, eau, climat).' ?></p>
                <p style="margin-top: 1rem;"><?= $blocs['visites_p_7']['contenu_texte_publie'] ?? '<strong>Exemples de thèmes :</strong> “Comprendre un écolieu vivant”, “Du sol à l’assiette”, “Biodiversité autour de nous”, “Changer nos habitudes pour le climat”.' ?></p>
                <div
                    style="margin-top: 2rem; padding: 1.5rem; background-color: var(--background-color); border-left: 5px solid var(--primary-color); border-radius: 4px;">
                    <p><?= $blocs['visites_p_8']['contenu_texte_publie'] ?? '📌 <strong>Nous adaptons le contenu à :</strong> l’âge des participants, les programmes scolaires, votre projet pédagogique.' ?></p>
                    <p><?= $blocs['visites_p_9']['contenu_texte_publie'] ?? '👉 Pour construire une visite scolaire ou un projet sur plusieurs séances, merci de passer par la page Contact & demandes (sujet : “Visite / animation”).' ?></p>
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['visites_h2_3']['contenu_texte_publie'] ?? 'Visites techniques et journées professionnelles' ?></h2>
                <p><?= $blocs['visites_p_10']['contenu_texte_publie'] ?? 'La Réserve est un site ressource pour les professionnels qui s’intéressent à la transition écologique :' ?></p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li><?= $blocs['visites_li_7']['contenu_texte_publie'] ?? 'élus et services techniques de collectivités,' ?></li>
                    <li><?= $blocs['visites_li_8']['contenu_texte_publie'] ?? 'bureaux d’études, architectes, paysagistes, urbanistes,' ?></li>
                    <li><?= $blocs['visites_li_9']['contenu_texte_publie'] ?? 'organismes de formation, écoles, universités,' ?></li>
                    <li><?= $blocs['visites_li_10']['contenu_texte_publie'] ?? 'entreprises engagées dans la RSE et la transition.' ?></li>
                </ul>
                <p style="margin-top: 1rem;"><?= $blocs['visites_p_11']['contenu_texte_publie'] ?? '<strong>Thématiques possibles :</strong> transformation d’une friche commerciale en écolieu, désimperméabilisation et renaturation, réhabilitation frugale d’un bâtiment, tiers-lieu nourricier, maraîchage et alimentation, articulation projet social – projet écologique.' ?></p>
                <div
                    style="margin-top: 2rem; padding: 1.5rem; background-color: var(--white); border: 1px solid #ddd; border-radius: 4px;">
                    <p><?= $blocs['visites_p_12']['contenu_texte_publie'] ?? 'Les visites techniques peuvent combiner : des temps en salle (présentation, échanges), une visite commentée du site, des ateliers de terrain.' ?></p>
                    <p style="margin-top: 0.5rem;"><?= $blocs['visites_p_13']['contenu_texte_publie'] ?? '👉 Pour organiser une visite technique ou une journée pro, merci d’utiliser la page Contact & demandes (sujet : “Visite / animation – public professionnel”).' ?></p>
                </div>
            </div>
        </section>

        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title"><?= $blocs['visites_h2_4']['contenu_texte_publie'] ?? 'Comment ça se passe ?' ?></h2>
            <div class="grid-3">
                <div class="card">
                    <h3><?= $blocs['visites_h3_1']['contenu_texte_publie'] ?? '1. Vous nous contactez' ?></h3>
                    <p><?= $blocs['visites_p_14']['contenu_texte_publie'] ?? 'Via la page Contact, sujet “Visite / animation”, en précisant : type de public, nombre de personnes, âge, thème souhaité, dates possibles.' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['visites_h3_2']['contenu_texte_publie'] ?? '2. Nous construisons ensemble' ?></h3>
                    <p><?= $blocs['visites_p_15']['contenu_texte_publie'] ?? 'Nous définissons le contenu de la visite / animation, la durée, les horaires, et l\'organisation pratique (accès, équipements, repas, etc.).' ?></p>
                </div>
                <div class="card">
                    <h3><?= $blocs['visites_h3_3']['contenu_texte_publie'] ?? '3. Nous confirmons' ?></h3>
                    <p><?= $blocs['visites_p_16']['contenu_texte_publie'] ?? 'Nous validons la date et les modalités. Vous recevez un mail récapitulatif, avec, si besoin, une convention ou un devis.' ?></p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <p style="font-size: 1.2rem; margin-bottom: 1rem;"><?= $blocs['visites_p_17']['contenu_texte_publie'] ?? '🎟️ Prêt à préparer une visite ?' ?></p>
                <a href="<?= htmlspecialchars($blocs['visites_a_1']['url_publie'] ?? 'index.php?view=contact&subject=visite') ?>" class="btn btn-primary">
                    <?= $blocs['visites_a_1']['contenu_texte_publie'] ?? 'Demander une visite ou une animation' ?>
                </a>
            </div>
        </section>

    </main>