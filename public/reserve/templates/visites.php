<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=visites");
    die("");
}

?>




    <!-- Hero Section -->
    <section class="hero" style="background-image: url('assets/images/inauguration_festive_exterieur_locaux.jpg');">
        <div class="hero-content">
            <h1>Visites & Animations</h1>
            <p>La Réserve est un lieu qui se visite et qui se vit.</p>
            <p>Nous accueillons toute l’année : des visites guidées du site (bâtiment, jardins, maraîchage), des
                animations nature et jardin, des ateliers autour de l’alimentation, et des journées professionnelles et
                techniques.</p>
            <p>Que vous soyez habitants, enseignants, animateurs, association, entreprise ou collectivité, nous pouvons
                construire avec vous une visite ou une animation adaptée.</p>
            <div class="hero-buttons">
                <a href="index.php?view=agenda" class="btn btn-accent">Voir les prochains événements</a>
                <a href="index.php?view=contact&subject=visite" class="btn btn-primary">Demander une visite ou une animation</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: Visites tout public -->
        <section class="content-section">
            <h2 class="section-title">Pour le grand public et les familles</h2>
            <div class="text-content">
                <p>Plusieurs fois par an, La Réserve propose des visites et ateliers ouverts à tous :</p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li><strong>visites guidées du site</strong> (histoire de la friche, bâtiment, jardins, maraîchage…)
                        ;</li>
                    <li><strong>balades dans les jardins</strong> : sol vivant, compost, biodiversité ;</li>
                    <li><strong>ateliers pratiques</strong> : jardiner au naturel, bricolage nature, cuisine des légumes
                        de saison…</li>
                </ul>
                <p style="margin-top: 1rem;">Ces rendez-vous sont annoncés dans notre agenda.</p>
                <div
                    style="margin-top: 2rem; padding: 1.5rem; background-color: var(--background-color); border-left: 5px solid var(--accent-color); border-radius: 4px;">
                    <p>🔎 <strong>Pour connaître les prochaines dates, consultez la page Agenda.</strong></p>
                    <p>Si vous souhaitez organiser un groupe de particuliers (amis, voisins, association…),
                        contactez-nous via la page Contact & demandes.</p>
                </div>
            </div>
        </section>

        <!-- Section 2: Scolaires & groupes jeunesse -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content">
                <h2>Venir avec une classe ou un groupe de jeunes</h2>
                <p>En lien avec Nœux Environnement, La Réserve accueille des :</p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li>classes (de la maternelle au lycée),</li>
                    <li>centres de loisirs et structures jeunesse,</li>
                    <li>groupes d’enfants ou d’ados accompagnés par des éducateurs.</li>
                </ul>
                <p style="margin-top: 1rem;">Les animations s’appuient sur le bâtiment (énergie, matériaux, eau), les
                    jardins et le maraîchage, et les espaces extérieurs (biodiversité, sols, eau, climat).</p>
                <p style="margin-top: 1rem;"><strong>Exemples de thèmes :</strong> “Comprendre un écolieu vivant”, “Du
                    sol à l’assiette”, “Biodiversité autour de nous”, “Changer nos habitudes pour le climat”.</p>
                <div
                    style="margin-top: 2rem; padding: 1.5rem; background-color: var(--background-color); border-left: 5px solid var(--primary-color); border-radius: 4px;">
                    <p>📌 <strong>Nous adaptons le contenu à :</strong> l’âge des participants, les programmes
                        scolaires, votre projet pédagogique.</p>
                    <p>👉 Pour construire une visite scolaire ou un projet sur plusieurs séances, merci de passer par la
                        page Contact & demandes (sujet : “Visite / animation”).</p>
                </div>
            </div>
        </section>

        <!-- Section 3: Visites techniques & journées professionnelles -->
        <section class="content-section">
            <div class="text-content">
                <h2>Visites techniques et journées professionnelles</h2>
                <p>La Réserve est un site ressource pour les professionnels qui s’intéressent à la transition écologique
                    :</p>
                <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                    <li>élus et services techniques de collectivités,</li>
                    <li>bureaux d’études, architectes, paysagistes, urbanistes,</li>
                    <li>organismes de formation, écoles, universités,</li>
                    <li>entreprises engagées dans la RSE et la transition.</li>
                </ul>
                <p style="margin-top: 1rem;"><strong>Thématiques possibles :</strong> transformation d’une friche
                    commerciale en écolieu, désimperméabilisation et renaturation, réhabilitation frugale d’un bâtiment,
                    tiers-lieu nourricier, maraîchage et alimentation, articulation projet social – projet écologique.
                </p>
                <div
                    style="margin-top: 2rem; padding: 1.5rem; background-color: var(--white); border: 1px solid #ddd; border-radius: 4px;">
                    <p>Les visites techniques peuvent combiner : des temps en salle (présentation, échanges), une visite
                        commentée du site, des ateliers de terrain.</p>
                    <p style="margin-top: 0.5rem;">👉 Pour organiser une visite technique ou une journée pro, merci
                        d’utiliser la page Contact & demandes (sujet : “Visite / animation – public professionnel”).</p>
                </div>
            </div>
        </section>

        <!-- Section 4: Comment se passe une visite / animation ? -->
        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title">Comment ça se passe ?</h2>
            <div class="grid-3">
                <div class="card">
                    <h3>1. Vous nous contactez</h3>
                    <p>Via la page Contact, sujet “Visite / animation”, en précisant : type de public, nombre de
                        personnes, âge, thème souhaité, dates possibles.</p>
                </div>
                <div class="card">
                    <h3>2. Nous construisons ensemble</h3>
                    <p>Nous définissons le contenu de la visite / animation, la durée, les horaires, et l'organisation
                        pratique (accès, équipements, repas, etc.).</p>
                </div>
                <div class="card">
                    <h3>3. Nous confirmons</h3>
                    <p>Nous validons la date et les modalités. Vous recevez un mail récapitulatif, avec, si besoin, une
                        convention ou un devis.</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <p style="font-size: 1.2rem; margin-bottom: 1rem;">🎟️ Prêt à préparer une visite ?</p>
                <a href="index.php?view=contact&subject=visite" class="btn btn-primary">Demander une visite ou une animation</a>
            </div>
        </section>

    </main>

