<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=mentions-legales");
	die("");
}

?>

    <!-- En-tête de la page (Page Header) avec une image de fond -->
    <section class="page-header" style="background-color: var(--primary-color);">
        <h1>Mentions Légales</h1>
    </section>

    <!-- Le contenu principal -->
    <main class="container">
        <!-- Mentions Légales Content -->
        <!-- Ici c'est le texte obligatoire pour les mentions légales -->
        <section class="content-section">
            <div class="text-content">
                <h2>Éditeur du site</h2>
                <p><strong>Association Noeux Environnement</strong><br>
                    22 bis Rue Nationale<br>
                    62290 Nœux-les-Mines<br>
                    France</p>
                <p>Tél : 03 21 66 37 74<br>
                    Email : contact@noeux-environnement.fr</p>

                <h2 style="margin-top: 2rem;">Directeur de la publication</h2>
                <p>[Nom du Directeur]</p>

                <h2 style="margin-top: 2rem;">Hébergement</h2>
                <p>[Nom de l'hébergeur]<br>
                    [Adresse de l'hébergeur]</p>

                <h2 style="margin-top: 2rem;">Propriété intellectuelle</h2>
                <p>L'ensemble de ce site relève de la législation française et internationale sur le droit d'auteur et
                    la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les
                    documents téléchargeables et les représentations iconographiques et photographiques.</p>

                <h2 style="margin-top: 2rem;">Données personnelles</h2>
                <p>Conformément à la loi "Informatique et Libertés", vous disposez d'un droit d'accès, de modification
                    et de suppression des données qui vous concernent. Pour l'exercer, adressez-vous à l'association
                    Noeux Environnement.</p>
            </div>
        </section>
    </main>
