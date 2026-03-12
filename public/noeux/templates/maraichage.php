<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=maraichage");
	die("");
}

?>

    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/potagers.jpg');">
        <h1>Maraîchage & Alimentation Durable</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Depuis 2005, Nœux Environnement développe un
                projet de maraîchage biologique qui associe insertion professionnelle, production de légumes et
                sensibilisation à l’environnement.</p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">L’idée : produire des légumes de
                saison, sans produits chimiques, pour les habitants du territoire, tout en créant des emplois
                d’insertion.</p>
        </section>

        <!-- Jardins -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Des jardins solidaires sur le territoire</h2>
                    <p>Au fil des années, plusieurs jardins du cœur ont vu le jour sur différentes communes, avec des
                        parcelles de tailles variées où l’on cultive une grande diversité de légumes : salades,
                        carottes, petits pois, oignons, ail, échalotes, courgettes, betteraves rouges, concombres…</p>
                    <p>Aujourd’hui, l’activité maraîchère est aussi fortement présente à La Réserve, écolieu vivant de
                        l’Artois, qui devient un véritable site de production bio en insertion.</p>
                    <p>Les parcelles et serres sont cultivées en agriculture biologique, travaillées avec des rotations
                        de cultures pour préserver les sols, et entretenues par des équipes en insertion.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/potagers.jpg" alt="Jardins maraîchers">
                </div>
            </div>
        </section>

        <!-- Agriculture respectueuse -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Une agriculture respectueuse de l’environnement</h2>
                <p>Dans nos jardins :</p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li>aucun engrais chimique ;</li>
                    <li>pas de pesticides ni d’insecticides ;</li>
                    <li>des amendements organiques et des techniques simples pour enrichir le sol ;</li>
                    <li>un travail sur la biodiversité (haies, mares, zones refuges, nichoirs, hôtels à insectes).</li>
                </ul>
                <p>Cette manière de produire permet de proposer des légumes sains, de saison et locaux, de limiter
                    l’impact sur l’eau et les sols, et de créer un cadre d’apprentissage riche pour les salariés.</p>
            </div>
        </section>

        <!-- Details Maraichage -->
        <!-- Une section détaillée sur le maraîchage -->
        <section class="content-section">
            <div class="text-content">
                <h2>Comment se procurer nos légumes ?</h2>
                <p>Les légumes produits par Nœux Environnement sont proposés :</p>
                <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                    <li>en paniers de légumes préparés chaque semaine ;</li>
                    <li>lors de ventes sur place et marchés, notamment à La Réserve ;</li>
                    <li>via la plateforme de producteurs locaux LeCourtCircuit.fr, où “Les Maraîchers de Nœux
                        Environnement” sont présents comme producteur bio, avec La Réserve comme point de retrait.</li>
                </ul>
                <p>Les paniers contiennent selon la saison : salades, pommes de terre, carottes, poireaux, oignons,
                    courges, radis, tomates, choux, etc.</p>
                <a href="index.php?view=paniers" class="btn btn-primary" style="margin-top: 1rem;">Tout savoir sur nos paniers de
                    légumes</a>
            </div>
        </section>

        <!-- Panier Solidaire -->
        <section class="content-section">
            <div class="text-image-block reverse">
                <div class="text-content">
                    <h2>Le panier solidaire : accessible à tous</h2>
                    <p>En complément des paniers “classiques”, l’association met en place un “panier solidaire”. Le même
                        panier de légumes peut être proposé à prix réduit pour certaines familles, la réduction
                        dépendant du quotient familial communiqué par la CAF.</p>
                    <p>Ce système permet de soutenir des ménages aux revenus plus modestes, tout en maintenant un prix
                        juste pour les producteurs.</p>
                </div>
                <div class="image-content">
                    <img src="assets/images/vente_legume.jpg" alt="Panier de légumes">
                </div>
            </div>
        </section>

        <!-- La Réserve & LeCourtCircuit -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>La Réserve, lieu de vente et de rencontre</h2>
                <p>Chaque semaine, La Réserve devient un lieu de rendez-vous pour les amateurs de produits locaux :
                    vente directe de légumes de Nœux Environnement, retrait des commandes passées sur LeCourtCircuit.fr,
                    et parfois présence d’autres producteurs.</p>
                <p>C’est l’occasion de discuter avec les maraîchers, découvrir les jardins et rencontrer d’autres
                    acteurs du territoire.</p>
            </div>
        </section>

        <!-- Insertion -->
        <section class="content-section">
            <div class="text-content">
                <h2>Apprendre un métier en produisant des légumes</h2>
                <p>L’activité maraîchère sert de support de travail aux salariés en parcours d’insertion : préparation
                    des sols, semis, plantation, désherbage manuel, récolte, lavage, pesée, préparation des paniers,
                    accueil des clients.</p>
                <p>Ces tâches permettent de développer des compétences techniques en agriculture écologique et en
                    logistique, des habitudes professionnelles et une meilleure connaissance du tissu local.</p>
            </div>
        </section>

        <!-- Alimentation Durable -->
        <section class="content-section" style="text-align: center;">
            <h2>Mieux manger, plus près de chez soi</h2>
            <p>À travers ce projet maraîcher, Nœux Environnement souhaite encourager la consommation de produits frais,
                de saison, issus du territoire, montrer que l’on peut manger mieux sans forcément dépenser plus, et
                proposer des supports pédagogiques pour parler alimentation, santé, budget et gaspillage alimentaire.
            </p>
        </section>

    </main>
