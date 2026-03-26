<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

// Tout le monde (lecteur/redacteur/admin) peut voir la liste
Auth::requireRole('lecteur');

// Connexion à la base de données (adapte selon ton fichier de config)
$pdo = Database::getConnection();

// On récupère toutes les pages de la base de données
// J'ai fait une jointure (JOIN) avec la table "sites" pour afficher à quel site appartient la page (Noeux ou La Réserve)
$stmt = $pdo->query("
    SELECT pages.id, pages.titre_publie, pages.identifiant_url, sites.nom AS nom_site 
    FROM pages 
    JOIN sites ON pages.site_id = sites.id 
    ORDER BY sites.nom ASC, pages.titre_publie ASC
");
$pages = $stmt->fetchAll();
?>

<?php
$page_title = 'Gestion des pages - Admin';
require_once __DIR__ . '/../includes/header.php';
?>
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Gérer les pages</h1>
        <a href="../index.php" class="btn btn-secondary">Retour Dashboard</a>
    </div>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <p>Sélectionnez une page ci-dessous pour modifier ses textes et ses images.</p>

    <table>
        <thead>
            <tr>
                <th>Site</th>
                <th>Titre de la page</th>
                <th>URL (Identifiant)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page): ?>
                <tr>
                    <td><span class="site-badge"><?= htmlspecialchars($page['nom_site']) ?></span></td>
                    <td><strong><?= htmlspecialchars($page['titre_publie']) ?></strong></td>
                    <td>/<?= htmlspecialchars($page['identifiant_url']) ?></td>
                    <td>
                        <a href="editer.php?id=<?= $page['id'] ?>" class="btn-edit">✏️ Éditer le contenu</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($pages)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Aucune page trouvée dans la base de données.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        <a href="../index.php" style="color: #666; text-decoration: none;">&larr; Retour à l'accueil de l'administration</a>
    </div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>