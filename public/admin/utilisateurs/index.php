<?php
// public/admin/utilisateurs/index.php
require_once __DIR__ . '/../../../config/bootstrap.php';

// Protection : seul l'administrateur peut accéder
Auth::requireRole('administrateur');

$pdo = Database::getConnection();
$error = null;
$msg = $_GET['msg'] ?? null;

// Recherche simple
$search = $_GET['q'] ?? '';
$sql = "SELECT * FROM utilisateurs";
$params = [];

if (!empty($search)) {
    $sql .= " WHERE email LIKE :search";
    $params['search'] = '%' . $search . '%';
}

$sql .= " ORDER BY date_creation DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$users = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs - La Réserve</title>
    <link rel="stylesheet" href="/reserve/css/style.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 8px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn-warning {
            background: #ffc107;
            color: black;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background: #f8f9fa;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9em;
        }

        .badge-admin {
            background: #6f42c1;
            color: white;
        }

        .badge-redac {
            background: #17a2b8;
            color: white;
        }

        .badge-lect {
            background: #28a745;
            color: white;
        }

        .badge-user {
            background: #6c757d;
            color: white;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-form input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            flex-grow: 1;
            max-width: 300px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Gestion des utilisateurs</h1>
            <div>
                <a href="../index.php" class="btn btn-secondary">Retour Dashboard</a>
                <a href="ajouter.php" class="btn">Ajouter un utilisateur</a>
            </div>
        </div>

        <?php if ($msg): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endif; ?>

        <form method="GET" class="search-form">
            <input type="text" name="q" placeholder="Rechercher par email..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn">Rechercher</button>
            <?php if (!empty($search)): ?>
                <a href="index.php" class="btn btn-secondary">Effacer</a>
            <?php endif; ?>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actif</th>
                    <th>Créé le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars($u['email']) ?>
                        </td>
                        <td>
                            <?php
                            $badgeClass = 'badge-user';
                            if ($u['role'] === 'administrateur')
                                $badgeClass = 'badge-admin';
                            elseif ($u['role'] === 'redacteur')
                                $badgeClass = 'badge-redac';
                            elseif ($u['role'] === 'lecteur')
                                $badgeClass = 'badge-lect';
                            ?>
                            <span class="badge <?= $badgeClass ?>">
                                <?= htmlspecialchars($u['role']) ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($u['actif']): ?>
                                <span style="color: green;">Oui</span>
                            <?php else: ?>
                                <span style="color: red;">Non</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($u['date_creation']) ?>
                        </td>
                        <td>
                            <a href="modifier.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <?php if ($u['id'] != Auth::user('id')): ?>
                                <form action="supprimer.php" method="POST" style="display:inline;"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                    <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            <?php else: ?>
                                <span class="btn btn-secondary btn-sm" disabled
                                    title="Vous ne pouvez pas supprimer votre propre compte">Supprimer</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($users) === 0): ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Aucun utilisateur trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>