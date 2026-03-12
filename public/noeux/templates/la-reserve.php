<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=la-reserve");
	die("");
}

?>

    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/lareservehero_bellephoto_nuit.jpg');">
        <h1>La Réserve, écolieu vivant de l’Artois</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">La Réserve, c’est notre nouveau lieu de vie
                et de travail à Nœux-les-Mines. Ancien supermarché et grande friche commerciale, le site a été
                entièrement transformé pour devenir un écolieu vivant, ouvert aux habitants, aux partenaires, aux
                scolaires et à tous les curieux.</p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">On y trouve à la fois des jardins et
                parcelles de maraîchage bio, des salles pour se réunir et se former, des espaces pour les animations,
                ateliers et événements, et les locaux de Nœux Environnement.</p>
        </section>

        <!-- Friche à Ecolieu -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>D’une friche commerciale à un écolieu vivant</h2>
                    <p>Pendant des années, le site était une ancienne friche commerciale, avec un bâtiment de
                        supermarché et de grands parkings. Aujourd’hui, La Réserve est devenue un démonstrateur de la
                        transition écologique et solidaire, un tiers-lieu géré par Nœux Environnement, et un endroit où
                        se rencontrent biodiversité, agriculture durable, pédagogie et insertion.</p>
                    <p>Une partie du foncier est consacrée au bâtiment rénové, l’autre à des espaces extérieurs :
                        jardins, terres agricoles, espaces d’essais, zones plus naturelles.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/lareservehero_bellephoto_nuit.jpg" alt="La Réserve rénovée">
                </div>
            </div>
        </section>

        <!-- Bâtiment Démonstrateur -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Un bâtiment démonstrateur de la transition écologique</h2>
                <p>La Réserve n’est pas qu’un bâtiment “classique” : réutilisation d’une structure existante plutôt que
                    de construire ailleurs, choix de matériaux sobres et performants, réflexion sur la gestion de l’eau
                    et de l’énergie, liens forts avec la nature autour du bâtiment.</p>
                <p>Le site sert de support pédagogique : visites, ateliers, événements permettent d’expliquer
                    concrètement comment on peut rénover, réutiliser, végétaliser et faire évoluer des lieux existants.
                </p>
            </div>
        </section>

        <!-- Jardins & Maraîchage -->
        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2>Des jardins et du maraîchage bio en insertion</h2>
                    <p>Autour du bâtiment, La Réserve accueille des parcelles de maraîchage biologique, des zones
                        plantées (haies, bosquets, bandes fleuries), et des espaces pédagogiques (jardin, sol vivant,
                        compost, mare, etc.).</p>
                    <p>Les jardins sont cultivés par Les Maraîchers de Nœux Environnement, une équipe en insertion qui
                        produit des légumes bio vendus en paniers, sur place et via la plateforme LeCourtCircuit.fr.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/potagers.jpg" alt="Jardins de La Réserve">
                </div>
            </div>
        </section>

        <!-- Details La Réserve -->
        <!-- Une section détaillée sur La Réserve -->
        <section class="content-section">
            <div class="text-content">
                <h2>Des salles et espaces pour se réunir</h2>
                <p>À l’intérieur, La Réserve propose plusieurs types d’espaces : bureaux pour l’équipe, salles de
                    réunion et de formation, espaces modulables pour des ateliers et conférences, et lieux de
                    convivialité.</p>
                <p>Ces salles permettent d’organiser des réunions de travail, des formations, des rencontres thématiques
                    et des événements plus festifs liés à la transition écologique et solidaire.</p>
            </div>
        </section>

        <!-- Lieu Ouvert -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Un lieu ouvert aux habitants et aux partenaires</h2>
                <p>La Réserve accueille régulièrement des animations tout public, des événements (inauguration, journées
                    portes ouvertes, fêtes), un petit marché de producteurs locaux, et des actions plus spécifiques.</p>
                <p>Habitants, élus, associations, structures sociales, entreprises… tout le monde peut venir découvrir
                    le lieu, participer à une activité ou échanger sur un projet.</p>
            </div>
        </section>

        <!-- Infos Pratiques -->
        <section class="content-section" style="text-align: center;">
            <h2>Comment découvrir La Réserve ?</h2>
            <p>La Réserve se situe : <strong>22 bis rue Nationale, 62290 Nœux-les-Mines</strong>.</p>
            <p>Un site internet dédié présente également La Réserve plus en détail.</p>
            <div class="hero-buttons" style="margin-top: 2rem;">
                <a href="../reserve/index.php?view=accueil" class="btn btn-secondary">Découvrir le site de la Réserve</a>
            </div>
            
        </section>

    </main>