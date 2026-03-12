<?php
include_once "libs/maLibSQL.pdo.php";
include_once "libs/maLibUtils.php";

$salle_id = valider("salle_id");
$date = valider("date");

// Crucial : on ne cherche que les réservations VALIDÉES (1)
$sql = "SELECT id_creneau FROM reservations 
        WHERE salle_id = '$salle_id' 
        AND date_voulue = '$date' 
        AND validation = 1";

$res = parcoursRs(SQLSelect($sql));
$ids = array_column($res, 'id_creneau');

header('Content-Type: application/json');
echo json_encode($ids);