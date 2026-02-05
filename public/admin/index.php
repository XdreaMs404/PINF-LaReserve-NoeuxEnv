<?php
require_once __DIR__ . '/../../config/bootstrap.php';

// Protection : "lecteur" ou mieux peut voir le dashboard
Auth::requireRole('lecteur');

$user = Auth::user();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Administration - La Réserve</title>
    <link rel="stylesheet" href="/reserve/css/style.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .admin-panel {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: white;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="admin-panel">
        <div class="admin-header">
            <h1>Tableau de bord</h1>
            <div>
                Bienvenue,
                <?= htmlspecialchars($user['email']) ?> (
                <?= htmlspecialchars($user['role']) ?>) |
                <a href="/logout.php">Déconnexion</a>
            </div>
        </div>

        <div class="content">
            <p>Ceci est l'espace d'administration protégé.</p>
            <ul>
                <li><a href="#">Gérer les pages</a></li>
                <li><a href="medias/index.php">Gérer les médias</a></li>
                <?php if (Auth::hasRole('administrateur')): ?>
                    <li><a href="utilisateurs/index.php">Gérer les utilisateurs</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</body>

</html>