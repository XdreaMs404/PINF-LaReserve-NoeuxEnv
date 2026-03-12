<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=insertion");
	die("");
}

?>

    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/travaux_ouvrier.jpg');">
        <h1>Insertion & Emploi</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Nœux Environnement est une structure
                d’insertion par l’activité économique.</p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">Derrière chaque chantier nature, chaque
                atelier de jardinage ou chaque panier de légumes, il y a des personnes en parcours d’insertion qui
                reprennent pied dans l’emploi.</p>
        </section>

        <!-- ACI Concrètement -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>L’insertion par l’activité économique, concrètement</h2>
                    <p>L’association porte un Atelier Chantier d’Insertion (ACI) basé sur plusieurs supports permanents
                        :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li>gestion des milieux naturels (zones humides, cours d’eau, sentiers, friches, etc.) ;</li>
                        <li>maraîchage biologique et jardinage écologique ;</li>
                        <li>et ponctuellement la sensibilisation à l’environnement (animations, chantiers
                            participatifs…).</li>
                    </ul>
                    <p>Ces activités servent à la fois à rendre des services au territoire et à proposer un cadre de
                        travail à des personnes éloignées de l’emploi.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/travaux_ouvrier2.jpg" alt="Equipe en insertion">
                </div>
            </div>
        </section>

        <!-- Public -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Qui peut intégrer un parcours d’insertion ?</h2>
                <p>Les postes sont destinés à des personnes qui rencontrent des difficultés d’accès à l’emploi (longue
                    période sans emploi, problèmes sociaux…), sont éligibles à l’IAE (orientation par Pôle Emploi,
                    Mission Locale, PLIE, services sociaux…), et souhaitent s’engager dans une démarche active pour
                    construire ou reconstruire un projet professionnel.</p>
                <p>Les profils sont très variés : jeunes, adultes, parents isolés, personnes ayant besoin de reprendre
                    confiance après une période difficile, etc.</p>
            </div>
        </section>

        <!-- Supports de travail -->
        <section class="content-section">
            <div class="text-content">
                <h2>Les supports de travail : des activités utiles au territoire</h2>
                <p>Les salariés en insertion travaillent principalement sur :</p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li>entretien et restauration de milieux naturels (cours d’eau, fossés, sentiers, terrils, marais,
                        etc.) ;</li>
                    <li>jardinage écologique et maraîchage bio (préparation des sols, cultures, récolte, ventes) ;</li>
                    <li>certains projets de menuiserie écologique (nichoirs, hôtels à insectes, mangeoires…) ;</li>
                    <li>ponctuellement, participation à des animations ou événements.</li>
                </ul>
                <p>Ces activités sont encadrées par des encadrants techniques qui organisent le travail, transmettent
                    les gestes professionnels et veillent à la sécurité.</p>
            </div>
        </section>

        <!-- Accompagnement -->
        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2>Le suivi social et l’accompagnement professionnel</h2>
                    <p>Le parcours ne se limite pas au travail sur le chantier.</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><strong>Le suivi social</strong> vise à identifier et lever les freins : logement, mobilité,
                            santé, démarches administratives, garde d’enfants, etc.</li>
                        <li><strong>L’accompagnement professionnel</strong> aide à construire un projet : bilans de
                            compétences, découverte de métiers, mise en relation avec des formations, recherche de
                            stages, d’immersions ou d’emplois.</li>
                    </ul>
                    <p>L’idée est de bâtir, pas à pas, un parcours individualisé pour chaque salarié.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/travaux_ouvrier.jpg" alt="Accompagnement professionnel">
                </div>
            </div>
        </section>

        <!-- Objectif -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Objectif : un emploi durable ou une formation</h2>
                <p>L’ACI n’est pas une fin en soi : c’est un sas de retour à l’emploi. Pendant le contrat d’insertion,
                    l’équipe travaille avec le salarié pour clarifier un projet professionnel réaliste, développer des
                    compétences transférables et préparer la sortie.</p>
                <p>L’objectif final est que la personne puisse quitter Nœux Environnement pour une solution durable :
                    emploi, alternance, formation longue… et non revenir dans un parcours d’urgence.</p>
            </div>
        </section>

        <!-- Details Insertion -->
        <!-- Une section détaillée sur l'insertion -->
        <!-- Collaborer -->
        <section class="content-section">
            <div class="grid-2">
                <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                    <div class="card-content">
                        <h3>Pour les candidats</h3>
                        <p>Vous pensez répondre aux critères de l’IAE et vous êtes intéressé par un poste à Nœux
                            Environnement ? Parlez-en avec votre référent emploi ou consultez nos offres.</p>
                        <a href="index.php?view=nous-rejoindre" class="btn btn-primary">Voir nos offres d’emploi & stages</a>
                    </div>
                </div>
                <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                    <div class="card-content">
                        <h3>Pour les partenaires et employeurs</h3>
                        <p>Vous êtes une entreprise, une collectivité, une structure sociale et vous souhaitez proposer
                            des immersions, recruter des salariés sortant de l’ACI, ou monter un projet en lien avec nos
                            activités ?</p>
                        <a href="index.php?view=contact" class="btn btn-secondary">Nous contacter pour un partenariat emploi</a>
                    </div>
                </div>
            </div>
        </section>

    </main>
