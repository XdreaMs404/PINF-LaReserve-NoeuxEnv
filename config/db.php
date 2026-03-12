<?php
// config/db.php

class Database {
    private static ?PDO $instance = null;

    private function __construct() {
        // Constructeur privé pour le Singleton
    }

    public static function getConnection(): PDO {
        if (self::$instance === null) {
            $host = getenv('DB_HOST');
            $db   = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASS');
            $charset = getenv('DB_CHARSET') ?: 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                // En prod, logged, mais ici on affiche simple pour les étudiants si DEBUG activé
                if (getenv('APP_DEBUG') === 'true') {
                    die("Erreur de connexion BDD : " . $e->getMessage());
                } else {
                    die("Erreur de connexion à la base de données.");
                }
            }
        }
        return self::$instance;
    }
}
