<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=actions");
	die("");
}

?>

    
    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header">
        <h1 class="section-title">Nos Actions</h1>
    </section>

    <!-- Main Content -->
    <main class="container">
        <div class="actions-grid">
            <!-- Card 1: Nature & Territoires -->
            <article class="action-card">
                <div class="card-image">
                    <img src="assets/images/visite_jardin.jpg" alt="Nature et Territoires">
                </div>
                <div class="card-content">
                    <h2>Nature & Territoires</h2>
                    <p>Nous menons des chantiers d'entretien et de restauration des milieux naturels pour préserver la
                        biodiversité locale.</p>
                    <a href="index.php?view=nature-territoires" class="btn btn-primary">En savoir plus</a>
                </div>
            </article>

            <!-- Card 2: Maraîchage Biologique -->
            <article class="action-card">
                <div class="card-image">
                    <img src="assets/images/potagers.jpg" alt="Maraîchage Biologique">
                </div>
                <div class="card-content">
                    <h2>Maraîchage Biologique</h2>
                    <p>Production de légumes bio locaux et de saison, distribués sous forme de paniers hebdomadaires.
                    </p>
                    <a href="index.php?view=paniers" class="btn btn-primary">Commander un panier</a>
                </div>
            </article>

            <!-- Card 3: Éducation à l'environnement -->
            <article class="action-card">
                <div class="card-image">
                    <img src="assets/images/cours_education_enfant.jpg" alt="Éducation à l'environnement">
                </div>
                <div class="card-content">
                    <h2>Éducation à l'environnement</h2>
                    <p>Sensibilisation des publics scolaires et du grand public aux enjeux environnementaux à travers
                        des ateliers pédagogiques.</p>
                    <a href="index.php?view=contact" class="btn btn-primary">Réserver une animation</a>
                </div>
            </article>

            <!-- Card 4: Insertion & Accompagnement -->
            <article class="action-card">
                <div class="card-image">
                    <img src="assets/images/travaux_ouvrier.jpg" alt="Insertion et Accompagnement">
                </div>
                <div class="card-content">
                    <h2>Insertion & Accompagnement</h2>
                    <p>Accompagnement socioprofessionnel de personnes éloignées de l'emploi à travers nos chantiers
                        nature.</p>
                    <a href="index.php?view=insertion" class="btn btn-primary">Découvrir notre mission</a>
                </div>
            </article>
        </div>
    </main>