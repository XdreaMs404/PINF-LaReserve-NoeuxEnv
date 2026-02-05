<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=education");
	die("");
}

?>

    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/cours_education_enfant.jpg');">
        <h1>Éducation & Sensibilisation</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Protéger l’environnement, c’est aussi donner
                envie d’agir.</p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">Depuis 1996, Nœux Environnement
                développe des actions d’éducation à l’environnement : animations scolaires, ateliers tout public,
                sorties nature, chantiers participatifs…</p>
        </section>

        <!-- Objectifs -->
        <section class="content-section">
            <div class="text-content">
                <h2>Découvrir, comprendre, protéger</h2>
                <p>Nos animations ont trois objectifs simples :</p>
                <ol style="list-style-type: decimal; padding-left: 2rem; margin-bottom: 1rem;">
                    <li>Découvrir la nature qui nous entoure (faune, flore, paysages, eau, jardins…) ;</li>
                    <li>Comprendre les liens entre nos gestes quotidiens, l’environnement et la santé ;</li>
                    <li>Donner envie de passer à l’action, à son échelle, à la maison, à l’école, dans son quartier.
                    </li>
                </ol>
                <p>La démarche est toujours la même : partir du concret, manipuler, observer, expérimenter… et partager
                    un moment convivial.</p>
            </div>
        </section>

        <!-- Publics -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Des animations pour tous les publics</h2>
                <p>Nœux Environnement s’adresse aux scolaires (de la maternelle au lycée), aux centres de loisirs et
                    structures jeunesse, au grand public (familles, habitants, associations, groupes d’adultes), et
                    parfois à des entreprises ou institutions.</p>
                <p>Les animations peuvent être ouvertes à tous (programmation “tout public”) ou réservées à un groupe.
                </p>
            </div>
        </section>

        <!-- Thématiques -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Quelques exemples de thématiques</h2>
                    <p>En fonction des saisons et des lieux, nous proposons par exemple :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><strong>Eau et zones humides :</strong> cycle de l’eau, petites bêtes aquatiques, fonction
                            des marais, qualité de l’eau…</li>
                        <li><strong>Biodiversité :</strong> insectes pollinisateurs, oiseaux, traces d’animaux, chaînes
                            alimentaires, milieux naturels proches de chez nous.</li>
                        <li><strong>Jardinage naturel & compost :</strong> sol vivant, paillage, rotation des cultures,
                            compostage, semis, association de plantes.</li>
                        <li><strong>Alimentation et santé :</strong> lien entre légumes de saison, circuits courts,
                            gaspillage alimentaire, équilibre alimentaire.</li>
                        <li><strong>Déchets & sobriété :</strong> réduire, réutiliser, trier, fabriquer soi-même.</li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="assets/images/cours_education_enfant.jpg" alt="Animation nature">
                </div>
            </div>
        </section>

        <!-- Scolaires -->
        <section class="content-section">
            <div class="text-content">
                <h2>Animations scolaires : un partenariat avec l’Éducation nationale</h2>
                <p>Depuis 1996, Nœux Environnement propose des animations pédagogiques pour les écoles. L’association
                    est agréée par l’Éducation nationale comme association éducative complémentaire de l’enseignement
                    public.</p>
                <p>Les interventions s’adaptent aux cycles, s’inscrivent dans les programmes et peuvent se dérouler à La
                    Réserve, sur les sites naturels, dans l’enceinte de l’école ou dans un lieu choisi avec les
                    enseignants.</p>
            </div>
        </section>

        <!-- Tout public -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Ateliers et sorties pour tous</h2>
                <p>Tout au long de l’année, nous programmons des animations tout public : balades nature, ateliers
                    jardinage, visites thématiques à La Réserve, participation à des événements.</p>
                <p>Ces moments sont pensés comme des temps conviviaux, participatifs et concrets.</p>
            </div>
        </section>

        <!-- Chantiers participatifs -->
        <section class="content-section">
            <div class="text-content">
                <h2>Agir ensemble sur le terrain</h2>
                <p>En plus des animations classiques, Nœux Environnement anime ou co-anime des chantiers participatifs
                    (plantations de haies, entretien de sentiers…) et des projets avec des communes ou des structures.
                </p>
                <p>Ces projets permettent de rassembler habitants, élus, associations et de montrer que la protection de
                    la nature peut être un moment de vie locale.</p>
            </div>
        </section>

        <!-- Details Education -->
        <!-- Une section détaillée sur l'éducation à l'environnement -->
        <!-- Call to Action -->
        <section class="content-section"
            style="background-color: var(--primary-color); color: var(--white); padding: 3rem; border-radius: 8px; text-align: center;">
            <h2 style="color: var(--white);">Préparer votre projet avec Nœux Environnement</h2>
            <p style="margin-bottom: 2rem;">Vous êtes enseignant, animateur, responsable d’association, élu, référent
                d’un groupe… et vous souhaitez mettre en place une animation ?</p>
            <a href="index.php?view=contact" class="btn btn-secondary"
                style="background-color: var(--white); color: var(--primary-color);">Demander une animation / une
                visite</a>
            <a href="assets/docs/livret_pedagogique.pdf" target="_blank" class="btn btn-secondary"
                style="background-color: var(--white); color: var(--primary-color); margin-left: 1rem;">Télécharger le livret pédagogique</a>
        </section>

    </main>

