<?php

// Fichier de configuration d'accès à la BDD
// Lignes pour accèder à la BDD HappyBDD si sur linux
/*
$BDD_host="localhost";
$BDD_user="";
$BDD_password=""; // vide sous windows
$BDD_base="bdd_sporti"; //nom de la BDD
*/

require_once __DIR__ . '/../../../../config/bootstrap.php';

$BDD_host = getenv('DB_HOST'); 
$BDD_user = getenv('DB_USER'); 
$BDD_password = getenv('DB_PASS');  
$BDD_base = getenv('DB_NAME');
