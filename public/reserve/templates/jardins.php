<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=jardins");
    die("");
}

?>





    <!-- Hero Section -->
    <section class="hero" style="background-image: url('assets/images/lareservehero_bellephoto_nuit.jpg');">
        <div class="hero-content">
            <h1>Jardins & Maraîchage</h1>
            <p>Autour du bâtiment de La Réserve, des jardins et des parcelles de maraîchage biologique ont été aménagés.
                On y produit des légumes de saison, on y teste des pratiques de jardinage au naturel, et on y accueille
                des visites, ateliers et animations.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: Les Maraîchers -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Qui cultive les jardins ?</h2>
                    <p>Les jardins de La Réserve sont cultivés par l’équipe des Maraîchers de Nœux Environnement. Leur
                        rôle : préparer les sols, semer, planter, récolter, et participer à la vente.</p>
                    <p>Cette équipe fonctionne comme un atelier d’insertion : des personnes éloignées de l’emploi y
                        travaillent, se forment et construisent un projet professionnel, encadrées par des
                        professionnels.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/interieur_bois_maquette_locaux.jpg" alt="Maraîchers au travail">
                </div>
            </div>
        </section>

        <!-- Section 2: Légumes bio -->
        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title">Des légumes bio, de saison</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem auto;">Les jardins sont cultivés en
                agriculture biologique : pas de pesticides, pas d’engrais de synthèse, travail sur la fertilité naturelle
                du sol. L'arrosage est raisonné pour économiser l'eau.</p>
            <div class="grid-2">

                <div class="card">
                    <h3>Où les trouver ?</h3>
                    <ul style="text-align: left; list-style: disc; margin-left: 1.5rem;">
                        <li><a href="/noeux/index.php?view=paniers">Vendus en paniers de légumes</a></li>
                        <li><a href="index.php?view=marche-alimentation">Sur le marché de La Réserve</a></li>
                        <li><a href="index.php?view=marche-alimentation">En circuits courts (points relais)</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Section 3: Pratiques naturelles -->
        <section class="content-section">
            <div class="text-content">
                <h2>Un jardin pour le sol vivant et la biodiversité</h2>
                <p>On met en avant des pratiques simples :</p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li><strong>Sol vivant</strong> : paillage, compost, pas de labour profond.</li>
                    <li><strong>Rotations de cultures</strong> : pour ne pas épuiser le sol.</li>
                    <li><strong>Plantes compagnes</strong> : associations fleurs/légumes.</li>
                    <li><strong>Zones refuges</strong> : haies, bandes fleuries pour la faune.</li>
                </ul>
                <p style="margin-top: 1rem;">Ces choix permettent d'avoir des légumes de qualité, de réduire les
                    intrants
                    et de favoriser la biodiversité.</p>
            </div>
        </section>

        <!-- Section 4: Jardins pédagogiques -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2>Des jardins pour apprendre</h2>
                    <p>Les jardins servent aussi de support pédagogique pour :</p>
                    <ul style="list-style: disc; margin-left: 1.5rem;">
                        <li>Accueillir des classes (semer, observer, comprendre la saisonnalité).</li>
                        <li>Proposer des ateliers tout public (compost, paillage, cuisine).</li>
                        <li>Tester des idées et expérimenter.</li>
                    </ul>
                    <p style="margin-top: 1rem;">Les jardins deviennent un support concret pour comprendre ce qui se
                        passe "sous nos pieds" et dans notre assiette.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/visite_jardin.jpg" alt="Animation jardin">
                </div>
            </div>
        </section>



        <!-- Section 6: Visites -->
        <section class="content-section" style="text-align: center;">
            <h2 class="section-title">Visites et ateliers dans les jardins</h2>
            <p>Vous pouvez découvrir les jardins lors d’événements, de visites guidées ou d'animations scolaires.</p>
            <div class="hero-buttons" style="margin-top: 2rem;">
                <a href="/noeux/index.php?view=agenda" class="btn btn-primary">Voir les prochaines visites</a>
                <a href="index.php?view=visites" class="btn btn-secondary">Organiser une visite de groupe</a>
            </div>
        </section>

    </main>

