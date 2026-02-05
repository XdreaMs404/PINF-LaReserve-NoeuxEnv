<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=paniers");
	die("");
}

?>

    <!-- La section "Hero", c'est la grande bannière avec l'image de fond tout en haut -->
    <section class="hero"
        style="background-image: linear-gradient(rgba(46, 125, 50, 0.8), rgba(46, 125, 50, 0.8)), url('assets/images/potagers2.jpg');">
        <div class="hero-content">
            <h1>Commander un panier de légumes bio</h1>
            <p class="subtitle">Des légumes bio, de saison, cultivés à Nœux-les-Mines par les maraîchers de Nœux
                Environnement, dans le cadre de l’insertion par l’activité économique.</p>
            <div class="hero-buttons">
                <a href="https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024"
                    target="_blank" class="btn btn-secondary">Commander un panier</a>
                <a href="#panier-solidaire" class="btn btn-secondary"
                    style="background-color: transparent; border: 2px solid white;">Demander un panier solidaire</a>
            </div>
        </div>
    </section>

    <!-- Ici commence le contenu principal de la page -->
    <main class="container">

        <!-- Pourquoi choisir nos paniers ? -->
        <!-- Une section pour expliquer pourquoi nos paniers sont bien -->
        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2>Pourquoi choisir nos paniers de légumes ?</h2>
                <div style="max-width: 800px; margin: 0 auto; text-align: left;">
                    <p>Nos paniers de légumes sont :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><strong>Bio :</strong> les légumes sont cultivés en agriculture biologique, sans pesticides
                            ni engrais chimiques de synthèse.</li>
                        <li><strong>Locaux :</strong> ils viennent des parcelles maraîchères de Nœux Environnement,
                            notamment à La Réserve – écolieu vivant de l’Artois.</li>
                        <li><strong>Solidaires :</strong> ils sont produits dans le cadre d’un Atelier Chantier
                            d’Insertion. En achetant un panier, vous soutenez directement des personnes en parcours de
                            retour à l’emploi.</li>
                        <li><strong>De saison :</strong> le contenu varie en fonction des saisons et de la météo, pour
                            respecter les cycles naturels.</li>
                    </ul>
                    <p style="text-align: center; font-weight: bold; margin-top: 1rem;">Chaque panier, c’est donc du bon
                        dans l’assiette, et du sens dans le projet.</p>
                </div>
            </div>
        </section>

        <!-- Nos formules de paniers -->
        <!-- Ici je présente les deux types de paniers (simple et familial) -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 3rem 1rem; border-radius: 8px;">
            <h2 class="section-title">Nos formules de paniers</h2>
            <div class="grid-2">
                <!-- Panier Simple -->
                <div class="card">
                    <div class="card-content" style="text-align: center;">
                        <h3 style="font-size: 1.5rem;">Panier simple</h3>
                        <p style="color: #666; font-style: italic; margin-bottom: 1rem;">Idéal pour 1 à 2 personnes</p>
                        <ul
                            style="text-align: left; margin-bottom: 1.5rem; list-style-type: disc; padding-left: 1.5rem;">
                            <li>Approx. 1 panier pour 1 à 2 personnes qui cuisinent régulièrement.</li>
                            <li>Contient plusieurs légumes de saison (3 à 5 variétés selon la période).</li>
                            <li>Exemple (printemps) : salade, radis, carottes, herbes aromatiques.</li>
                            <li>Exemple (été) : tomates, courgettes, concombres, oignons frais.</li>
                        </ul>
                        <p
                            style="font-size: 1.5rem; font-weight: bold; color: var(--primary-color); margin-bottom: 1.5rem;">
                            12 € / panier</p>
                        <a href="https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024"
                            target="_blank" class="btn btn-primary">Choisir le panier simple</a>
                    </div>
                </div>

                <!-- Panier Familial -->
                <div class="card">
                    <div class="card-content" style="text-align: center;">
                        <h3 style="font-size: 1.5rem;">Panier familial</h3>
                        <p style="color: #666; font-style: italic; margin-bottom: 1rem;">Pour 3 à 4 personnes</p>
                        <ul
                            style="text-align: left; margin-bottom: 1.5rem; list-style-type: disc; padding-left: 1.5rem;">
                            <li>Pensé pour une famille ou un foyer de 3 à 4 personnes.</li>
                            <li>Contient une plus grande quantité de légumes et/ou plus de variétés.</li>
                            <li>Exemple (printemps) : plusieurs salades, épinards, carottes, poireaux, aromatiques.</li>
                            <li>Exemple (été) : tomates, courgettes, poivrons, aubergines, pommes de terre nouvelles.
                            </li>
                        </ul>
                        <p
                            style="font-size: 1.5rem; font-weight: bold; color: var(--primary-color); margin-bottom: 1.5rem;">
                            17 € / panier</p>
                        <a href="https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024"
                            target="_blank" class="btn btn-primary">Choisir le panier familial</a>
                    </div>
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem; color: #555;">Le contenu exact des paniers change chaque
                semaine en fonction de la production et de la météo.<br>Nous essayons toujours de proposer des paniers
                équilibrés et variés.</p>
        </section>

        <!-- Comment ça marche ? -->
        <section class="content-section">
            <h2 class="section-title">Comment ça marche ?</h2>
            <div class="grid-3" style="text-align: center;">
                <div>
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">1</div>
                    <h3>Je choisis ma formule</h3>
                    <p>Je choisis le type de panier qui correspond le mieux à mon foyer :<br>Panier simple (1–2
                        personnes) ou Panier familial (3–4 personnes).</p>
                </div>
                <div>
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">2</div>
                    <h3>Je commande</h3>
                    <p>Je passe commande en ligne via HelloAsso.<br>Je précise mes coordonnées, la date de retrait
                        souhaitée et le type de panier.</p>
                </div>
                <div>
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">3</div>
                    <h3>Je viens chercher mon panier</h3>
                    <p>Je récupère mon panier à La Réserve aux horaires de retrait.<br>Je viens avec mon cabas et ma
                        confirmation de commande.</p>
                </div>
            </div>
        </section>

        <!-- Panier Solidaire -->
        <section id="panier-solidaire" class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Le panier solidaire</h2>
                    <p>Parce que l’accès à une alimentation de qualité ne doit pas dépendre uniquement du revenu, Nœux
                        Environnement met en place un panier solidaire.</p>
                    <p>Le principe :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li>notre panier de légumes (valeur ~15 €) peut être proposé à un tarif réduit,</li>
                        <li>ce tarif est calculé en fonction du quotient familial CAF,</li>
                        <li>le dispositif est soutenu par des partenaires financiers pour compenser la différence de
                            prix.</li>
                    </ul>
                    <p>Si vous pensez pouvoir bénéficier du panier solidaire, ou si vous accompagnez des familles qui
                        pourraient en avoir besoin, n’hésitez pas à nous contacter.</p>
                    <div style="background-color: #e8f5e9; padding: 1rem; border-radius: 4px; margin-top: 1rem;">
                        <p style="font-weight: bold; margin-bottom: 0.5rem;">Pour demander un panier solidaire :</p>
                        <ul style="list-style-type: disc; padding-left: 2rem;">
                            <li>prendre contact avec Nœux Environnement,</li>
                            <li>apporter ou transmettre un justificatif de quotient familial CAF,</li>
                            <li>échanger avec notre équipe sur les modalités.</li>
                        </ul>
                    </div>
                    <a href="index.php?view=contact" class="btn btn-secondary" style="margin-top: 1rem;">Demander un panier
                        solidaire</a>
                </div>
                <div class="image-content">
                    <img src="assets/images/vente_legume.jpg" alt="Panier Solidaire">
                </div>
            </div>
        </section>

        <!-- Où et quand récupérer mon panier ? -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="grid-2">
                <div>
                    <h2>Où et quand récupérer mon panier ?</h2>
                    <h3 style="color: var(--primary-color); margin-top: 1rem;">Lieu de retrait</h3>
                    <p><strong>La Réserve – écolieu vivant de l’Artois</strong><br>
                        22 bis rue Nationale<br>
                        62290 Nœux-les-Mines</p>
                    <p style="margin-top: 0.5rem;">La Réserve est le nouveau lieu de travail et de vie de Nœux
                        Environnement : un bâtiment réhabilité, des jardins, des parcelles de maraîchage… Un bon
                        prétexte pour venir découvrir le site en récupérant vos légumes !</p>
                </div>
                <div>
                    <h3 style="color: var(--primary-color); margin-top: 1rem;">Jours et horaires de retrait</h3>
                    <p>Les paniers sont habituellement à retirer :<br>
                        – le vendredi entre 16h et 19h,<br>
                        – éventuellement le samedi matin (vérifier lors de la commande).</p>
                    <p>Les créneaux exacts sont indiqués dans le mail de confirmation de votre commande.</p>
                    <div
                        style="border: 1px solid var(--primary-color); padding: 1rem; border-radius: 4px; margin-top: 1rem; background-color: var(--white);">
                        <p style="font-weight: bold; color: var(--primary-color); margin-bottom: 0.5rem;">Pensez-y !</p>
                        <ul style="list-style-type: disc; padding-left: 1.5rem;">
                            <li>Venez avec vos cabas ou cagettes.</li>
                            <li>Si vous ne pouvez pas venir, essayez de faire récupérer votre panier par un proche.</li>
                            <li>En cas d’empêchement de dernière minute, contactez-nous dès que possible.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Autres produits locaux -->
        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2>Commander aussi d’autres produits locaux</h2>
                <p style="max-width: 800px; margin: 0 auto;">En plus des paniers de Nœux Environnement, vous pouvez
                    commander d’autres produits locaux (pain, produits laitiers, fruits, etc.) via notre partenaire de
                    circuits courts.</p>
                <div style="max-width: 800px; margin: 1rem auto; text-align: left;">
                    <p>Le principe :</p>
                    <ul style="list-style-type: disc; padding-left: 2rem;">
                        <li>je commande en ligne sur la plateforme LeCourtCircuit.fr,</li>
                        <li>je choisis La Réserve – Nœux Environnement comme point de retrait,</li>
                        <li>je viens chercher ma commande en même temps que mon panier de légumes.</li>
                    </ul>
                </div>
                <a href="https://lecourtcircuit.fr" target="_blank" class="btn btn-secondary"
                    style="margin-top: 1rem;">Commander d’autres produits locaux</a>
            </div>
        </section>

        <!-- FAQ -->
        <section class="content-section">
            <h2 class="section-title">Questions fréquentes</h2>
            <div style="max-width: 800px; margin: 0 auto;">
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Q1 – Que trouve-t-on dans un panier
                        ?</h4>
                    <p>Le contenu change chaque semaine en fonction des saisons et de la production. En général, un
                        panier contient 3 à 6 variétés de légumes différents, tous produits en agriculture biologique.
                        Nous essayons de proposer des paniers équilibrés.</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Q2 – Peut-on choisir la composition
                        du panier ?</h4>
                    <p>Non, nous ne faisons pas de “commande à la carte”. Le panier est préparé à l’avance en fonction
                        de la récolte de la semaine. En revanche, nous faisons en sorte de varier le contenu sur la
                        saison.</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Q3 – Que se passe-t-il si je ne peux
                        pas venir chercher mon panier ?</h4>
                    <p>Idéalement, vous pouvez demander à un proche de venir le récupérer à votre place. Si vous savez à
                        l’avance que vous ne pourrez pas être là, contactez-nous dès que possible. Passé un certain
                        délai sans nouvelles, le panier non retiré pourra être redistribué.</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Q4 – Comment fonctionne le paiement
                        ?</h4>
                    <p>Le paiement se fait en ligne, lors de la commande (CB via HelloAsso). Les informations de
                        paiement sont indiquées clairement lors de la commande.</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Q5 – Je n’ai pas beaucoup de moyens
                        : puis-je quand même avoir un panier ?</h4>
                    <p>Oui, c’est le but du panier solidaire. Grâce à un financement spécifique, certaines familles
                        peuvent bénéficier d’un tarif réduit, calculé en fonction du quotient familial CAF.</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Q6 – Est-ce que je m’engage sur
                        plusieurs mois ?</h4>
                    <p>Cela dépend de la formule mise en place. Certains paniers sont proposés à l’unité, d’autres
                        peuvent être pris sous forme d’abonnement. Les modalités d’engagement sont précisées lors de la
                        commande.</p>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 3rem; border-radius: 8px; text-align: center;">
            <h2>Une question avant de commander ?</h2>
            <p style="margin-bottom: 2rem;">Si vous avez besoin d’un renseignement avant de passer commande (allergie,
                organisation, panier solidaire, commande groupée…), vous pouvez nous contacter :</p>
            <p><strong>Par mail :</strong> contact@noeux-environnement.fr</p>
            <p><strong>Par téléphone :</strong> 03 21 66 37 74</p>
            <a href="index.php?view=contact" class="btn btn-primary" style="margin-top: 1rem;">Nous contacter</a>
        </section>

    </main>