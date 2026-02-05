<?php
// On définit l'URL source de Nextcloud
$url = "https://lareserve-artois.fr/nextcloud/remote.php/dav/public-calendars/cbbbEKXCqkZnZagp?export";

// On récupère le fichier ICS
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
$data = curl_exec($ch);
curl_close($ch);

// On force les headers pour que le navigateur accepte la lecture
header("Content-Type: text/calendar; charset=utf-8");
header("Access-Control-Allow-Origin: *"); // Autorise ton site à lire la donnée

echo $data;
?>