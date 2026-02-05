<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=mentions-legales");
    die("");
}

?>




    <!-- Hero Section -->
    <section class="hero" style="background-color: var(--primary-color);">
        <div class="hero-content">
            <h1>Mentions Légales</h1>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <section class="content-section">
            <div class="text-content">
                <h2>Éditeur du site</h2>
                <p><strong>Nœux Environnement</strong><br>
                    Association loi 1901<br>
                    22 bis Rue Nationale<br>
                    62290 Nœux-les-Mines<br>
                    Tél : 03 21 66 37 74<br>
                    Email : contact@noeux-environnement.fr</p>

                <h2 style="margin-top: 2rem;">Directeur de la publication</h2>
                <p>Monsieur le Président de Nœux Environnement.</p>

                <h2 style="margin-top: 2rem;">Hébergement</h2>
                <p>Ce site est hébergé par [Nom de l'hébergeur]<br>
                    [Adresse de l'hébergeur]<br>
                    [Contact de l'hébergeur]</p>

                <h2 style="margin-top: 2rem;">Propriété intellectuelle</h2>
                <p>L’ensemble de ce site relève de la législation française et internationale sur le droit d’auteur et
                    la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les
                    documents téléchargeables et les représentations iconographiques et photographiques.</p>

                <h2 style="margin-top: 2rem;">Données personnelles</h2>
                <p>Conformément à la loi « Informatique et Libertés » et au RGPD, vous disposez d’un droit d’accès, de
                    modification et de suppression des données vous concernant. Pour l'exercer, adressez-vous à Nœux
                    Environnement via le formulaire de contact ou par courrier.</p>
            </div>
        </section>
    </main>
