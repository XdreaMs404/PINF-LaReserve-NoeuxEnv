<?php

/*
Partie modèle : on effectue ici tous les traitements sur la base de données (lecture, insertion, suppression, mise à jour).

Des fonctions sont déjà présentes : vous avez le droit de les modifier ou d'en ajouter à votre guise. Des indications sont données en commentaires.
*/

include_once("maLibSQL.pdo.php");
include_once "maLibUtils.php";

//*** Il est recommandé de ne pas modifier les fonctions suivantes, utilisées pour l'identification ***

function enregistrerReservation($salle_id, $prenom, $nom, $email, $tel, $date, $id_creneau, $materiel, $cuisine, $message) {
    $prenom = proteger($prenom);
    $nom = proteger($nom);
    $email = proteger($email);
    $tel = proteger($tel);
    $date = proteger($date);
    $materiel = proteger($materiel);
    $message = proteger($message);
    
    $cuisine = ($cuisine) ? 1 : 0;

    // Suppression de 'statut' qui causait l'erreur
    $sql = "INSERT INTO reservations (salle_id, prenom, nom, email, telephone, date_voulue, id_creneau, besoin_materiel, cuisine_pedagogique, message) 
            VALUES ('$salle_id', '$prenom', '$nom', '$email', '$tel', '$date', '$id_creneau', '$materiel', '$cuisine', '$message')";
    
    return SQLInsert($sql);
}





?>
