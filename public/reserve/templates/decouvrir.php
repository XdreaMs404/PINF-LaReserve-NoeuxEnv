<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=decouvrir");
    die("");
}

?>





    <!-- Hero Section -->
    <section class="hero" style="background-image: url('assets/images/potagers.jpg');">
        <div class="hero-content">
            <h1>Découvrir La Réserve</h1>
            <p>La Réserve, c’est l’histoire d’un lieu qui change de visage : un ancien site de grande distribution, très
                minéral, peu accueillant pour la nature, devenu un écolieu vivant, ouvert au public et au service du
                territoire.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: D’une friche commerciale à un écolieu -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>D’une friche commerciale à un écolieu vivant</h2>
                    <p>Pendant des années, le site de La Réserve n’était qu’un grand bâtiment de supermarché et de
                        vastes parkings bitumés.</p>
                    <p>Avec La Réserve, Nœux Environnement et ses partenaires ont voulu :</p>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                        <li>réutiliser ce lieu au lieu de construire ailleurs ;</li>
                        <li>désimperméabiliser une partie des surfaces ;</li>
                        <li>ramener de la nature : arbres, haies, verger, jardins, micro-forêt, mares ;</li>
                        <li>en faire un lieu de rencontres, d’expérimentations et de pédagogie.</li>
                    </ul>
                    <p style="margin-top: 1rem;">L’objectif : montrer qu’il est possible de transformer une friche
                        commerciale en un espace fertile, accueillant, vivant.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/acceuil_locaux.jpeg" alt="Transformation du site">
                </div>
            </div>
        </section>

        <!-- Section 2: Un laboratoire de la transition -->
        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title">Un laboratoire à ciel ouvert</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem auto;">La Réserve est pensée comme un
                laboratoire à ciel ouvert de la transition écologique et solidaire. On y travaille sur plusieurs
                dimensions :</p>
            <div class="grid-3">
                <div class="card">
                    <h3>Bâtiment & Énergie</h3>
                    <p>Rénovation et transformation d’un bâtiment existant, solutions bioclimatiques, énergie
                        renouvelable, confort d’usage.</p>
                </div>
                <div class="card">
                    <h3>Eau & Sols</h3>
                    <p>Désimperméabilisation, infiltration de l’eau de pluie, travail sur le sol vivant.</p>
                </div>
                <div class="card">
                    <h3>Biodiversité</h3>
                    <p>Plantation d’arbres, haies, verger, micro-forêt, zones enherbées, mares, habitats pour la faune.
                    </p>
                </div>
                <div class="card">
                    <h3>Agriculture & Alimentation</h3>
                    <p>Maraîchage biologique, circuits courts, point relais, cuisine et gaspillage alimentaire.</p>
                </div>
                <div class="card">
                    <h3>Insertion & Lien Social</h3>
                    <p>Parcours d’insertion, chantiers avec des habitants, événements à destination de tous.</p>
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem;">La Réserve est un lieu où l’on peut voir, toucher,
                comprendre ce que signifie la transition écologique dans la vie quotidienne.</p>
        </section>

        <!-- Section 3: Un tiers-lieu pour le territoire -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Un tiers-lieu nourricier et social</h2>
                    <p>La Réserve est un tiers-lieu : un espace qui n’est ni seulement un bâtiment, ni seulement une
                        ferme,
                        ni seulement un centre social… mais un peu tout ça à la fois.</p>
                    <p>On peut y :</p>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                        <li>acheter des légumes bio et locaux ;</li>
                        <li>participer à des ateliers cuisine ou jardin ;</li>
                        <li>venir travailler ou se réunir ;</li>
                        <li>se former aux métiers de la transition ;</li>
                        <li>simplement se promener et observer la nature.</li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="assets/images/plan_vue_de_haut_locaux.jpg" alt="Vue de haut">
                </div>
            </div>
        </section>

        <!-- Section 4: Partenaires -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content" style="text-align: center;">
                <h2>Un projet collectif</h2>
                <p>La Réserve n’existerait pas sans l'engagement de Nœux Environnement, le soutien de collectivités
                    (commune, intercommunalité, Région, Département), l'appui de programmes régionaux et européens, des
                    partenaires techniques, et des associations, habitants et structures locales.</p>
                <p>La Réserve est donc à la fois un lieu géré par Nœux Environnement, et un projet partagé avec de
                    nombreux acteurs du territoire.</p>
                <div
                    style="margin-top: 2rem; display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; align-items: center;">
                    <!-- Partners Images -->
                    <img src="assets/images/partenaire/logo-republique-francaise_partenaire.jpg"
                        alt="République Française" style="max-height: 80px;">
                    <img src="assets/images/partenaire/Région_Hauts-de-France_logo_partenaire.svg"
                        alt="Région Hauts-de-France" style="max-height: 80px;">
                    <img src="assets/images/logo_noeux_environnement.png" alt="Nœux Environnement"
                        style="max-height: 100px;">
                    <img src="assets/images/partenaire/logo-Cofinance-par-l-Union-europeenne_partenaire.png"
                        alt="Union Européenne" style="max-height: 80px;">
                    <img src="assets/images/partenaire/logo_plie_arrondissement_bethune_partenaire.png"
                        alt="PLIE Béthune" style="max-height: 80px;">
                </div>
            </div>
        </section>



    </main>

