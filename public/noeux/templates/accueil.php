<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=accueil");
    die("");
}

?>

<!-- Main Content -->
<!-- Ici commence le contenu principal de la page -->
<main class="container">
    <!-- La section "Hero", c'est la grande bannière avec l'image de fond tout en haut -->
    <section class="hero">
        <div class="hero-content">
            <h1>Nœux Environnement</h1>
            <p class="subtitle">Gestion et protection des milieux naturels et insertion socio-professionnelle des
                personnes éloignées de l’emploi.</p>
            <div class="hero-buttons">
                <a href="index.php?view=nos-actions" class="btn btn-primary">Découvrir nos actions</a>
                <a href="index.php?view=la-reserve" class="btn btn-secondary">En savoir plus sur La Réserve</a>
                <a href="index.php?view=paniers" class="btn btn-primary">Commander un panier de légumes</a>
            </div>
        </div>
    </section>

    <!-- Intro Block -->
    <!-- Une section avec des cartes pour présenter les actions -->
    <section class="content-section container">
        <div class="text-image-block">
            <div class="text-content">
                <p>Depuis 1991, Nœux Environnement agit pour la nature, la biodiversité et l’insertion sur le
                    territoire de Nœux-les-Mines et des communes voisines.</p>
                <p>Nous intervenons sur les milieux naturels, développons un maraîchage biologique, accompagnons des
                    personnes vers l’emploi et organisons des animations pour tous.</p>
            </div>
            <!-- Image placeholder if needed, or just text as per PDF structure which says "Bloc très visuel" for hero, but this text is part of it. -->
        </div>
    </section>

    <!-- Nos grands domaines d’action -->
    <section class="container">
        <h2 class="section-title">Nos principaux domaines d’action</h2>
        <div class="grid-4">
            <!-- Nature & territoires -->
            <article class="card">
                <div class="card-image">
                    <img src="assets/images/visite_jardin.jpg" alt="Nature et Territoires">
                </div>
                <div class="card-content">
                    <h3>Nature & territoires</h3>
                    <p>Nous menons des chantiers d’entretien et de restauration de milieux naturels : cours d’eau,
                        zones humides, sentiers, friches, espaces verts...</p>
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
                    <p>Nos équipes cultivent des légumes bio de saison sur des parcelles maraîchères, notamment à La
                        Réserve.</p>
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
                    <p>Nœux Environnement est un Atelier Chantier d’Insertion : nous employons des personnes
                        éloignées de l’emploi et les accompagnons.</p>
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
                    <p>Nous proposons des animations nature et environnement pour les écoles, les centres de
                        loisirs, les associations et le grand public.</p>
                    <a href="assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf" target="_blank"
                        class="btn btn-primary">Télécharger le guide pédagogique</a>
                </div>
            </article>
        </div>
    </section>

    <!-- Focus sur La Réserve -->
    <section class="content-section container">
        <div class="text-image-block">
            <div class="text-content">
                <h2>La Réserve, écolieu vivant de l’Artois</h2>
                <p>La Réserve est notre nouveau lieu de travail et de vie à Nœux-les-Mines. Ancienne friche
                    commerciale transformée, elle rassemble un bâtiment rénové, des jardins, des parcelles
                    maraîchères et des espaces d’animation.</p>
                <p>C’est un lieu pour expérimenter la transition écologique, accueillir des groupes, organiser des
                    événements et rencontrer les habitants.</p>
                <div class="la-reserve-buttons">
                    <a href="index.php?view=la-reserve" class="btn btn-secondary">Découvrir La Réserve</a>
                </div>
            </div>
            <div class="image-content">
                <img src="assets/images/lareservehero_bellephoto_nuit.jpg" alt="La Réserve">
            </div>
        </div>
    </section>

    <!-- Prochains rendez-vous (Placeholder logic) -->


    <!-- Dernières actualités (Placeholder) -->
    <section class="container content-section">
        <h2 class="section-title">Dernières actualités</h2>
        <div class="grid-3">
            <!-- News items would go here dynamically -->
        </div>
        <div style="text-align: center; margin-top: 2rem;">
            <a href="index.php?view=actualites" class="btn btn-secondary">Voir toutes les actualités</a>
        </div>
    </section>

    <!-- Agir avec nous -->
    <section class="container content-section"
        style="background-color: var(--light-gray); padding: 3rem; border-radius: 8px; text-align: center;">
        <h2 class="section-title">Agir avec Nœux Environnement</h2>
        <p style="margin-bottom: 2rem; max-width: 800px; margin-left: auto; margin-right: auto;">Vous pouvez
            soutenir les actions de Nœux Environnement de plusieurs façons : en devenant bénévole, en travaillant
            avec nous, en participant à nos événements ou en choisissant nos paniers de légumes.</p>
        <div class="hero-buttons">
            <a href="index.php?view=nous-rejoindre" class="btn btn-primary">Devenir bénévole</a>
            <a href="index.php?view=nous-rejoindre" class="btn btn-secondary">Voir nos offres d’emploi & stages</a>
            <a href="index.php?view=paniers" class="btn btn-primary">Découvrir les paniers de légumes</a>
        </div>
    </section>

    <!-- Partenaires -->
    <section class="container content-section" style="text-align: center;">
        <h2 class="section-title">Nos partenaires</h2>
        <div class="partners-grid">
            <img src="assets/images/partenaire/logo-republique-francaise_partenaire.jpg" alt="République Française"
                class="partner-logo">
            <img src="assets/images/partenaire/Région_Hauts-de-France_logo_partenaire.svg" alt="Région Hauts-de-France"
                class="partner-logo">
            <img src="assets/images/partenaire/Logo_Conseil_Departemental_62.png" alt="Département du Pas-de-Calais"
                class="partner-logo">
            <img src="assets/images/partenaire/logo-Cofinance-par-l-Union-europeenne_partenaire.png"
                alt="Union Européenne" class="partner-logo">
            <img src="assets/images/partenaire/logo_communaute_agglomeration_bethune_bruay.jpeg" alt="CABBALR"
                class="partner-logo">
            <img src="assets/images/partenaire/logo_agence_national_cohesion_territoires.png" alt="ANCT"
                class="partner-logo">
            <img src="assets/images/partenaire/logo_plie_arrondissement_bethune_partenaire.png" alt="PLIE Béthune"
                class="partner-logo">
        </div>
        <a href="index.php?view=partenaires" class="btn btn-secondary" style="margin-top: 2rem;">Découvrir nos
            partenaires</a>
    </section>

</main>