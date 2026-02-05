<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=chiffres-amenagements");
    die("");
}

?>

    <!-- Hero Section -->
    <section class="hero" style="background-image: url('../assets/images/visite_jardin.jpg');">
        <div class="hero-content">
            <h1>Chiffres & Aménagements</h1>
            <p>Cette page donne quelques repères concrets sur La Réserve : surfaces, aménagements, choix techniques.
                Elle permet de mieux comprendre ce qui a été fait sur le site pour en faire un démonstrateur de la
                transition écologique.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: Surfaces et aménagements -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Surfaces et aménagements</h2>
                    <h3>Surfaces du site</h3>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-bottom: 1.5rem;">
                        <li><strong>Ancien site de grande distribution</strong> : environ 25 000 m² de friche
                            commerciale
                            attenants à des terres agricoles.</li>
                        <li><strong>Bâtiment réhabilité</strong> : plus de 2 000 m².</li>
                        <li><strong>Espaces extérieurs repensés</strong> : environ 7 000 m² comprenant cours,
                            cheminements,
                            jardins, maraîchage, verger, micro-forêt, espaces de tests.</li>
                    </ul>


                </div>
                <div class="image-content">
                    <img src="assets/images/interieur_bois_maquette_locaux.jpg" alt="Maquette intérieur bois">
                </div>
            </div>
        </section>

        <!-- Section 2: Le bâtiment -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2>Le bâtiment : un démonstrateur de rénovation frugale</h2>
                    <h3>Un bâtiment réhabilité plutôt qu’un bâtiment neuf</h3>
                    <p>Le choix a été fait de réutiliser l’existant : garder la structure, retravailler l’enveloppe,
                        repenser l’intérieur. C’est un exemple concret de réhabilitation frugale : faire le maximum avec
                        ce qui existe déjà.</p>

                    <h3 style="margin-top: 1.5rem;">Quelques éléments techniques</h3>
                    <ul style="list-style: disc; margin-left: 1.5rem;">
                        <li>Utilisation de matériaux biosourcés et de solutions de réemploi.</li>
                        <li>Panneaux photovoltaïques pour l’électricité.</li>
                        <li>Dispositifs bioclimatiques (apports solaires, ventilation, isolation).</li>
                        <li>Gestion de l’eau (récupération, infiltration).</li>
                    </ul>
                    <p style="margin-top: 1rem;">Le bâtiment devient ainsi un support pour des visites techniques, des
                        formations et des animations pédagogiques.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/travaux_ouvrier.jpg" alt="Bâtiment réhabilité">
                </div>
            </div>
        </section>

        <!-- Section 3: Maraîchage & alimentation -->
        <section class="content-section">
            <div class="text-content">
                <h2>Maraîchage & alimentation</h2>
                <h3>Une ferme maraîchère à La Réserve</h3>
                <p>Sur le site, environ 1 hectare est dédié au maraîchage biologique (plein champ, serres tunnels, serre
                    chapelle). Les Maraîchers de Nœux Environnement y produisent des légumes bio de saison vendus en
                    paniers, sur le marché ou en circuits courts.</p>
                <p>Le maraîchage est à la fois une activité économique locale, un support d’insertion professionnelle et
                    un terrain d’expérimentation pédagogique.</p>
            </div>
        </section>

        <!-- Section 5: Visites techniques -->
        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2>Un site ressource pour les professionnels</h2>
                <p>Au-delà du grand public, La Réserve accueille collectivités, bureaux d’études, écoles et entreprises
                    pour des visites techniques sur la désimperméabilisation, la réhabilitation frugale, ou le
                    tiers-lieu nourricier.</p>
                <p style="margin-top: 1rem; font-weight: bold;">La Réserve est à la fois un lieu à vivre au quotidien et
                    un site ressource pour celles et ceux qui veulent transformer concrètement leurs territoires.</p>
                <a href="index.php?view=contact" class="btn btn-primary" style="margin-top: 2rem;">Organiser une visite
                    technique</a>
            </div>
        </section>

    </main>

