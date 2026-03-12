<?php
// src/Csrf.php

class Csrf
{
    /**
     * Génère un token CSRF et le stocke en session.
     * Retourne le token à inclure dans un formulaire.
     */
    public static function token(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Vérifie si le token posté correspond à celui en session.
     */
    public static function check(string $token): bool
    {
        if (!isset($_SESSION['csrf_token'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }
}
