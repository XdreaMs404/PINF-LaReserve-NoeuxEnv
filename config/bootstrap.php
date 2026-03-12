<?php
// config/bootstrap.php

// 1. Chargement du fichier .env (Parser simple)
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0 || strpos(trim($line), '--') === 0) {
            continue;
        }
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $key = trim($parts[0]);
            $value = trim($parts[1]);
            putenv(sprintf('%s=%s', $key, $value));
            $_ENV[$key] = $value;
        }
    }
} else {
    die("Le fichier .env est manquant à la racine du projet.");
}

// 2. Gestion des erreurs
if (getenv('APP_DEBUG') === 'true') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

if (session_status() === PHP_SESSION_NONE) {
    // 3. Configuration de la Session (Sécurisée)
    // Empêche l'accès au cookie via JS et force l'utilisation de cookies uniquement
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1); // Empêche l'utilisation d'ID de session non initialisés
    ini_set('session.cookie_samesite', 'Strict');

    // Secure cookie si HTTPS
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        ini_set('session.cookie_secure', 1);
    }

    session_start();
}

// 4. Définir des constantes de chemin
define('ROOT_PATH', dirname(__DIR__));
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('SRC_PATH', ROOT_PATH . '/src');

// 5. Autoloader simple pour les classes dans src/
spl_autoload_register(function ($class) {
    // Gestion des namespaces si besoin, ici on suppose Namespace = dossier, ou pas de namespace "src"
    // On supporte src/Auth.php directement si class Auth.
    $file = SRC_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

require_once __DIR__ . '/db.php';
