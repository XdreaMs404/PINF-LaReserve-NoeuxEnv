<?php
namespace Services;

class Uploader
{
    /**
     * Upload une image, la valide, la déplace et l'insère en base.
     * Retourne l'ID du média créé ou lance une exception.
     */
    public static function uploadImage(array $file, int $siteId, string $altText = ''): int
    {
        // 1. Vérifications de base (Code erreur UPLOAD)
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception("Erreur lors de l'upload du fichier (Code: " . $file['error'] . ")");
        }

        // 2. Vérification taille (5 Mo max)
        $maxSize = 5 * 1024 * 1024;
        if ($file['size'] > $maxSize) {
            throw new \Exception("Le fichier est trop volumineux (Max 5 Mo).");
        }

        // 3. Vérification extension et Type MIME
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Finfo pour le MIME réel
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);

        if (!in_array($ext, $allowedExtensions) || !in_array($mime, $allowedMimeTypes)) {
            throw new \Exception("Format de fichier non supporté (MIME: $mime, Ext: $ext).");
        }

        // 4. Renommage sécurisé : YYYYMMDD_HHMMSS_random.ext
        $filename = date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;

        // Chemin relatif (pour BDD) et absolu (pour déplacement)
        $relativePath = 'uploads/' . $filename;
        $uploadDir = PUBLIC_PATH . '/uploads';

        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                throw new \Exception("Impossible de créer le dossier d'upload.");
            }
        }

        $targetPath = $uploadDir . '/' . $filename;

        // 5. Déplacement du fichier
        if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
            throw new \Exception("Erreur lords du déplacement du fichier.");
        }

        // 6. Insertion en base de données
        $pdo = \Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO medias (site_id, chemin_fichier, nom_original, type_mime, texte_alt, date_creation)
            VALUES (:site_id, :chemin, :nom, :mime, :alt, NOW())
        ");

        $stmt->execute([
            'site_id' => $siteId,
            'chemin' => $relativePath,
            'nom' => $file['name'],
            'mime' => $mime,
            'alt' => $altText
        ]);

        return (int) $pdo->lastInsertId();
    }

    /**
     * Supprime un média (Fichier + BDD)
     */
    public static function deleteMedia(int $id): bool
    {
        $pdo = \Database::getConnection();

        // Récupérer le chemin du fichier
        $stmt = $pdo->prepare("SELECT chemin_fichier FROM medias WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $media = $stmt->fetch();

        if (!$media) {
            return false;
        }

        // Supprimer le fichier physique
        $filePath = PUBLIC_PATH . '/' . $media['chemin_fichier'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Supprimer en BDD
        $del = $pdo->prepare("DELETE FROM medias WHERE id = :id");
        return $del->execute(['id' => $id]);
    }
}
