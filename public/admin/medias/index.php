<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

// Tout le monde (lecteur/redacteur/admin) peut voir la liste
Auth::requireRole('lecteur');

$siteId = isset($_GET['site_id']) ? (int) $_GET['site_id'] : null;
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$perPage = 20;
$offset = ($page - 1) * $perPage;

$pdo = Database::getConnection();

// Construction requête filtrée
$sql = "SELECT * FROM medias";
$params = [];
if ($siteId) {
    $sql .= " WHERE site_id = :site_id";
    $params['site_id'] = $siteId;
}
$sql .= " ORDER BY date_creation DESC LIMIT $perPage OFFSET $offset";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$medias = $stmt->fetchAll();

// Compter total pour pagination simple
$sqlCount = "SELECT COUNT(*) FROM medias";
if ($siteId) {
    $sqlCount .= " WHERE site_id = :site_id";
}
$stmtCount = $pdo->prepare($sqlCount);
$stmtCount->execute($params);
$total = $stmtCount->fetchColumn();
$totalPages = ceil($total / $perPage);

$canEdit = Auth::hasRole('redacteur'); // Admin est inclus car admin > redacteur
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des Médias - La Réserve</title>
    <link rel="stylesheet" href="/reserve/css/style.css">
    <style>
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .media-item {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            background: white;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .media-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .media-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
            cursor: pointer;
        }

        .media-info {
            font-size: 0.85em;
            color: #555;
            margin: 10px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .media-actions {
            margin-top: auto;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .pagination {
            margin-top: 30px;
            text-align: center;
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #ddd;
            color: #333;
            text-decoration: none;
            border-radius: 3px;
        }

        .pagination a.active {
            background-color: #333;
            color: white;
            border-color: #333;
        }

        .filters {
            margin-bottom: 25px;
            padding: 15px;
            background: #fff;
            border-radius: 4px;
            border-left: 4px solid #333;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .filters a {
            text-decoration: none;
            color: #333;
            margin: 0 5px;
            font-weight: 500;
        }

        .filters a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="admin-panel" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1>Médiathèque</h1>
            <a href="/admin/index.php">Retour Dashboard</a>
        </div>

        <div class="filters">
            Filtrer par site :
            <a href="?">Tous</a> |
            <a href="?site_id=1">Nœux Environnement</a> |
            <a href="?site_id=2">La Réserve</a>
        </div>

        <?php if ($canEdit): ?>
            <div style="margin-bottom: 20px;">
                <a href="ajouter.php" class="btn"
                    style="background:green; color:white; padding:10px; text-decoration:none;">+ Ajouter une image</a>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['msg'])): ?>
            <div style="color: green; font-weight: bold; margin-bottom: 15px;">
                <?= htmlspecialchars($_GET['msg']) ?>
            </div>
        <?php endif; ?>

        <div class="media-grid">
            <?php foreach ($medias as $media): ?>
                <?php
                $filePath = $media['chemin_fichier'] ?? '';
                $altText = $media['texte_alt'] ?? '';
                $originalName = $media['nom_original'] ?? 'Sans nom';
                $mediaId = $media['id'] ?? 0;
                ?>
                <div class="media-item">
                    <a href="/<?= htmlspecialchars($filePath) ?>" target="_blank" title="Voir en grand">
                        <?php if ($filePath): ?>
                            <img src="/<?= htmlspecialchars($filePath) ?>" alt="<?= htmlspecialchars($altText) ?>">
                        <?php else: ?>
                            <div
                                style="height:150px; display:flex; align-items:center; justify-content:center; background:#f0f0f0; color:#999;">
                                Image introuvable
                            </div>
                        <?php endif; ?>
                    </a>
                    <div class="media-info" title="<?= htmlspecialchars($originalName) ?>">
                        <?= htmlspecialchars($originalName) ?>
                    </div>
                    <?php if ($canEdit && $mediaId): ?>
                        <div class="media-actions">
                            <form action="supprimer.php" method="post"
                                onsubmit="return confirm('Confirmer la suppression définitive ?');">
                                <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
                                <input type="hidden" name="id" value="<?= $mediaId ?>">
                                <button type="submit"
                                    style="background:#dc3545; color:white; border:none; padding:6px 12px; border-radius:4px; cursor:pointer; font-size:0.9em;">Supprimer</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>&site_id=<?= $siteId ?>" class="<?= $i == $page ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>