<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=nature-territoires");
	die("");
}

?>

    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/visite_jardin.jpg');">
        <h1>Nature & Territoires</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Depuis ses débuts, Nœux Environnement est
                très présente sur les milieux naturels du territoire : cours d’eau, zones humides, sentiers, petits
                bois, friches, jardins…</p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">L’objectif est double : améliorer la
                qualité des sites (biodiversité, paysage, usages) et proposer des chantiers supports d’insertion pour
                nos salariés.</p>
        </section>

        <!-- Interventions -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Nos principaux types d’interventions</h2>
                    <p>Nous réalisons, par exemple :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><strong>Sur les cours d’eau et fossés :</strong> enlèvement sélectif de la végétation
                            gênante, dégagement d’embâcles, petits travaux pour stabiliser les berges, entretien des
                            abords.</li>
                        <li><strong>Sur les zones humides et mares :</strong> entretien des berges, création ou remise
                            en état de mares, fauche raisonnée, mise en valeur de ces zones souvent méconnues.</li>
                        <li><strong>Sur les haies, talus et petits bois :</strong> plantations d’arbres et d’arbustes,
                            taille d’entretien, actions pour maintenir des corridors écologiques et des refuges pour la
                            faune.</li>
                        <li><strong>Sur les sentiers et espaces de promenade :</strong> débroussaillage, entretien des
                            chemins, pose ou entretien de petits équipements (panneaux, barrières, mobilier simple).
                        </li>
                        <li><strong>Sur des friches et anciens sites délaissés :</strong> remise en état progressive,
                            transformation en espaces plus accueillants pour les habitants et pour la nature.</li>
                    </ul>
                    <p>Ces interventions sont adaptées à chaque site : nous discutons avec la commune ou le partenaire
                        pour bien comprendre les besoins et les usages.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/benevole_potager.jpg" alt="Chantier nature">
                </div>
            </div>
        </section>

        <!-- Démarche respectueuse -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Travailler avec la nature, pas contre elle</h2>
                <p>Sur nos chantiers, nous cherchons à trouver le bon équilibre entre :</p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li>la sécurité et le confort pour les usagers (riverains, promeneurs, pêcheurs…) ;</li>
                    <li>le respect des cycles naturels (périodes de nidification, floraison, etc.) ;</li>
                    <li>la préservation de zones refuges pour la faune et la flore.</li>
                </ul>
                <p>Concrètement, cela signifie : limiter autant que possible les interventions lourdes, garder des zones
                    “plus sauvages” là où c’est possible, privilégier des techniques simples et robustes.</p>
                <p>Nous sommes régulièrement en contact avec des structures spécialisées (CPIE, associations
                    naturalistes, techniciens rivières…) pour ajuster nos pratiques et nos choix.</p>
            </div>
        </section>

        <!-- Details Nature -->
        <!-- Une section détaillée sur la nature et les territoires -->
        <!-- Insertion -->
        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2>Les chantiers nature comme support d’insertion</h2>
                    <p>Les chantiers sur les milieux naturels sont aussi des lieux d’apprentissage pour les salariés en
                        insertion qui rejoignent l’association.</p>
                    <p>Ils permettent de :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li>reprendre un rythme de travail,</li>
                        <li>apprendre à travailler en équipe,</li>
                        <li>se former à l’utilisation d’outils (débroussailleuse, tronçonneuse, petits engins…),</li>
                        <li>découvrir les règles de sécurité,</li>
                        <li>mieux connaître le territoire et ses enjeux environnementaux.</li>
                    </ul>
                    <p>Ces compétences peuvent ensuite être mobilisées dans des emplois d’entretien d’espaces verts, de
                        travaux publics, de logistique, de maintenance, etc.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/travaux_ouvrier.jpg" alt="Salariés en insertion">
                </div>
            </div>
        </section>

        <!-- Partenaires & Exemples -->
        <section class="content-section">
            <div class="text-content">
                <h2>Nos partenaires sur le terrain</h2>
                <p>Nous travaillons principalement pour des communes et intercommunalités, des syndicats de rivières ou
                    de bassins versants, des structures environnementales (CEN, associations…), et parfois des
                    bailleurs, des structures sociales ou d’autres partenaires publics.</p>
                <p>Les interventions peuvent être ponctuelles, pour remettre un site en état, ou régulières, dans le
                    cadre de conventions ou de contrats d’entretien.</p>

                <h3 style="margin-top: 2rem; color: var(--primary-color);">Quelques exemples de réalisations</h3>
                <div class="grid-3" style="margin-top: 1rem;">
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <h4>Restauration de berges</h4>
                            <p>Dégagement d’embâcles et remise en place d’une végétation adaptée pour un cours d’eau
                                plus lisible et des berges plus stables.</p>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <h4>Entretien de sentier</h4>
                            <p>Entretien d'un cheminement et fauche raisonnée dans un espace naturel ouvert au public.
                            </p>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <h4>Plantation de haies</h4>
                            <p>Plantation de haies champêtres le long de parcelles et de chemins pour offrir des refuges
                                à la faune et limiter l'érosion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="content-section"
            style="background-color: var(--primary-color); color: var(--white); padding: 3rem; border-radius: 8px; text-align: center;">
            <h2 style="color: var(--white);">Travaillons ensemble</h2>
            <p style="margin-bottom: 2rem;">Vous êtes une commune, une intercommunalité, une association ou une
                structure gestionnaire et vous avez un projet nature ?</p>
            <a href="index.php?view=contact" class="btn btn-secondary"
                style="background-color: var(--white); color: var(--primary-color);">Nous contacter pour un projet
                nature</a>
        </section>

    </main>
