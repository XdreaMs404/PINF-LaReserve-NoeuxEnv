<?php
if (!defined('AUTH_INCLUDED') && !class_exists('Auth')) {
    require_once __DIR__ . '/../../../config/bootstrap.php';
}

// S'assurer que l'utilisateur est connecté et au moins lecteur
Auth::requireRole('lecteur');
$user = Auth::user();

$isAdminSubfolder = (basename(dirname($_SERVER['SCRIPT_FILENAME'])) !== 'admin');
$basePath = $isAdminSubfolder ? '..' : '.';
$rootPath = $isAdminSubfolder ? '../..' : '..';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Administration - PINF' ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; }
        .admin-navbar { background-color: #2E7D32; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; color: white; }
        .admin-navbar a { color: white; text-decoration: none; margin-right: 15px; font-weight: bold; }
        .admin-navbar a:hover { text-decoration: underline; }
        .admin-user { font-size: 14px; }
        .admin-user a { text-decoration: underline; margin-right: 0; margin-left: 10px; }
        .admin-container { max-width: 1000px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-edit, .btn-primary { display: inline-block; padding: 8px 12px; background-color: #f39c12; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn-edit:hover, .btn-primary:hover { background-color: #d68910; }
        .btn-danger { background-color: #e74c3c; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #2E7D32; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .site-badge { background-color: #eee; padding: 4px 8px; border-radius: 12px; font-size: 12px; color: #555; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 0.9em; }
        .badge-admin { background: #6f42c1; color: white; }
        .badge-redac { background: #17a2b8; color: white; }
        .badge-lect { background: #28a745; color: white; }
        .badge-user { background: #6c757d; color: white; }
        .btn { display: inline-block; padding: 8px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn-secondary { background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; }
        .btn-warning { background: #f0f9ff; color: #0284c7; border: 1px solid #bae6fd; }
        .search-form { display: flex; gap: 10px; margin-bottom: 20px; }
        .search-form input { padding: 8px; border: 1px solid #ccc; border-radius: 4px; flex-grow: 1; max-width: 300px; }
        /* Utilitaires partagés */
        .mb-3 { margin-bottom: 15px; }
        .alert { padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    </style>
</head>
<body>

<div class="admin-navbar">
    <div>
        <a href="<?= $basePath ?>/index.php">🏠 Accueil</a>
        <a href="<?= $basePath ?>/cms/index.php">📄 CMS / Pages</a>
        <a href="<?= $basePath ?>/medias/index.php">🖼️ Médias</a>
        <a href="<?= $basePath ?>/salles/index.php">📅 Salles</a>
        <?php if (Auth::hasRole('administrateur')): ?>
            <a href="<?= $basePath ?>/cms/validation.php" style="color: #fcd34d;">⚠️ À Valider</a>
            <a href="<?= $basePath ?>/parametres/index.php">⚙️ Paramètres</a>
            <a href="<?= $basePath ?>/utilisateurs/index.php">👥 Utilisateurs</a>
        <?php endif; ?>
    </div>
    <div class="admin-user">
        <?= htmlspecialchars($user['email'] ?? '') ?> (<?= htmlspecialchars($user['role'] ?? '') ?>)
        <a href="<?= $rootPath ?>/logout.php">Déconnexion</a>
    </div>
</div>

<div class="admin-container">
