<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=actualites");
    die("");
}

?>



    <style>
        .news-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 992px) {
            .news-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .news-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
        }

        .news-image {
            height: 200px;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .news-date {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 0.5rem;
        }

        .news-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
        }

        .news-excerpt {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 1rem;
            flex: 1;
        }

        .news-tag {
            display: inline-block;
            background-color: var(--accent-color);
            color: var(--secondary-color);
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
            align-self: flex-start;
        }
    </style>



    <!-- Hero Section -->
    <section class="hero" style="background-image: url('assets/images/chantier_participatif.jpg');">
        <div class="hero-content">
            <h1>Actualités</h1>
            <p>Projets en cours, chantiers réalisés, retours sur les événements… Suivez la vie de l’écolieu au fil des
                saisons.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- Section 1: À la une -->
        <section class="content-section">
            <h2 class="section-title">À la une</h2>
            <div class="text-image-block">
                <div class="image-content">
                    <img src="assets/images/travaux_ouvrier.jpg" alt="Avancée des travaux">
                </div>
                <div class="text-content">
                    <span class="news-tag">Bâtiment & Travaux</span>
                    <h3>Les travaux de rénovation avancent !</h3>
                    <p class="news-date">Publié le 10 Juin 2024</p>
                    <p>La réhabilitation du bâtiment principal entre dans sa phase finale. L'isolation extérieure est
                        terminée et les aménagements intérieurs des salles de réunion commencent. Un chantier exemplaire
                        en termes de matériaux biosourcés.</p>
                    <a href="#" class="btn btn-primary" style="margin-top: 1rem;">Lire l'article</a>
                </div>
            </div>
        </section>

        <!-- Section 2: Toutes les actualités -->
        <section class="content-section" style="background-color: var(--white);">
            <h2 class="section-title">Toutes les actualités</h2>

            <!-- Filters -->
            <div style="margin-bottom: 2rem; text-align: center;">
                <button class="btn btn-secondary" style="font-size: 0.9rem; margin: 0.2rem;">Tout</button>
                <button class="btn btn-secondary"
                    style="font-size: 0.9rem; margin: 0.2rem; opacity: 0.7;">Chantier</button>
                <button class="btn btn-secondary"
                    style="font-size: 0.9rem; margin: 0.2rem; opacity: 0.7;">Jardin</button>
                <button class="btn btn-secondary" style="font-size: 0.9rem; margin: 0.2rem; opacity: 0.7;">Vie du
                    lieu</button>
            </div>

            <div class="news-grid">
                <!-- Article 1 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="assets/images/plantation_haie.jpg" alt="Plantation">
                    </div>
                    <div class="news-content">
                        <span class="news-tag">Jardin</span>
                        <h3 class="news-title">Plantation de la micro-forêt</h3>
                        <p class="news-date">25 Mai 2024</p>
                        <p class="news-excerpt">Retour en images sur le chantier participatif où plus de 100 arbres ont
                            été plantés avec les habitants.</p>
                        <a href="#" style="color: var(--primary-color); font-weight: bold;">Lire la suite →</a>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="assets/images/repas_partage.jpg" alt="Repas">
                    </div>
                    <div class="news-content">
                        <span class="news-tag">Vie du lieu</span>
                        <h3 class="news-title">Succès pour la fête du printemps</h3>
                        <p class="news-date">15 Mai 2024</p>
                        <p class="news-excerpt">Une belle journée de convivialité sous le soleil, avec marché, musique
                            et
                            découverte des jardins.</p>
                        <a href="#" style="color: var(--primary-color); font-weight: bold;">Lire la suite →</a>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="assets/images/cours_education_enfant.jpg" alt="Scolaires">
                    </div>
                    <div class="news-content">
                        <span class="news-tag">Pédagogie</span>
                        <h3 class="news-title">Accueil des écoles : c'est parti</h3>
                        <p class="news-date">02 Mai 2024</p>
                        <p class="news-excerpt">Les premières classes sont venues découvrir la biodiversité de La
                            Réserve. Au programme : observation des insectes et semis.</p>
                        <a href="#" style="color: var(--primary-color); font-weight: bold;">Lire la suite →</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Lien NE -->
        <section class="content-section" style="text-align: center;">
            <div class="text-content">
                <h2>Et du côté de Nœux Environnement ?</h2>
                <p>Pour suivre aussi les actualités de l’association Nœux Environnement (chantiers nature, projets sur
                    le
                    territoire, vie associative…), vous pouvez consulter le site principal.</p>
                <a href="/noeux/index.php?view=actualites" class="btn btn-secondary" style="margin-top: 1rem;">Voir les actus Nœux
                    Environnement</a>
            </div>
        </section>

    </main>

