<?php
// src/Services/Parametre.php

namespace Services;

class Parametre
{
    /**
     * Récupère la valeur d'un paramètre depuis la base de données.
     * Pour un étudiant débutant : cela évite d'écrire en dur les infos de contact.
     * 
     * @param string $cle La clé du paramètre (ex: 'telephone', 'email_officiel')
     * @param int $siteId ID du site (1 pour Noeux, 2 pour La Réserve)
     * @return string La valeur du paramètre ou une chaîne vide si introuvable.
     */
    public static function get(string $cle, int $siteId): string
    {
        $pdo = \Database::getConnection();
        $stmt = $pdo->prepare("SELECT valeur FROM parametres WHERE cle = :cle AND site_id = :site_id LIMIT 1");
        $stmt->execute(['cle' => $cle, 'site_id' => $siteId]);
        
        $result = $stmt->fetchColumn();
        return $result !== false ? (string) $result : '';
    }
}
