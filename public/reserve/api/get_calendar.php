<?php
// On définit l'URL source de Nextcloud
$url = "https://lareserve-artois.fr/nextcloud/remote.php/dav/public-calendars/cbbbEKXCqkZnZagp?export";

// On récupère le fichier ICS via cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
$data = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Vérification de la réussite de la requête (Code 200)
if ($http_code == 200 && $data) {
    // On force les headers pour que le navigateur accepte la lecture du calendrier
    header("Content-Type: text/calendar; charset=utf-8");
    echo $data;
} else {
    // Gestion d'erreur propre
    header("HTTP/1.1 500 Internal Server Error");
    echo "Erreur lors de la récupération du calendrier (Code: $http_code)";
}
?>
