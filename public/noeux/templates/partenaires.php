<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=partenaires");
	die("");
}

?>



    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/equipe_noeux_environnement.jpg');">
        <h1>Nos Partenaires</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Nœux Environnement ne travaille pas seul.
                Depuis plus de 30 ans, l’association construit ses projets avec de nombreux partenaires : collectivités,
                réseaux, associations, structures de l’emploi, entreprises, fondations…</p>
        </section>

        <!-- SECTION 1 : FINANCEURS -->
        <section class="content-section">
            <div class="text-content">
                <h2>Nos Financeurs</h2>
                <p>Ces institutions publiques et collectivités soutiennent durablement nos actions en faveur de l'environnement et de l'insertion.</p>
                
                <div class="logo-grid">
                    <div class="logo-item">
                        <img src="assets/images/partenaire/logo-republique-francaise_partenaire.jpg" alt="République Française">
                    </div>
                    <div class="logo-item">
                        <img src="assets/images/partenaire/Région_Hauts-de-France_logo_partenaire.svg" alt="Région Hauts-de-France">
                    </div>
                    <div class="logo-item">
                        <img src="assets/images/partenaire/Logo_Conseil_Departemental_62.png" alt="Département du Pas-de-Calais">
                    </div>
                    <div class="logo-item">
                        <img src="assets/images/partenaire/logo-Cofinance-par-l-Union-europeenne_partenaire.png" alt="Union Européenne">
                    </div>
                    <div class="logo-item">
                        <img src="assets/images/partenaire/logo_communaute_agglomeration_bethune_bruay.jpeg" alt="CABBALR">
                    </div>
                    <div class="logo-item">
                        <img src="assets/images/partenaire/logo_agence_national_cohesion_territoires.png" alt="ANCT">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2 : PARTENAIRES -->
        <section class="content-section" style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Nos Partenaires de terrain</h2>
                <p>Acteurs de l'emploi, de l'insertion, de l'éducation ou associations locales, ils collaborent au quotidien avec nos équipes.</p>
                
                <div class="logo-grid">
                    <div class="logo-item">
                        <img src="assets/images/partenaire/logo_plie_arrondissement_bethune_partenaire.png" alt="PLIE Béthune">
                    </div>
                    <!-- Placeholders pour les logos manquants -->
                    <div class="logo-item">
                        <img src="assets/images/logo_noeux_environnement.png" alt="TODO: Logo Missions Locales" style="opacity: 0.3;">
                    </div>
                    <div class="logo-item">
                        <img src="assets/images/logo_noeux_environnement.png" alt="TODO: Logo France Travail" style="opacity: 0.3;">
                    </div>
                    <div class="logo-item">
                        <img src="assets/images/logo_noeux_environnement.png" alt="TODO: Logo MRES" style="opacity: 0.3;">
                    </div>
                </div>

                <div style="margin-top: 2rem;">
                    <p>Nous travaillons également en lien étroit avec :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem;">
                        <li>France Travail & Missions Locales</li>
                        <li>Maison Régionale de l’Environnement et des Solidarités (MRES)</li>
                        <li>Éducation Nationale (agrément académique)</li>
                        <li>Fonds MAIF pour le vivant</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="content-section" style="text-align: center; margin-top: 3rem;">
            <h2>Devenir partenaire</h2>
            <p>Vous souhaitez soutenir nos actions ou collaborer avec nous ?</p>
            <a href="index.php?view=contact" class="btn btn-primary" style="margin-top: 1rem;">Nous contacter</a>
        </section>

    </main>
