<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=marche-alimentation");
    die("");
}

?>






    <!-- Hero Section -->
    <section class="hero" style="background-image: url('../assets/images/legumes_panier.jpg');">
        <div class="hero-content">
            <h1>Marché & Alimentation Locale</h1>
            <p>La Réserve est un lieu où l’on parle alimentation, producteurs locaux et légumes de saison. Achetez des
                produits, récupérez vos commandes, et participez à des ateliers cuisine.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: Marché -->
        <section class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2>Le marché à La Réserve</h2>
                    <p>La Réserve accueille un petit marché avec les légumes bio cultivés sur place par les Maraîchers
                        de Nœux Environnement et parfois d'autres producteurs locaux.</p>
                    <p style="margin-top: 1rem;">Vous pouvez y acheter des légumes au détail, récupérer votre panier, et
                        discuter avec l'équipe. C'est un moment convivial pour rencontrer d'autres habitants.</p>
                </div>
                <div class="image-content">
                    <img src="../assets/images/stand_marche.jpg" alt="Marché local">
                </div>
            </div>
        </section>

        <!-- Section 2: Point Relais -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content">
                <h2>Point relais de producteurs locaux</h2>
                <p>La Réserve est un point relais pour des commandes de produits locaux (via LeCourtCircuit ou autre).
                </p>
                <ol style="margin-left: 1.5rem; margin-top: 1rem;">
                    <li>Commandez vos produits en ligne.</li>
                    <li>Choisissez La Réserve comme point de retrait.</li>
                    <li>Venez chercher votre commande à l'horaire indiqué.</li>
                </ol>
                <p style="margin-top: 1rem;">Cela permet de soutenir un réseau de producteurs locaux et de centraliser
                    les retraits.</p>
            </div>
        </section>

        <!-- Section 3: Paniers NE -->
        <section class="content-section"
            style="border: 2px solid var(--primary-color); border-radius: 8px; padding: 2rem; margin: 2rem 0;">
            <div class="text-content" style="text-align: center;">
                <h2>Paniers de légumes & Panier Solidaire</h2>
                <p>Les paniers de légumes bio de saison sont préparés par les Maraîchers de Nœux Environnement. Il
                    existe aussi un panier solidaire à tarif réduit sous conditions.</p>
                <a href="/noeux/index.php?view=paniers" class="btn btn-primary" style="margin-top: 1rem;">En savoir plus sur les
                    paniers</a>
            </div>
        </section>

        <!-- Section 4: Ateliers -->
        <section class="content-section">
            <h2 class="section-title">Ateliers autour de l’alimentation</h2>
            <div class="grid-3">
                <div class="card">
                    <h3>Cuisine de saison</h3>
                    <p>Découvrir de nouvelles recettes avec les légumes du moment.</p>
                </div>
                <div class="card">
                    <h3>Anti-gaspillage</h3>
                    <p>Apprendre à tout utiliser et limiter les déchets.</p>
                </div>
                <div class="card">
                    <h3>Repas partagés</h3>
                    <p>Moments conviviaux lors d'événements.</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <a href="index.php?view=agenda" class="btn btn-accent">Voir les prochains ateliers</a>
            </div>
        </section>

        <!-- Section 5: Infos Pratiques -->
        <section class="content-section" style="background-color: var(--white);">
            <div class="text-content">
                <h2>Infos pratiques</h2>
                <ul style="list-style: disc; margin-left: 1.5rem;">
                    <li><strong>Marché :</strong> [Jours et Horaires à préciser]</li>
                    <li><strong>Retrait commandes :</strong> [Jours et Horaires à préciser]</li>
                    <li><strong>Paiement :</strong> Espèces, Chèque, CB (selon producteurs).</li>
                </ul>
            </div>
        </section>

    </main>

    