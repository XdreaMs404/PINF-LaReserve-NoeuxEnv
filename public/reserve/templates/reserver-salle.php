<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=reserver-salle");
    die("");
}

?>






    <!-- Hero Section -->
    <section class="hero" style="background-image: url('assets/images/salle_reunion.jpg');">
        <div class="hero-content">
            <h1>Réserver une salle à La Réserve</h1>
            <p>La Réserve dispose de plusieurs salles et espaces qui peuvent accueillir vos réunions, ateliers,
                formations ou journées d’équipe.</p>
            <p>Nous mettons ces espaces à disposition des associations, collectivités, structures sociales, organismes
                de formation et entreprises, dans la mesure des disponibilités du lieu.</p>
            <div class="hero-buttons">
                <a href="index.php?view=contact&subject=location" class="btn btn-primary">Faire une demande de réservation</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: Les salles disponibles -->
        <section class="content-section">
            <h2 class="section-title">Les espaces à votre disposition</h2>
            <div class="grid-3">
                <div class="card">
                    <h3>Salle 1 – Grande salle polyvalente</h3>
                    <p><strong>Capacité :</strong> ~40 à 80 personnes selon la configuration</p>
                    <p><strong>Usages :</strong> conférences, temps pléniers, ateliers participatifs, projections,
                        événements publics</p>
                    <p><strong>Équipement :</strong> chaises, tables modulables, vidéoprojecteur/écran, paperboard,
                        sonorisation légère si besoin</p>
                </div>
                <div class="card">
                    <h3>Salle 2 – Salle de réunion</h3>
                    <p><strong>Capacité :</strong> ~10 à 20 personnes</p>
                    <p><strong>Usages :</strong> réunions de travail, groupes-projets, comités de pilotage, petites
                        formations</p>
                    <p><strong>Équipement :</strong> table centrale ou tables en U, écran / TV / vidéoprojecteur,
                        paperboard</p>
                </div>
                <div class="card">
                    <h3>Salle 3 – Espace atelier / convivialité</h3>
                    <p><strong>Capacité :</strong> variable suivant l’usage</p>
                    <p><strong>Usages :</strong> ateliers pratiques (bricolage nature, cuisine, co-conception), temps
                        conviviaux</p>
                    <p><strong>Équipement :</strong> plans de travail, rangements, éventuellement cuisine partagée (à
                        confirmer)</p>
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem;">Lors de votre demande, nous vous aidons à choisir la salle
                la plus adaptée à votre événement.</p>
        </section>

        <!-- Section 2: Idées d'usages -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Pour quels types de projets ?</h2>
                    <p>Les salles de La Réserve peuvent accueillir par exemple :</p>
                    <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem;">
                        <li>des réunions d’équipe ou de coordination,</li>
                        <li>des journées de formation ou de sensibilisation à la transition,</li>
                        <li>des journées d’étude ou séminaires avec temps en salle + visite du site,</li>
                        <li>des ateliers participatifs avec des habitants ou des partenaires,</li>
                        <li>des événements associatifs (AG, rencontres, temps conviviaux)</li>
                        <li>des séminaires d’entreprise autour de la RSE, du climat, de la biodiversité…</li>
                    </ul>
                    <div
                        style="margin-top: 2rem; padding: 1.5rem; background-color: var(--background-color); border-left: 5px solid var(--accent-color); border-radius: 4px;">
                        <p><strong>Si vous le souhaitez, nous pouvons aussi vous proposer :</strong></p>
                        <ul style="list-style: disc; margin-left: 1.5rem;">
                            <li>une visite guidée du site,</li>
                            <li>un atelier nature, jardin ou alimentation animé par Nœux Environnement,</li>
                        </ul>
                        <p>en complément de votre temps en salle.</p>
                    </div>
                </div>
                <div class="image-content">
                    <img src="assets/images/plan_vue_de_haut_locaux.jpg" alt="Vue de haut des locaux">
                </div>
            </div>
        </section>

        <!-- Section 3: Comment réserver -->
        <section class="content-section">
            <h2 class="section-title">Comment réserver une salle ?</h2>
            <div class="grid-3">
                <div class="card">
                    <h3>Étape 1 – Faire une demande</h3>
                    <p>Vous remplissez le formulaire de la page Contact & demandes, en choisissant le sujet “Réservation
                        de salle / événement”.</p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem;">Merci de préciser : structure, type d’événement,
                        nombre de participants, date souhaitée, besoins particuliers.</p>
                </div>
                <div class="card">
                    <h3>Étape 2 – Validation et confirmation</h3>
                    <p>L’équipe de La Réserve vous répond pour vérifier les disponibilités et ajuster la configuration.
                        Si tout est OK, nous vous envoyons un récapitulatif par mail.</p>
                </div>
                <div class="card">
                    <h3>Étape 3 – Règlement via Trello</h3>
                    <p>Pour finaliser, vous recevez un lien externe Trello pour accéder à votre dossier et effectuer le
                        paiement en ligne sécurisé.</p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem;">Une fois validé, la réservation est confirmée.</p>
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem; font-size: 0.9rem; color: #666;">🔒 Le paiement est géré via
                Trello sur un espace sécurisé externe. Aucune donnée bancaire n’est stockée sur le site de La Réserve.
            </p>
        </section>

        <!-- Section 4: Infos pratiques -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content">
                <h2>Quelques informations pratiques</h2>
                <ul style="list-style: disc; margin-left: 1.5rem;">
                    <li><strong>Horaires :</strong> les salles sont en général disponibles en journée (et parfois en
                        soirée selon les possibilités), à convenir ensemble.</li>
                    <li><strong>Accès :</strong> La Réserve – 22 bis rue Nationale, 62290 Nœux-les-Mines (parking à
                        proximité).</li>
                    <li><strong>Matériel :</strong> vérifiez avec nous ce qui est disponible (vidéoprojecteur, son,
                        paperboard…) et ce que vous devez apporter.</li>
                    <li><strong>Ménage & rangement :</strong> la salle doit être rendue dans un état conforme à celui
                        d’arrivée.</li>
                </ul>
                <div style="text-align: center; margin-top: 2rem;">
                    <p style="font-size: 1.2rem; margin-bottom: 1rem;">🎟️ Vous souhaitez réserver une salle ?</p>
                    <a href="index.php?view=contact&subject=location" class="btn btn-primary">Faire une demande de réservation</a>
                </div>
            </div>
        </section>

    </main>
