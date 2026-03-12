<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=nous-rejoindre");
	die("");
}

?>


    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/equipe_noeux_environnement.jpg');">
        <h1>Nous Rejoindre</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Vous avez envie de vous impliquer à nos
                côtés ? Il existe plusieurs façons de rejoindre Nœux Environnement : en tant que bénévole, comme salarié
                en insertion ou salarié “classique”, ou via un stage ou un service civique.</p>
        </section>

        <!-- Offres d'emploi -->
        <!-- Ici j'affiche les offres d'emploi disponibles -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Devenir bénévole à Nœux Environnement</h2>
                    <p>Les bénévoles ont une place importante dans la vie de l’association. Ils peuvent venir donner un
                        coup de main lors des chantiers participatifs, sur des événements, pendant des ateliers, ou sur
                        des tâches plus ponctuelles.</p>
                    <p>Ce que vous pouvez faire : tenir un stand, participer à un chantier nature, aider à l’entretien
                        des jardins, donner un coup de main sur une action de sensibilisation, prêter vos compétences.
                    </p>
                    <p>Il n’est pas nécessaire d’être expert : la motivation et l’envie de participer sont les plus
                        importantes.</p>
                    <a href="index.php?view=contact" class="btn btn-primary" style="margin-top: 1rem;">Je veux devenir
                        bénévole</a>
                </div>
                <div class="image-content">
                    <img src="assets/images/visite_jardin.jpg" alt="Bénévolat nature">
                </div>
            </div>
        </section>

        <!-- Emploi & Insertion -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Travailler à Nœux Environnement</h2>
                <p>Nœux Environnement est aussi un employeur via son Atelier Chantier d’Insertion (ACI) et
                    ponctuellement via des postes plus classiques.</p>

                <h3 style="margin-top: 1.5rem; color: var(--primary-color);">Les postes en insertion</h3>
                <p>Les contrats d’insertion concernent des postes comme ouvrier sur les chantiers nature, ouvrier
                    maraîcher, ou participation à certaines activités de sensibilisation. Ces contrats sont réservés à
                    des personnes éligibles à l’IAE.</p>
                <p>En plus du travail sur le terrain, chaque salarié bénéficie d’un suivi social et d’un accompagnement
                    professionnel.</p>

                <h3 style="margin-top: 1.5rem; color: var(--primary-color);">Comment candidater ?</h3>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li><strong>Pour un poste en insertion :</strong> parlez-en à votre référent (Pôle Emploi, Mission
                        Locale, PLIE) ou contactez-nous.</li>
                    <li><strong>Pour un autre poste :</strong> consultez les offres en cours et envoyez CV + lettre de
                        motivation.</li>
                </ul>
                <a href="#" class="btn btn-secondary" style="margin-top: 1rem;">Voir nos offres d’emploi</a>
            </div>
        </section>

        <!-- Stages & Service Civique -->
        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2>Stages & Service Civique</h2>
                    <p>Nœux Environnement accueille régulièrement des stagiaires et des volontaires en Service Civique,
                        en particulier sur les missions de sensibilisation à l’environnement, de lien avec les habitants
                        et d’animation.</p>
                    <p>Les missions peuvent porter sur l’éducation à l’environnement, la communication, ou l’appui aux
                        projets de l’association.</p>
                    <a href="index.php?view=contact" class="btn btn-primary" style="margin-top: 1rem;">Proposer ma candidature</a>
                </div>
                <div class="image-content">
                    <img src="assets/images/cours_education_enfant.jpg" alt="Service Civique">
                </div>
            </div>
        </section>

    </main>
