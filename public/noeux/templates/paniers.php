<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=paniers");
    die("");
}

// 1. Connexion à la base de données
$pdo = Database::getConnection();

// 2. L'ID de la page "Paniers bio" est 5
$page_id = 5;

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

    <section class="hero"
        style="background-image: linear-gradient(rgba(46, 125, 50, 0.8), rgba(46, 125, 50, 0.8)), url('<?= htmlspecialchars($blocs['paniers_hero_img']['chemin_fichier'] ?? 'assets/images/potagers2.jpg') ?>');">
        <div class="hero-content">
            <h1><?= $blocs['paniers_hero_h1']['contenu_texte_publie'] ?? 'Commander un panier de légumes bio' ?></h1>
            <p class="subtitle"><?= $blocs['paniers_hero_p']['contenu_texte_publie'] ?? 'Des légumes bio, de saison, cultivés à Nœux-les-Mines par les maraîchers de Nœux Environnement, dans le cadre de l’insertion par l’activité économique.' ?></p>
            <div class="hero-buttons">
                <a href="<?= htmlspecialchars($blocs['paniers_hero_a_1']['url_publie'] ?? 'https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024') ?>"
                    target="_blank" class="btn btn-secondary">
                    <?= $blocs['paniers_hero_a_1']['contenu_texte_publie'] ?? 'Commander un panier' ?>
                </a>
                <a href="#panier-solidaire" class="btn btn-secondary"
                    style="background-color: transparent; border: 2px solid white;">
                    <?= $blocs['paniers_hero_a_2']['contenu_texte_publie'] ?? 'Demander un panier solidaire' ?>
                </a>
            </div>
        </div>
    </section>

    <main class="container">

        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2><?= $blocs['paniers_h2_1']['contenu_texte_publie'] ?? 'Pourquoi choisir nos paniers de légumes ?' ?></h2>
                <div style="max-width: 800px; margin: 0 auto; text-align: left;">
                    <p><?= $blocs['paniers_p_1']['contenu_texte_publie'] ?? 'Nos paniers de légumes sont :' ?></p>
                    <ul style="list-style-type: disc; padding-left: 2rem; margin-bottom: 1rem;">
                        <li><?= $blocs['paniers_li_1']['contenu_texte_publie'] ?? '<strong>Bio :</strong> les légumes sont cultivés en agriculture biologique, sans pesticides ni engrais chimiques de synthèse.' ?></li>
                        <li><?= $blocs['paniers_li_2']['contenu_texte_publie'] ?? '<strong>Locaux :</strong> ils viennent des parcelles maraîchères de Nœux Environnement, notamment à La Réserve – écolieu vivant de l’Artois.' ?></li>
                        <li><?= $blocs['paniers_li_3']['contenu_texte_publie'] ?? '<strong>Solidaires :</strong> ils sont produits dans le cadre d’un Atelier Chantier d’Insertion. En achetant un panier, vous soutenez directement des personnes en parcours de retour à l’emploi.' ?></li>
                        <li><?= $blocs['paniers_li_4']['contenu_texte_publie'] ?? '<strong>De saison :</strong> le contenu varie en fonction des saisons et de la météo, pour respecter les cycles naturels.' ?></li>
                    </ul>
                    <p style="text-align: center; font-weight: bold; margin-top: 1rem;">
                        <?= $blocs['paniers_p_2']['contenu_texte_publie'] ?? 'Chaque panier, c’est donc du bon dans l’assiette, et du sens dans le projet.' ?>
                    </p>
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 3rem 1rem; border-radius: 8px;">
            <h2 class="section-title"><?= $blocs['paniers_h2_2']['contenu_texte_publie'] ?? 'Nos formules de paniers' ?></h2>
            <div class="grid-2">
                <div class="card">
                    <div class="card-content" style="text-align: center;">
                        <h3 style="font-size: 1.5rem;"><?= $blocs['paniers_h3_1']['contenu_texte_publie'] ?? 'Panier simple' ?></h3>
                        <p style="color: #666; font-style: italic; margin-bottom: 1rem;">
                            <?= $blocs['paniers_p_3']['contenu_texte_publie'] ?? 'Idéal pour 1 à 2 personnes' ?>
                        </p>
                        <div style="text-align: left; margin-bottom: 1.5rem; padding-left: 1.5rem;">
                            <ul style="list-style-type: disc;">
                                <li><?= $blocs['paniers_li_5']['contenu_texte_publie'] ?? 'Approx. 1 panier pour 1 à 2 personnes qui cuisinent régulièrement.' ?></li>
                                <li><?= $blocs['paniers_li_6']['contenu_texte_publie'] ?? 'Contient plusieurs légumes de saison (3 à 5 variétés selon la période).' ?></li>
                                <li><?= $blocs['paniers_li_7']['contenu_texte_publie'] ?? 'Exemple (printemps) : salade, radis, carottes, herbes aromatiques.' ?></li>
                                <li><?= $blocs['paniers_li_8']['contenu_texte_publie'] ?? 'Exemple (été) : tomates, courgettes, concombres, oignons frais.' ?></li>
                            </ul>
                        </div>
                        <p style="font-size: 1.5rem; font-weight: bold; color: var(--primary-color); margin-bottom: 1.5rem;">
                            <?= $blocs['paniers_p_4']['contenu_texte_publie'] ?? '12 € / panier' ?>
                        </p>
                        <a href="<?= htmlspecialchars($blocs['paniers_a_1']['url_publie'] ?? 'https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024') ?>"
                            target="_blank" class="btn btn-primary">
                            <?= $blocs['paniers_a_1']['contenu_texte_publie'] ?? 'Choisir le panier simple' ?>
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content" style="text-align: center;">
                        <h3 style="font-size: 1.5rem;"><?= $blocs['paniers_h3_2']['contenu_texte_publie'] ?? 'Panier familial' ?></h3>
                        <p style="color: #666; font-style: italic; margin-bottom: 1rem;">
                            <?= $blocs['paniers_p_5']['contenu_texte_publie'] ?? 'Pour 3 à 4 personnes' ?>
                        </p>
                        <div style="text-align: left; margin-bottom: 1.5rem; padding-left: 1.5rem;">
                            <ul style="list-style-type: disc;">
                                <li><?= $blocs['paniers_li_9']['contenu_texte_publie'] ?? 'Pensé pour une famille ou un foyer de 3 à 4 personnes.' ?></li>
                                <li><?= $blocs['paniers_li_10']['contenu_texte_publie'] ?? 'Contient une plus grande quantité de légumes et/ou plus de variétés.' ?></li>
                                <li><?= $blocs['paniers_li_11']['contenu_texte_publie'] ?? 'Exemple (printemps) : plusieurs salades, épinards, carottes, poireaux, aromatiques.' ?></li>
                                <li><?= $blocs['paniers_li_12']['contenu_texte_publie'] ?? 'Exemple (été) : tomates, courgettes, poivrons, aubergines, pommes de terre nouvelles.' ?></li>
                            </ul>
                        </div>
                        <p style="font-size: 1.5rem; font-weight: bold; color: var(--primary-color); margin-bottom: 1.5rem;">
                            <?= $blocs['paniers_p_6']['contenu_texte_publie'] ?? '17 € / panier' ?>
                        </p>
                        <a href="<?= htmlspecialchars($blocs['paniers_a_2']['url_publie'] ?? 'https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024') ?>"
                            target="_blank" class="btn btn-primary">
                            <?= $blocs['paniers_a_2']['contenu_texte_publie'] ?? 'Choisir le panier familial' ?>
                        </a>
                    </div>
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem; color: #555;">
                <?= $blocs['paniers_p_7']['contenu_texte_publie'] ?? 'Le contenu exact des paniers change chaque semaine en fonction de la production et de la météo.<br>Nous essayons toujours de proposer des paniers équilibrés et variés.' ?>
            </p>
        </section>

        <section class="content-section">
            <h2 class="section-title"><?= $blocs['paniers_h2_3']['contenu_texte_publie'] ?? 'Comment ça marche ?' ?></h2>
            <div class="grid-3" style="text-align: center;">
                <div>
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">1</div>
                    <h3><?= $blocs['paniers_h3_3']['contenu_texte_publie'] ?? 'Je choisis ma formule' ?></h3>
                    <p><?= $blocs['paniers_p_8']['contenu_texte_publie'] ?? 'Je choisis le type de panier qui correspond le mieux à mon foyer :<br>Panier simple (1–2 personnes) ou Panier familial (3–4 personnes).' ?></p>
                </div>
                <div>
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">2</div>
                    <h3><?= $blocs['paniers_h3_4']['contenu_texte_publie'] ?? 'Je commande' ?></h3>
                    <p><?= $blocs['paniers_p_9']['contenu_texte_publie'] ?? 'Je passe commande en ligne via HelloAsso.<br>Je précise mes coordonnées, la date de retrait souhaitée et le type de panier.' ?></p>
                </div>
                <div>
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">3</div>
                    <h3><?= $blocs['paniers_h3_5']['contenu_texte_publie'] ?? 'Je viens chercher mon panier' ?></h3>
                    <p><?= $blocs['paniers_p_10']['contenu_texte_publie'] ?? 'Je récupère mon panier à La Réserve aux horaires de retrait.<br>Je viens avec mon cabas et ma confirmation de commande.' ?></p>
                </div>
            </div>
        </section>

        <section id="panier-solidaire" class="content-section">
            <div class="text-image-block">
                <div class="text-content">
                    <h2><?= $blocs['paniers_h2_4']['contenu_texte_publie'] ?? 'Le panier solidaire' ?></h2>
                    <p><?= $blocs['paniers_p_11']['contenu_texte_publie'] ?? 'Parce que l’accès à une alimentation de qualité ne doit pas dépendre uniquement du revenu, Nœux Environnement met en place un panier solidaire.' ?></p>
                    <p><?= $blocs['paniers_p_12']['contenu_texte_publie'] ?? 'Le principe :' ?></p>
                    <div style="margin-bottom: 1rem;">
                        <ul style="list-style-type: disc; padding-left: 2rem;">
                            <li><?= $blocs['paniers_li_13']['contenu_texte_publie'] ?? 'notre panier de légumes (valeur ~15 €) peut être proposé à un tarif réduit,' ?></li>
                            <li><?= $blocs['paniers_li_14']['contenu_texte_publie'] ?? 'ce tarif est calculé en fonction du quotient familial CAF,' ?></li>
                            <li><?= $blocs['paniers_li_15']['contenu_texte_publie'] ?? 'le dispositif est soutenu par des partenaires financiers pour compenser la différence de prix.' ?></li>
                        </ul>
                    </div>
                    <p><?= $blocs['paniers_p_13']['contenu_texte_publie'] ?? 'Si vous pensez pouvoir bénéficier du panier solidaire, ou si vous accompagnez des familles qui pourraient en avoir besoin, n’hésitez pas à nous contacter.' ?></p>
                    <div style="background-color: #e8f5e9; padding: 1rem; border-radius: 4px; margin-top: 1rem;">
                        <p style="font-weight: bold; margin-bottom: 0.5rem;"><?= $blocs['paniers_p_14']['contenu_texte_publie'] ?? 'Pour demander un panier solidaire :' ?></p>
                        <ul style="list-style-type: disc; padding-left: 2rem;">
                            <li><?= $blocs['paniers_li_16']['contenu_texte_publie'] ?? 'prendre contact avec Nœux Environnement,' ?></li>
                            <li><?= $blocs['paniers_li_17']['contenu_texte_publie'] ?? 'apporter ou transmettre un justificatif de quotient familial CAF,' ?></li>
                            <li><?= $blocs['paniers_li_18']['contenu_texte_publie'] ?? 'échanger avec notre équipe sur les modalités.' ?></li>
                        </ul>
                    </div>
                    <a href="<?= htmlspecialchars($blocs['paniers_a_3']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-secondary" style="margin-top: 1rem;">
                        <?= $blocs['paniers_a_3']['contenu_texte_publie'] ?? 'Demander un panier solidaire' ?>
                    </a>
                </div>
                <div class="image-content">
                    <img src="<?= htmlspecialchars($blocs['paniers_img_solidaire']['chemin_fichier'] ?? 'assets/images/vente_legume.jpg') ?>" 
                         alt="<?= htmlspecialchars($blocs['paniers_img_solidaire']['texte_alt'] ?? 'Panier Solidaire') ?>">
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 2rem; border-radius: 8px;">
            <div class="grid-2">
                <div>
                    <h2><?= $blocs['paniers_h2_5']['contenu_texte_publie'] ?? 'Où et quand récupérer mon panier ?' ?></h2>
                    <h3 style="color: var(--primary-color); margin-top: 1rem;"><?= $blocs['paniers_h3_6']['contenu_texte_publie'] ?? 'Lieu de retrait' ?></h3>
                    <div>
                        <p><?= $blocs['paniers_p_15']['contenu_texte_publie'] ?? 'La Réserve – écolieu vivant de l’Artois<br>22 bis rue Nationale<br>62290 Nœux-les-Mines' ?></p>
                        <p style="margin-top: 0.5rem;"><?= $blocs['paniers_p_16']['contenu_texte_publie'] ?? 'La Réserve est le nouveau lieu de travail et de vie de Nœux Environnement : un bâtiment réhabilité, des jardins, des parcelles de maraîchage… Un bon prétexte pour venir découvrir le site en récupérant vos légumes !' ?></p>
                    </div>
                </div>
                <div>
                    <h3 style="color: var(--primary-color); margin-top: 1rem;"><?= $blocs['paniers_h3_7']['contenu_texte_publie'] ?? 'Jours et horaires de retrait' ?></h3>
                    <div>
                        <p><?= $blocs['paniers_p_17']['contenu_texte_publie'] ?? 'Les paniers sont habituellement à retirer :<br>– le vendredi entre 16h et 19h,<br>– éventuellement le samedi matin (vérifier lors de la commande).' ?></p>
                        <p><?= $blocs['paniers_p_18']['contenu_texte_publie'] ?? 'Les créneaux exacts sont indiqués dans le mail de confirmation de votre commande.' ?></p>
                    </div>
                    <div
                        style="border: 1px solid var(--primary-color); padding: 1rem; border-radius: 4px; margin-top: 1rem; background-color: var(--white);">
                        <p style="font-weight: bold; color: var(--primary-color); margin-bottom: 0.5rem;"><?= $blocs['paniers_p_19']['contenu_texte_publie'] ?? 'Pensez-y !' ?></p>
                        <ul style="list-style-type: disc; padding-left: 1.5rem;">
                            <li><?= $blocs['paniers_li_19']['contenu_texte_publie'] ?? 'Venez avec vos cabas ou cagettes.' ?></li>
                            <li><?= $blocs['paniers_li_20']['contenu_texte_publie'] ?? 'Si vous ne pouvez pas venir, essayez de faire récupérer votre panier par un proche.' ?></li>
                            <li><?= $blocs['paniers_li_21']['contenu_texte_publie'] ?? 'En cas d’empêchement de dernière minute, contactez-nous dès que possible.' ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content" style="text-align: center;">
                <h2><?= $blocs['paniers_h2_6']['contenu_texte_publie'] ?? 'Commander aussi d’autres produits locaux' ?></h2>
                <p style="max-width: 800px; margin: 0 auto;"><?= $blocs['paniers_p_20']['contenu_texte_publie'] ?? 'En plus des paniers de Nœux Environnement, vous pouvez commander d’autres produits locaux (pain, produits laitiers, fruits, etc.) via notre partenaire de circuits courts.' ?></p>
                <div style="max-width: 800px; margin: 1rem auto; text-align: left;">
                    <p><?= $blocs['paniers_p_21']['contenu_texte_publie'] ?? 'Le principe :' ?></p>
                    <ul style="list-style-type: disc; padding-left: 2rem;">
                        <li><?= $blocs['paniers_li_22']['contenu_texte_publie'] ?? 'je commande en ligne sur la plateforme LeCourtCircuit.fr,' ?></li>
                        <li><?= $blocs['paniers_li_23']['contenu_texte_publie'] ?? 'je choisis La Réserve – Nœux Environnement comme point de retrait,' ?></li>
                        <li><?= $blocs['paniers_li_24']['contenu_texte_publie'] ?? 'je viens chercher ma commande en même temps que mon panier de légumes.' ?></li>
                    </ul>
                </div>
                <a href="<?= htmlspecialchars($blocs['paniers_a_4']['url_publie'] ?? 'https://lecourtcircuit.fr') ?>" target="_blank" class="btn btn-secondary"
                    style="margin-top: 1rem;">
                    <?= $blocs['paniers_a_4']['contenu_texte_publie'] ?? 'Commander d’autres produits locaux' ?>
                </a>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title"><?= $blocs['paniers_h2_7']['contenu_texte_publie'] ?? 'Questions fréquentes' ?></h2>
            <div style="max-width: 800px; margin: 0 auto;">
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;"><?= $blocs['paniers_h4_1']['contenu_texte_publie'] ?? 'Q1 – Que trouve-t-on dans un panier ?' ?></h4>
                    <p><?= $blocs['paniers_p_22']['contenu_texte_publie'] ?? 'Le contenu change chaque semaine en fonction des saisons et de la production. En général, un panier contient 3 à 6 variétés de légumes différents, tous produits en agriculture biologique. Nous essayons de proposer des paniers équilibrés.' ?></p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;"><?= $blocs['paniers_h4_2']['contenu_texte_publie'] ?? 'Q2 – Peut-on choisir la composition du panier ?' ?></h4>
                    <p><?= $blocs['paniers_p_23']['contenu_texte_publie'] ?? 'Non, nous ne faisons pas de “commande à la carte”. Le panier est préparé à l’avance en fonction de la récolte de la semaine. En revanche, nous faisons en sorte de varier le contenu sur la saison.' ?></p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;"><?= $blocs['paniers_h4_3']['contenu_texte_publie'] ?? 'Q3 – Que se passe-t-il si je ne peux pas venir chercher mon panier ?' ?></h4>
                    <p><?= $blocs['paniers_p_24']['contenu_texte_publie'] ?? 'Idéalement, vous pouvez demander à un proche de venir le récupérer à votre place. Si vous savez à l’avance que vous ne pourrez pas être là, contactez-nous dès que possible. Passé un certain délai sans nouvelles, le panier non retiré pourra être redistribué.' ?></p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;"><?= $blocs['paniers_h4_4']['contenu_texte_publie'] ?? 'Q4 – Comment fonctionne le paiement ?' ?></h4>
                    <p><?= $blocs['paniers_p_25']['contenu_texte_publie'] ?? 'Le paiement se fait en ligne, lors de la commande (CB via HelloAsso). Les informations de paiement sont indiquées clairement lors de la commande.' ?></p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;"><?= $blocs['paniers_h4_5']['contenu_texte_publie'] ?? 'Q5 – Je n’ai pas beaucoup de moyens : puis-je quand même avoir un panier ?' ?></h4>
                    <p><?= $blocs['paniers_p_26']['contenu_texte_publie'] ?? 'Oui, c’est le but du panier solidaire. Grâce à un financement spécifique, certaines familles peuvent bénéficier d’un tarif réduit, calculé en fonction du quotient familial CAF.' ?></p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;"><?= $blocs['paniers_h4_6']['contenu_texte_publie'] ?? 'Q6 – Est-ce que je m’engage sur plusieurs mois ?' ?></h4>
                    <p><?= $blocs['paniers_p_27']['contenu_texte_publie'] ?? 'Cela dépend de la formule mise en place. Certains paniers sont proposés à l’unité, d’autres peuvent être pris sous forme d’abonnement. Les modalités d’engagement sont précisées lors de la commande.' ?></p>
                </div>
            </div>
        </section>

        <section class="content-section"
            style="background-color: var(--light-gray); padding: 3rem; border-radius: 8px; text-align: center;">
            <h2><?= $blocs['paniers_h2_8']['contenu_texte_publie'] ?? 'Une question avant de commander ?' ?></h2>
            <p style="margin-bottom: 2rem;"><?= $blocs['paniers_p_28']['contenu_texte_publie'] ?? 'Si vous avez besoin d’un renseignement avant de passer commande (allergie, organisation, panier solidaire, commande groupée…), vous pouvez nous contacter :' ?></p>
            <p><strong>Par mail :</strong> <?= $blocs['paniers_p_29']['contenu_texte_publie'] ?? 'contact@noeuxenvironnement.fr' ?></p>
            <p><strong>Par téléphone :</strong> <?= $blocs['paniers_p_30']['contenu_texte_publie'] ?? '03 21 66 37 74' ?></p>
            <a href="<?= htmlspecialchars($blocs['paniers_a_5']['url_publie'] ?? 'index.php?view=contact') ?>" class="btn btn-primary" style="margin-top: 1rem;">
                <?= $blocs['paniers_a_5']['contenu_texte_publie'] ?? 'Nous contacter' ?>
            </a>
        </section>

    </main>