<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=accueil");
    die("");
}

?>




    <!-- Hero Section -->
    <section class="hero" style="background-image: url('assets/images/acceuil_locaux.jpeg');">
        <div class="hero-content">
            <h1>La Réserve – écolieu vivant de l’Artois</h1>
            <p>À Nœux-les-Mines, une ancienne friche commerciale s’est transformée en écolieu vivant, ouvert à toutes
                et tous.</p>
            <p>La Réserve est un lieu où l’on expérimente concrètement la transition écologique et solidaire : un
                bâtiment réhabilité, des jardins, des animations, et des parcours d'insertion.</p>
            <div class="hero-buttons">
                <a href="index.php?view=reserver-salle" class="btn btn-secondary">Découvrir les salles</a>
                <a href="index.php?view=visites" class="btn btn-primary">Visites & Animations</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: Qu'est-ce que La Réserve ? -->
        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2>Un écolieu vivant, pour qui, pour quoi ?</h2>
                <p>La Réserve, c’est :</p>
                <ul style="list-style: disc; display: inline-block; text-align: left; margin-top: 1rem;">
                    <li>un lieu de vie où se croisent habitants, associations, scolaires, collectivités, entreprises ;
                    </li>
                    <li>un site démonstrateur de la transition écologique : bâtiment, énergie, eau, sols, biodiversité,
                        agriculture durable, alimentation, inclusion sociale ;</li>
                    <li>un tiers-lieu social et nourricier, au service du territoire.</li>
                </ul>
                <p style="margin-top: 1rem;">Le projet s’appuie sur l’expérience de Nœux Environnement : gestion des
                    milieux naturels, insertion par l’activité économique, éducation à l’environnement et alimentation
                    durable.</p>
            </div>
        </section>

        <!-- Section 2: Ce que vous pouvez faire ici -->
        <section class="content-section">
            <h2 class="section-title">Ce que vous pouvez faire à La Réserve</h2>
            <div class="grid-3">
                <div class="card">
                    <h3>1. Découvrir le lieu</h3>
                    <p>Comprendre comment une ancienne friche commerciale a été transformée en écolieu : l’histoire du
                        projet, la réhabilitation du bâtiment, la désimperméabilisation des sols, les plantations, les
                        jardins, la ferme maraîchère…</p>
                    <a href="index.php?view=decouvrir" class="btn btn-primary" style="margin-top: 1rem;">Découvrir La Réserve</a>
                </div>
                <div class="card">
                    <h3>2. Participer</h3>
                    <p>Prendre part à des visites guidées du site, des balades et ateliers (jardinage, sol vivant,
                        biodiversité, alimentation durable…), des journées thématiques et événements tout public.</p>
                    <a href="index.php?view=visites" class="btn btn-primary" style="margin-top: 1rem;">Visites & animations</a>
                </div>
                <div class="card">
                    <h3>3. Manger local</h3>
                    <p>Retrouver des produits locaux : légumes bio produits sur place, marché à La Réserve à certains
                        moments, point relais de commandes de producteurs locaux.</p>
                    <a href="/noeux/index.php?view=maraichage" class="btn btn-primary" style="margin-top: 1rem;">Marché &
                        alimentation</a>
                </div>
            </div>
        </section>

        <!-- Section 3: La Réserve en quelques chiffres -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>La Réserve en quelques chiffres</h2>
                    <ul style="list-style: disc; margin-left: 1.5rem;">
                        <li><strong>25 000 m²</strong> : surface de l’ancienne friche commerciale, attenante à des
                            terres agricoles ;</li>
                        <li>plus de <strong>2 000 m²</strong> de bâtiment réhabilité ;</li>
                        <li>environ <strong>7 000 m²</strong> d’espaces extérieurs repensés : cours, jardins,
                            cheminements, maraîchage, verger, micro-forêt, zones d’essai ;</li>
                        <li>plus de <strong>1 450 m²</strong> désimperméabilisés pour laisser l’eau s’infiltrer de
                            nouveau ;</li>
                        <li>plus de <strong>100 arbres plantés</strong>, 400 m de haies, un verger et une micro-forêt ;
                        </li>
                        <li>près de <strong>1 hectare</strong> de maraîchage biologique, avec des serres et des cultures
                            de plein champ.</li>
                    </ul>
                    <p style="margin-top: 1rem;">Ces chiffres montrent qu’il est possible de redonner vie à un site très
                        artificialisé, en le rendant à la fois utile à la nature et aux habitants.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/avant_après.webp" alt="Plan de La Réserve">
                </div>
            </div>
        </section>

        <!-- Section 4: Un projet porté par Nœux Environnement -->
        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2>Un projet porté par Nœux Environnement</h2>
                <p>La Réserve est portée par l’association Nœux Environnement, créée en 1991 : gestion et protection des
                    milieux naturels, insertion par l’activité économique, éducation à l’environnement, maraîchage
                    biologique et alimentation durable.</p>
                <p>La Réserve s’inscrit naturellement dans la continuité de ces actions, en offrant un lieu où tout se
                    rassemble.</p>
                <a href="/noeux/index.php?view=qui-sommes-nous" class="btn btn-secondary" style="margin-top: 1rem;">En savoir plus sur
                    Nœux Environnement</a>
            </div>
        </section>

        <!-- Section 5: À venir -->
        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title">À venir à La Réserve</h2>
            <div
                style="text-align: center; padding: 2rem; border: 2px dashed var(--secondary-color); border-radius: 8px;">
                <p><em>Planning à venir...</em></p>
                <a href="index.php?view=agenda" class="btn btn-accent" style="margin-top: 1rem;">Voir tout l'agenda</a>
            </div>
        </section>

    </main>

