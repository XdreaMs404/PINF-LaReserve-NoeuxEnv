<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

// Seul un rédacteur ou admin peut lancer cette action
Auth::requireRole('redacteur');

$pdo = Database::getConnection();

// Dossiers à parcourir (en fonction des sites)
$directories = [
    1 => PUBLIC_PATH . '/noeux/assets/images',
    2 => PUBLIC_PATH . '/reserve/assets/images'
];

$countAjout = 0;

foreach ($directories as $siteId => $dir) {
    if (!is_dir($dir)) continue;

    $files = scandir($dir);
    if ($files === false) continue;

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;

        // On ignore ce qui n'est pas une image web courante
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) continue;

        $fullPath = $dir . '/' . $file;
        if (!is_file($fullPath)) continue;

        // Le chemin attendu en base de données pour les vieux fichiers
        // (La logique existante du CMS recherche 'assets/images/...')
        $cheminDb = 'assets/images/' . $file;

        // Vérifier si ce fichier existe déjà dans la base pour le site concerné
        $stmtCheck = $pdo->prepare("SELECT id FROM medias WHERE site_id = :site_id AND chemin_fichier = :chemin LIMIT 1");
        $stmtCheck->execute([
            'site_id' => $siteId,
            'chemin'  => $cheminDb
        ]);

        if (!$stmtCheck->fetch()) {
            // Le fichier n'existe pas, on l'ajoute
            $mime = mime_content_type($fullPath);
            if (!$mime) $mime = 'image/jpeg';
            
            // Format du nom alternatif : "mon_image_hero" -> "mon image hero"
            $altName = str_replace(['_', '-'], ' ', pathinfo($file, PATHINFO_FILENAME));

            $stmtInsert = $pdo->prepare("
                INSERT INTO medias (site_id, chemin_fichier, nom_original, type_mime, texte_alt, date_creation)
                VALUES (:site_id, :chemin, :nom, :mime, :alt, NOW())
            ");
            $stmtInsert->execute([
                'site_id' => $siteId,
                'chemin'  => $cheminDb,
                'nom'     => $file,
                'mime'    => $mime,
                'alt'     => ucfirst(strtolower($altName))
            ]);
            
            $countAjout++;
        }
    }
}

// Redirection avec le compte des nouveaux fichiers ajoutés
header('Location: index.php?msg=' . urlencode("$countAjout nouvelle(s) image(s) détectée(s) et ajoutée(s) à la médiathèque."));
exit;
