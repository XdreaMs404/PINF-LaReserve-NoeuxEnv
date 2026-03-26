<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=qui-sommes-nous");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Qui sommes-nous ?" est 2
$page_id = 2;

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
    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= htmlspecialchars($blocs['header_image']['chemin_fichier'] ?? 'assets/images/photo_marechage_potagers_vueDeHaut.jpg') ?>');">
    <h1><?= $blocs['header_titre']['contenu_texte_publie'] ?? 'Qui sommes-nous ?' ?></h1>
</section>

<main class="container">
    <section class="content-section" style="text-align: center; display: block;">
        <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">
            <?= $blocs['qui-sommes-nous_p_1']['contenu_texte_publie'] ?? 'Depuis 1991, Nœux Environnement agit pour la nature, la biodiversité et l’insertion des personnes éloignées de l’emploi.' ?>
        </p>
        <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">
            <?= $blocs['qui-sommes-nous_p_2']['contenu_texte_publie'] ?? 'Notre objectif est simple : prendre soin des milieux naturels de notre territoire tout en créant des emplois et des parcours d’insertion pour des habitants qui veulent rebondir.' ?>
        </p>
    </section>

    <section class="content-section">
        <div class="text-image-block">
            <div class="text-content">
                <h2><?= $blocs['qui-sommes-nous_h2_1']['contenu_texte_publie'] ?? 'Une histoire née au bord de la Loisne' ?></h2>
                <p><?= $blocs['qui-sommes-nous_p_3']['contenu_texte_publie'] ?? 'C’est le 28 juin 1991 que l’association Nœux Environnement voit officiellement le jour. À cette époque, parler de “gestion et protection des milieux naturels” est encore assez nouveau.' ?></p>
                <p><?= $blocs['qui-sommes-nous_p_4']['contenu_texte_publie'] ?? 'Au départ, l’idée est de nettoyer et réhabiliter la Loisne, un cours d’eau très marqué par les activités humaines. Avec une petite équipe de passionnés, l’association commence par enlever les déchets, consolider les berges, remettre de la végétation adaptée et utiliser des techniques dites “douces”.' ?></p>
                <p><?= $blocs['qui-sommes-nous_p_5']['contenu_texte_publie'] ?? 'Très vite, ces chantiers s’ouvrent à des personnes éloignées de l’emploi. Nous leur proposons des contrats aidés et des formations pour acquérir une expérience et retrouver un projet professionnel.' ?></p>
                <p><?= $blocs['qui-sommes-nous_p_6']['contenu_texte_publie'] ?? 'À partir de 1996, notre champ d’action s’élargit : sentiers de randonnée, zones humides, jardins naturels, études écologiques… Les idées se multiplient pour mieux connaître et mieux protéger notre environnement.' ?></p>
                <p><?= $blocs['qui-sommes-nous_p_7']['contenu_texte_publie'] ?? 'Au milieu des années 2000, un nouveau projet voit le jour : “Les Jardins du Cœur”. Grâce à la culture maraîchère, nous développons alors la production de légumes de saison, vendus localement, tout en créant de nouveaux postes d’insertion.' ?></p>
                <p><?= $blocs['qui-sommes-nous_p_8']['contenu_texte_publie'] ?? 'Aujourd’hui, avec La Réserve – notre nouveau lieu de travail et de vie – cette histoire continue : anciens sites dégradés, friches, bords de cours d’eau ou jardins deviennent des espaces à la fois utiles pour la nature et utiles pour les gens.' ?></p>
            </div>
            <div class="image-content">
                <img src="<?= htmlspecialchars($blocs['histoire_image']['chemin_fichier'] ?? 'assets/images/lareserve_en_dessin.jpg') ?>" 
                     alt="<?= htmlspecialchars($blocs['histoire_image']['texte_alt'] ?? 'Histoire de Noeux Environnement') ?>">
            </div>
        </div>
    </section>

    <section class="content-section" style="display: block;">
        <h2 class="section-title"><?= $blocs['qui-sommes-nous_h2_2']['contenu_texte_publie'] ?? 'Nos valeurs au quotidien' ?></h2>
        <div class="grid-2">
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3><?= $blocs['qui-sommes-nous_h3_1']['contenu_texte_publie'] ?? 'Respect de la nature' ?></h3>
                    <p><?= $blocs['qui-sommes-nous_p_9']['contenu_texte_publie'] ?? 'Nous considérons les rivières, les zones humides, les jardins et la biodiversité comme de vrais patrimoines collectifs. Nos chantiers sont pensés pour améliorer l’état des milieux sans les abîmer : interventions progressives, choix des périodes, maintien d’espaces refuges pour la faune et la flore.' ?></p>
                </div>
            </div>
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3><?= $blocs['qui-sommes-nous_h3_2']['contenu_texte_publie'] ?? 'Solidarité et insertion' ?></h3>
                    <p><?= $blocs['qui-sommes-nous_p_10']['contenu_texte_publie'] ?? 'Derrière chaque haie plantée, chaque mare entretenue, chaque panier de légumes, il y a des parcours de vie. Nous accompagnons des personnes qui ont besoin d’un coup de pouce pour revenir vers l’emploi : un cadre de travail, une équipe, des repères, des formations, du temps pour construire la suite.' ?></p>
                </div>
            </div>
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3><?= $blocs['qui-sommes-nous_h3_3']['contenu_texte_publie'] ?? 'Éducation et partage' ?></h3>
                    <p><?= $blocs['qui-sommes-nous_p_11']['contenu_texte_publie'] ?? 'Pour nous, protéger l’environnement passe aussi par la compréhension et le partage. Nous accueillons des écoles, des centres de loisirs, des groupes d’adultes ; nous participons à des événements locaux, des chantiers participatifs, des sorties nature. L’idée est toujours la même : faire découvrir, expliquer simplement, donner envie d’agir.' ?></p>
                </div>
            </div>
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3><?= $blocs['qui-sommes-nous_h3_4']['contenu_texte_publie'] ?? 'Coopération sur le territoire' ?></h3>
                    <p><?= $blocs['qui-sommes-nous_p_12']['contenu_texte_publie'] ?? 'Nœux Environnement travaille avec de nombreux partenaires : communes, intercommunalité, Région, Département, associations, réseaux de l’insertion et de l’éducation à l’environnement. Cette coopération nous permet de mener des projets à l’échelle du territoire, là où vivent les habitants.' ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="text-image-block reverse">
            <div class="text-content">
                <h2><?= $blocs['qui-sommes-nous_h2_3']['contenu_texte_publie'] ?? 'Une association… et une structure d’insertion' ?></h2>
                <p><?= $blocs['qui-sommes-nous_p_13']['contenu_texte_publie'] ?? 'Nous sommes une association loi 1901, avec une assemblée générale d’adhérents, un conseil d’administration et un bureau, une équipe de salariés permanents et une équipe de salariés en insertion.' ?></p>
                <p><?= $blocs['qui-sommes-nous_p_14']['contenu_texte_publie'] ?? 'Nœux Environnement est reconnue comme structure d’insertion par l’activité économique (IAE). Concrètement, cela signifie que nous proposons :' ?></p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li><?= $blocs['qui-sommes-nous_li_1']['contenu_texte_publie'] ?? 'des contrats d’insertion,' ?></li>
                    <li><?= $blocs['qui-sommes-nous_li_2']['contenu_texte_publie'] ?? 'un accompagnement socio-professionnel,' ?></li>
                    <li><?= $blocs['qui-sommes-nous_li_3']['contenu_texte_publie'] ?? 'des activités supports (chantiers nature, maraîchage, atelier menuiserie…),' ?></li>
                    <li><?= $blocs['qui-sommes-nous_li_4']['contenu_texte_publie'] ?? 'un travail pour préparer l’après : retour à l’emploi, formation, projet personnel.' ?></li>
                </ul>
            </div>
            <div class="image-content">
                <img src="<?= htmlspecialchars($blocs['structure_image']['chemin_fichier'] ?? 'assets/images/acceuil_locaux.jpeg') ?>" 
                     alt="<?= htmlspecialchars($blocs['structure_image']['texte_alt'] ?? 'L\'équipe de Noeux Environnement') ?>">
            </div>
        </div>
    </section>

    <section class="content-section" style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
        <div class="text-content">
            <h2><?= $blocs['qui-sommes-nous_h2_4']['contenu_texte_publie'] ?? 'Nos lieux d’action' ?></h2>
            <p><?= $blocs['qui-sommes-nous_p_15']['contenu_texte_publie'] ?? 'Nos actions se déploient :' ?></p>
            <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                <li><?= $blocs['qui-sommes-nous_li_5']['contenu_texte_publie'] ?? 'à La Réserve à Nœux-les-Mines, qui est devenue notre lieu central de travail et d’accueil ;' ?></li>
                <li><?= $blocs['qui-sommes-nous_li_6']['contenu_texte_publie'] ?? 'sur de nombreux sites naturels du territoire (cours d’eau, zones humides, sentiers…) ;' ?></li>
                <li><?= $blocs['qui-sommes-nous_li_7']['contenu_texte_publie'] ?? 'directement chez nos partenaires : communes, écoles, associations, structures sociales…' ?></li>
            </ul>
            <p><?= $blocs['qui-sommes-nous_p_16']['contenu_texte_publie'] ?? 'En venant à La Réserve, en croisant nos équipes sur un chantier ou en achetant un panier de légumes, vous rencontrez un petit morceau de l’histoire de Nœux Environnement.' ?></p>
        </div>
    </section>

    <section class="content-section" style="margin-top: 4rem;">
        <h2 class="section-title"><?= $blocs['qui-sommes-nous_h2_5']['contenu_texte_publie'] ?? 'Nos livrets à télécharger' ?></h2>
        <div class="grid-2">
            <div class="card"
                style="box-shadow: none; border: 1px solid #388e3c; background-color: #f1f8e9; display: flex; flex-direction: column; justify-content: space-between;">
                <div class="card-content">
                    <h3 style="color: var(--primary-color);"><?= $blocs['qui-sommes-nous_h3_5']['contenu_texte_publie'] ?? 'Livret Pédagogique' ?></h3>
                    <p><?= $blocs['qui-sommes-nous_p_17']['contenu_texte_publie'] ?? 'Découvrez notre projet d\'éducation à l\'environnement, nos thématiques d\'animations et nos approches pédagogiques pour les scolaires et le grand public.' ?></p>
                </div>
                <div class="card-content" style="padding-top: 0;">
                    <a href="<?= htmlspecialchars($blocs['qui-sommes-nous_a_1']['url_publie'] ?? 'assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf') ?>" class="btn btn-primary"
                        target="_blank" style="display: inline-block; width: 100%; text-align: center;">
                        <?= htmlspecialchars($blocs['qui-sommes-nous_a_1']['contenu_texte_publie'] ?? 'Télécharger le guide (PDF)') ?>
                    </a>
                </div>
            </div>
            <div class="card"
                style="box-shadow: none; border: 1px solid #2e7d32; background-color: #f1f8e9; display: flex; flex-direction: column; justify-content: space-between;">
                <div class="card-content">
                    <h3 style="color: var(--primary-color);"><?= $blocs['qui-sommes-nous_h3_6']['contenu_texte_publie'] ?? 'Livret Associatif' ?></h3>
                    <p><?= $blocs['qui-sommes-nous_p_18']['contenu_texte_publie'] ?? 'Retrouvez l\'essentiel de notre projet associatif, le bilan de nos actions et nos perspectives. Un document pour mieux comprendre notre engagement.' ?></p>
                </div>
                <div class="card-content" style="padding-top: 0;">
                    <a href="<?= htmlspecialchars($blocs['qui-sommes-nous_a_2']['url_publie'] ?? 'assets/docs/journal-asso-2025.pdf') ?>" class="btn btn-primary" target="_blank"
                        style="display: inline-block; width: 100%; text-align: center;">
                        <?= htmlspecialchars($blocs['qui-sommes-nous_a_2']['contenu_texte_publie'] ?? 'Télécharger le journal (PDF)') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>