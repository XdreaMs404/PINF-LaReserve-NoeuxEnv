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
<?php
$page_title = 'Gestion des utilisateurs - Admin';
require_once __DIR__ . '/../includes/header.php';
?>
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
<?php require_once __DIR__ . '/../includes/footer.php'; ?>