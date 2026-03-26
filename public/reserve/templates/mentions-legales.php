<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=mentions-legales");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Mentions légales" (La Réserve) est 20
$page_id = 20;

// 3. On récupère TOUS les blocs de cette page
$stmt = $pdo->prepare("
    SELECT b.*, m.chemin_fichier, m.texte_alt 
    FROM blocs_page b 
    LEFT JOIN medias m ON b.media_publie_id = m.id 
    WHERE b.page_id = :page_id
");
$stmt->execute(['page_id' => $page_id]);
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 4. On réorganise les résultats par leur nom (titre_publie)
$blocs = [];
foreach ($resultats as $row) {
    $blocs[$row['titre_publie']] = $row;
}
?>

    <section class="hero" style="background-color: var(--primary-color);">
        <div class="hero-content">
            <h1><?= $blocs['mentions-legales_']['contenu_texte_publie'] ?? 'Mentions Légales' ?></h1>
        </div>
    </section>

    <main class="container">
        <section class="content-section">
            <div class="text-content">
                <h2><?= $blocs['mentions-legales_h2_1']['contenu_texte_publie'] ?? 'Éditeur du site' ?></h2>
                <p><?= $blocs['mentions-legales_p_1']['contenu_texte_publie'] ?? "<strong>Nœux Environnement</strong>\nAssociation loi 1901\n22 bis Rue Nationale\n62290 Nœux-les-Mines\nTél : 03 21 66 37 74\nEmail : contact@noeuxenvironnement.fr" ?></p>

                <h2 style="margin-top: 2rem;"><?= $blocs['mentions-legales_h2_2']['contenu_texte_publie'] ?? 'Directeur de la publication' ?></h2>
                <p><?= $blocs['mentions-legales_p_2']['contenu_texte_publie'] ?? 'Monsieur le Président de Nœux Environnement.' ?></p>

                <h2 style="margin-top: 2rem;"><?= $blocs['mentions-legales_h2_3']['contenu_texte_publie'] ?? 'Hébergement' ?></h2>
                <p><?= $blocs['mentions-legales_p_3']['contenu_texte_publie'] ?? "Ce site est hébergé par [Nom de l'hébergeur]\n[Adresse de l'hébergeur]\n[Contact de l'hébergeur]" ?></p>

                <h2 style="margin-top: 2rem;"><?= $blocs['mentions-legales_h2_4']['contenu_texte_publie'] ?? 'Propriété intellectuelle' ?></h2>
                <p><?= $blocs['mentions-legales_p_4']['contenu_texte_publie'] ?? 'L’ensemble de ce site relève de la législation française et internationale sur le droit d’auteur et la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les documents téléchargeables et les représentations iconographiques et photographiques.' ?></p>

                <h2 style="margin-top: 2rem;"><?= $blocs['mentions-legales_h2_5']['contenu_texte_publie'] ?? 'Données personnelles' ?></h2>
                <p><?= $blocs['mentions-legales_p_5']['contenu_texte_publie'] ?? 'Conformément à la loi « Informatique et Libertés » et au RGPD, vous disposez d’un droit d’accès, de modification et de suppression des données vous concernant. Pour l\'exercer, adressez-vous à Nœux Environnement via le formulaire de contact ou par courrier.' ?></p>
            </div>
        </section>
    </main>