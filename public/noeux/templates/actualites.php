<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=actualites");
	die("");
}

?>


    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/visite_jardin.jpg');">
        <h1>Actualités</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Intro -->
        <!-- Un petit texte d'introduction -->
        <section class="content-section" style="text-align: center; display: block;">
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;">Cette page rassemble les nouvelles de Nœux
                Environnement et de La Réserve : chantiers nature, animations, projets, événements, vie de
                l’association…</p>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 1rem auto 0;">Vous y trouverez des articles courts,
                illustrés de photos, qui montrent ce qui se passe concrètement sur le terrain.</p>
        </section>

        <!-- News Grid -->
        <!-- Une grille pour afficher les dernières actualités -->
        <!-- À la une -->
        <section class="content-section">
            <div class="text-content">
                <h2>À la une</h2>
                <div class="grid-3">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/images/lareservehero_bellephoto_nuit.jpg" alt="La Réserve">
                        </div>
                        <div class="card-content">
                            <h3>Ouverture de La Réserve</h3>
                            <p>Découvrez notre nouvel écolieu vivant de l’Artois, un espace dédié à la nature et au
                                partage.</p>
                            <a href="#" class="btn btn-primary" style="margin-top: 0.5rem;">Lire l'article</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/images/vente_legume.jpg" alt="Panier Solidaire">
                        </div>
                        <div class="card-content">
                            <h3>Lancement du Panier Solidaire</h3>
                            <p>Un nouveau dispositif pour rendre les légumes bio accessibles à tous.</p>
                            <a href="#" class="btn btn-primary" style="margin-top: 0.5rem;">Lire l'article</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/images/visite_jardin.jpg" alt="Fête du Sol Vivant">
                        </div>
                        <div class="card-content">
                            <h3>Retour sur la Fête du Sol Vivant</h3>
                            <p>Une journée riche en échanges et découvertes autour du jardinage naturel.</p>
                            <a href="#" class="btn btn-primary" style="margin-top: 0.5rem;">Lire l'article</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Toutes les actualités -->
        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="text-content">
                <h2>Toutes nos actualités</h2>

                <!-- Filtres (Placeholder) -->
                <div style="margin-bottom: 2rem;">
                    <span style="font-weight: bold; margin-right: 1rem;">Filtrer par :</span>
                    <button class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Nature &
                        Territoires</button>
                    <button class="btn btn-secondary"
                        style="padding: 0.5rem 1rem; font-size: 0.9rem;">Maraîchage</button>
                    <button class="btn btn-secondary"
                        style="padding: 0.5rem 1rem; font-size: 0.9rem;">Insertion</button>
                    <button class="btn btn-secondary"
                        style="padding: 0.5rem 1rem; font-size: 0.9rem;">Éducation</button>
                </div>

                <div class="grid-2">
                    <!-- Article 1 -->
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <span style="color: #666; font-size: 0.9rem;">12 Juin 2025 - Nature</span>
                            <h3>Réhabilitation d’un espace naturel à Labourse</h3>
                            <p>Nos équipes sont intervenues pour restaurer une zone humide et planter des haies.</p>
                            <a href="#" style="color: var(--primary-color); font-weight: bold;">Plus de détails
                                &rarr;</a>
                        </div>
                    </div>
                    <!-- Article 2 -->
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <span style="color: #666; font-size: 0.9rem;">05 Juin 2025 - Éducation</span>
                            <h3>Les oiseaux à l’honneur au lycée</h3>
                            <p>Animation pédagogique avec les élèves pour construire des nichoirs.</p>
                            <a href="#" style="color: var(--primary-color); font-weight: bold;">Plus de détails
                                &rarr;</a>
                        </div>
                    </div>
                    <!-- Article 3 -->
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <span style="color: #666; font-size: 0.9rem;">28 Mai 2025 - Événement</span>
                            <h3>World Clean Up Day : retour en images</h3>
                            <p>Merci à tous les bénévoles pour cette belle action de nettoyage !</p>
                            <a href="#" style="color: var(--primary-color); font-weight: bold;">Plus de détails
                                &rarr;</a>
                        </div>
                    </div>
                    <!-- Article 4 -->
                    <div class="card" style="box-shadow: none; border: 1px solid #eee;">
                        <div class="card-content">
                            <span style="color: #666; font-size: 0.9rem;">20 Mai 2025 - Atelier</span>
                            <h3>Cultivons notre santé</h3>
                            <p>Retour sur l'atelier jardinage et alimentation saine.</p>
                            <a href="#" style="color: var(--primary-color); font-weight: bold;">Plus de détails
                                &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Réseaux Sociaux -->
        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2>Suivre Nœux Environnement au quotidien</h2>
                <p>Pour suivre nos actions au fil des jours, vous pouvez aussi consulter nos publications sur les
                    réseaux sociaux (photos de chantiers, ateliers, coulisses de La Réserve, etc.).</p>
                <a href="https://facebook.com" target="_blank" class="btn btn-primary" style="margin-top: 1rem;">Nous
                    suivre sur Facebook</a>
            </div>
        </section>

        <!-- Journal Associatif -->
        <section class="content-section"
            style="background-color: var(--secondary-color); color: var(--white); padding: 2rem; border-radius: 8px;">
            <div class="text-image-block">
                <div class="text-content">
                    <h2 style="color: var(--white);">Journal associatif</h2>
                    <p>Retrouvez toute l'actualité de l'association dans notre journal trimestriel.</p>
                    <a href="assets/docs/journal-asso-2025.pdf" target="_blank" class="btn btn-secondary"
                        style="background-color: var(--white); color: var(--secondary-color); margin-top: 1rem;">Télécharger
                        le dernier journal (PDF)</a>
                </div>
                <div class="image-content" style="display: flex; justify-content: center; align-items: center;">
                    <div
                        style="width: 150px; height: 200px; background-color: rgba(255,255,255,0.2); border: 2px solid white; display: flex; align-items: center; justify-content: center;">
                        <span>Couverture Journal</span>
                    </div>
                </div>
            </div>
        </section>

    </main>
