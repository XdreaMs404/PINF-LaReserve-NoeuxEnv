<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=nos-actions");
	die("");
}

?>



    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/visite_jardin.jpg');">
        <h1>Nos Actions</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Nœux Environnement mène des actions toute
                l’année, avec des publics très différents : habitants, scolaires, collectivités, structures sociales,
                entreprises…</p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">Pour y voir plus clair, nous présentons
                notre travail autour de quatre grands domaines qui se complètent.</p>
        </section>

        <!-- Actions Grid -->
        <div class="grid-2">
            <!-- Nature & Territoires -->
            <article class="card">
                <div class="card-image">
                    <img src="assets/images/visite_jardin.jpg" alt="Nature et Territoires">
                </div>
                <div class="card-content">
                    <h3>Nature & territoires</h3>
                    <p>Nous intervenons sur les milieux naturels pour les préserver et les rendre plus accueillants :
                        cours d’eau, fossés, mares, zones humides ; haies, talus, petites zones boisées ; sentiers de
                        promenade, parcs, friches à requalifier.</p>
                    <p>Nos équipes réalisent des chantiers d’entretien et de restauration, en lien avec les communes et
                        les autres partenaires.</p>
                    <a href="index.php?view=nature-territoires" class="btn btn-primary">En savoir plus</a>
                </div>
            </article>

            <!-- Maraîchage & alimentation durable -->
            <article class="card">
                <div class="card-image">
                    <img src="assets/images/potagers.jpg" alt="Maraîchage Biologique">
                </div>
                <div class="card-content">
                    <h3>Maraîchage & alimentation durable</h3>
                    <p>Nous développons un maraîchage biologique sur plusieurs parcelles, avec des cultures variées
                        selon les saisons. Les légumes sont proposés en paniers, sur des marchés et via des plateformes
                        comme LeCourtCircuit.</p>
                    <p>Une partie de cette activité sert aussi à mettre en place des dispositifs solidaires, comme le
                        panier solidaire.</p>
                    <a href="index.php?view=maraichage" class="btn btn-primary">En savoir plus</a>
                </div>
            </article>

            <!-- Insertion & emploi -->
            <article class="card">
                <div class="card-image">
                    <img src="assets/images/travaux_ouvrier.jpg" alt="Insertion et Emploi">
                </div>
                <div class="card-content">
                    <h3>Insertion & emploi</h3>
                    <p>Nos chantiers ne sont pas seulement des chantiers techniques : ce sont des supports d’insertion.
                        Nous proposons des emplois en contrats d’insertion, un accompagnement social et professionnel,
                        et des mises en situation de travail sur des activités utiles au territoire.</p>
                    <p>L’objectif est d’aider chaque personne à reprendre confiance et à accéder à un emploi durable.
                    </p>
                    <a href="index.php?view=insertion" class="btn btn-primary">En savoir plus</a>
                </div>
            </article>

            <!-- Éducation & sensibilisation -->
            <article class="card">
                <div class="card-image">
                    <img src="assets/images/cours_education_enfant.jpg" alt="Éducation à l'environnement">
                </div>
                <div class="card-content">
                    <h3>Éducation & sensibilisation</h3>
                    <p>Nous accueillons et nous intervenons auprès de nombreux publics : écoles, centres de loisirs,
                        groupes d’adultes, entreprises. Les thématiques abordées : biodiversité, eau, jardin,
                        alimentation...</p>
                    <p>Les animations se déroulent à La Réserve, sur des sites naturels, ou directement dans les
                        structures partenaires.</p>
                    <a href="assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf" target="_blank" class="btn btn-primary">Télécharger le guide pédagogique</a>
                </div>
            </article>
        </div>

        <!-- La Réserve Section -->
        <section class="content-section"
            style="margin-top: 4rem; background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>La Réserve : un lieu qui rassemble nos actions</h2>
                    <p>La plupart de ces actions se croisent à La Réserve, notre “écolieu vivant de l’Artois” :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li>site de production maraîchère,</li>
                        <li>lieu d’accueil pour les animations et événements,</li>
                        <li>espace de travail pour les équipes,</li>
                        <li>point relais et lieu de vie pour les habitants.</li>
                    </ul>
                    <a href="index.php?view=la-reserve" class="btn btn-secondary">Découvrir La Réserve</a>
                </div>
                <div class="image-content">
                    <img src="assets/images/lareservehero_bellephoto_nuit.jpg" alt="La Réserve">
                </div>
            </div>
        </section>

    </main>
