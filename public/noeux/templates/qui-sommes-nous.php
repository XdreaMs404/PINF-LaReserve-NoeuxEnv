<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=qui-sommes-nous");
    die("");
}

?>

<!-- En-tête de la page (Page Header) avec une image de fond -->
<section class="page-header"
    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/photo_marechage_potagers_vueDeHaut.jpg');">
    <h1>Qui sommes-nous ?</h1>
</section>

<!-- Le contenu principal -->
<main class="container">
    <!-- Intro -->
    <!-- Un petit texte d'introduction -->
    <section class="content-section" style="text-align: center; display: block;">
        <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Depuis 1991, Nœux Environnement agit pour la
            nature, la biodiversité et l’insertion des personnes éloignées de l’emploi.</p>
        <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">Notre objectif est simple : prendre
            soin des milieux naturels de notre territoire tout en créant des emplois et des parcours d’insertion
            pour des habitants qui veulent rebondir.</p>
    </section>

    <!-- Histoire -->
    <!-- Une section sur l'histoire de l'association -->
    <section class="content-section">
        <div class="text-image-block">
            <div class="text-content">
                <h2>Une histoire née au bord de la Loisne</h2>
                <p>C’est le 28 juin 1991 que l’association Nœux Environnement voit officiellement le jour. À cette
                    époque, parler de “gestion et protection des milieux naturels” est encore assez nouveau.</p>
                <p>Au départ, l’idée est de nettoyer et réhabiliter la Loisne, un cours d’eau très marqué par les
                    activités humaines. Avec une petite équipe de passionnés, l’association commence par enlever les
                    déchets, consolider les berges, remettre de la végétation adaptée et utiliser des techniques
                    dites “douces”.</p>
                <p>Très vite, ces chantiers s’ouvrent à des personnes éloignées de l’emploi. Nous leur proposons des
                    contrats aidés et des formations pour acquérir une expérience et retrouver un projet
                    professionnel.</p>
                <p>À partir de 1996, notre champ d’action s’élargit : sentiers de randonnée, zones humides, jardins
                    naturels, études écologiques… Les idées se multiplient pour mieux connaître et mieux protéger
                    notre environnement.</p>
                <p>Au milieu des années 2000, un nouveau projet voit le jour : “Les Jardins du Cœur”. Grâce à la
                    culture maraîchère, nous développons alors la production de légumes de saison, vendus
                    localement, tout en créant de nouveaux postes d’insertion.</p>
                <p>Aujourd’hui, avec La Réserve – notre nouveau lieu de travail et de vie – cette histoire continue
                    : anciens sites dégradés, friches, bords de cours d’eau ou jardins deviennent des espaces à la
                    fois utiles pour la nature et utiles pour les gens.</p>
            </div>
            <div class="image-content">
                <img src="assets/images/lareserve_en_dessin.jpg" alt="Histoire de Noeux Environnement">
            </div>
        </div>
    </section>

    <!-- Valeurs -->
    <section class="content-section" style="display: block;">
        <h2 class="section-title">Nos valeurs au quotidien</h2>
        <div class="grid-2">
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3>Respect de la nature</h3>
                    <p>Nous considérons les rivières, les zones humides, les jardins et la biodiversité comme de
                        vrais patrimoines collectifs. Nos chantiers sont pensés pour améliorer l’état des milieux
                        sans les abîmer : interventions progressives, choix des périodes, maintien d’espaces refuges
                        pour la faune et la flore.</p>
                </div>
            </div>
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3>Solidarité et insertion</h3>
                    <p>Derrière chaque haie plantée, chaque mare entretenue, chaque panier de légumes, il y a des
                        parcours de vie. Nous accompagnons des personnes qui ont besoin d’un coup de pouce pour
                        revenir vers l’emploi : un cadre de travail, une équipe, des repères, des formations, du
                        temps pour construire la suite.</p>
                </div>
            </div>
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3>Éducation et partage</h3>
                    <p>Pour nous, protéger l’environnement passe aussi par la compréhension et le partage. Nous
                        accueillons des écoles, des centres de loisirs, des groupes d’adultes ; nous participons à
                        des événements locaux, des chantiers participatifs, des sorties nature. L’idée est toujours
                        la même : faire découvrir, expliquer simplement, donner envie d’agir.</p>
                </div>
            </div>
            <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                <div class="card-content">
                    <h3>Coopération sur le territoire</h3>
                    <p>Nœux Environnement travaille avec de nombreux partenaires : communes, intercommunalité,
                        Région, Département, associations, réseaux de l’insertion et de l’éducation à
                        l’environnement. Cette coopération nous permet de mener des projets à l’échelle du
                        territoire, là où vivent les habitants.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Structure -->
    <section class="content-section">
        <div class="text-image-block reverse">
            <div class="text-content">
                <h2>Une association… et une structure d’insertion</h2>
                <p>Nous sommes une association loi 1901, avec une assemblée générale d’adhérents, un conseil
                    d’administration et un bureau, une équipe de salariés permanents et une équipe de salariés en
                    insertion.</p>
                <p>Nœux Environnement est reconnue comme structure d’insertion par l’activité économique (IAE).
                    Concrètement, cela signifie que nous proposons :</p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li>des contrats d’insertion,</li>
                    <li>un accompagnement socio-professionnel,</li>
                    <li>des activités supports (chantiers nature, maraîchage, atelier menuiserie…),</li>
                    <li>un travail pour préparer l’après : retour à l’emploi, formation, projet personnel.</li>
                </ul>
            </div>
            <div class="image-content">
                <img src="assets/images/acceuil_locaux.jpeg" alt="L'équipe de Noeux Environnement">
            </div>
        </div>
    </section>

    <!-- Lieux d'action -->
    <section class="content-section" style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
        <div class="text-content">
            <h2>Nos lieux d’action</h2>
            <p>Nos actions se déploient :</p>
            <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                <li>à La Réserve à Nœux-les-Mines, qui est devenue notre lieu central de travail et d’accueil ;</li>
                <li>sur de nombreux sites naturels du territoire (cours d’eau, zones humides, sentiers…) ;</li>
                <li>directement chez nos partenaires : communes, écoles, associations, structures sociales…</li>
            </ul>
            <p>En venant à La Réserve, en croisant nos équipes sur un chantier ou en achetant un panier de légumes,
                vous rencontrez un petit morceau de l’histoire de Nœux Environnement.</p>
        </div>
    </section>

    <!-- Ressources Téléchargeables -->
    <section class="content-section" style="margin-top: 4rem;">
        <h2 class="section-title">Nos livrets à télécharger</h2>
        <div class="grid-2">
            <div class="card"
                style="box-shadow: none; border: 1px solid #388e3c; background-color: #f1f8e9; display: flex; flex-direction: column; justify-content: space-between;">
                <div class="card-content">
                    <h3 style="color: var(--primary-color);">Livret Pédagogique</h3>
                    <p>Découvrez notre projet d'éducation à l'environnement, nos thématiques d'animations et nos
                        approches pédagogiques pour les scolaires et le grand public.</p>
                </div>
                <div class="card-content" style="padding-top: 0;">
                    <a href="assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf" class="btn btn-primary"
                        target="_blank" style="display: inline-block; width: 100%; text-align: center;">Télécharger le
                        guide (PDF)</a>
                </div>
            </div>
            <div class="card"
                style="box-shadow: none; border: 1px solid #2e7d32; background-color: #f1f8e9; display: flex; flex-direction: column; justify-content: space-between;">
                <div class="card-content">
                    <h3 style="color: var(--primary-color);">Livret Associatif</h3>
                    <p>Retrouvez l'essentiel de notre projet associatif, le bilan de nos actions et nos perspectives. Un
                        document pour mieux comprendre notre engagement.</p>
                </div>
                <div class="card-content" style="padding-top: 0;">
                    <a href="assets/docs/journal-asso-2025.pdf" class="btn btn-primary" target="_blank"
                        style="display: inline-block; width: 100%; text-align: center;">Télécharger le journal (PDF)</a>
                </div>
            </div>
        </div>
    </section>

</main>