<?php
// src/Auth.php

class Auth
{
    // Rôles disponibles
    const ROLE_ADMIN = 'administrateur';
    const ROLE_REDACTEUR = 'redacteur';
    const ROLE_LECTEUR = 'lecteur';
    const ROLE_USER = 'utilisateur';

    /**
     * Tente de connecter un utilisateur
     */
    public static function login(string $email, string $password): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email AND actif = 1 LIMIT 1");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mot_de_passe_hash'])) {
            // Régénération de l'ID de session pour éviter la fixation de session
            session_regenerate_id(true);

            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            return true;
        }
        return false;
    }

    /**
     * Déconnecte l'utilisateur
     */
    public static function logout(): void
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }

    /**
     * Vérifie si l'utilisateur est connecté
     */
    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    /**
     * Récupère l'utilisateur connecté ou une valeur spécifique
     */
    public static function user(?string $key = null)
    {
        if (!self::isLogged()) {
            return null;
        }
        if ($key) {
            return $_SESSION['user'][$key] ?? null;
        }
        return $_SESSION['user'];
    }

    /**
     * Vérifie si l'utilisateur a un rôle spécifique (ou mieux)
     * Hiérarchie : administrateur > redacteur > lecteur > utilisateur
     */
    public static function hasRole(string $requiredRole): bool
    {
        if (!self::isLogged()) {
            return false;
        }

        $role = self::user('role');
        $hierarchy = [
            self::ROLE_USER => 1,
            self::ROLE_LECTEUR => 2,
            self::ROLE_REDACTEUR => 3,
            self::ROLE_ADMIN => 4
        ];

        $userLevel = $hierarchy[$role] ?? 0;
        $requiredLevel = $hierarchy[$requiredRole] ?? 0;

        return $userLevel >= $requiredLevel;
    }

    /**
     * Redirige si l'utilisateur n'a pas le rôle requis
     */
    public static function requireRole(string $role): void
    {
        if (!self::isLogged()) {
            // Pas connecté -> Login
            header('Location: /login.php');
            exit;
        }

        if (!self::hasRole($role)) {
            // Connecté mais pas assez de droits -> 403 propre
            // On vérifie si le fichier 403 existe, sinon erreur simple
            if (file_exists(PUBLIC_PATH . '/admin/403.php')) {
                // Si on est dans /public/admin/index.php, le chemin relatif est bon
                // Mais pour être sûr, on redirige ou include.
                // Redirection propre :
                header('Location: /admin/403.php');
            } else {
                http_response_code(403);
                die("403 Forbidden - Accès interdit.");
            }
            exit;
        }
    }
}
