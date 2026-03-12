
<<?php
session_start();

include_once "libs/maLibUtils.php"; 
include_once "libs/modele.php"; 

$action = valider("action");

if ($action == 'traiter_reservation') {

    $salle_id = isset($_POST["salle_id"]) ? $_POST["salle_id"] : false;
    $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : false;
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : false;
    $email = isset($_POST["email"]) ? $_POST["email"] : false;
    $date = isset($_POST["date_voulue"]) ? $_POST["date_voulue"] : false;
    $creneaux = isset($_POST["id_creneau"]) ? $_POST["id_creneau"] : array();

    $tel = isset($_POST["telephone"]) ? $_POST["telephone"] : "";
    $materiel = isset($_POST["besoin_materiel"]) ? $_POST["besoin_materiel"] : "";
    $msg_client = isset($_POST["message"]) ? $_POST["message"] : "";
    $cuisine = isset($_POST["cuisine_pedagogique"]) ? 1 : 0;
    $champ_piege = isset($_POST["champ_piege"]) ? $_POST["champ_piege"] : "";

    $erreurs = [];
    if (!empty($champ_piege)) {
        header("Location: index.php?view=reserver-salle&err=" . urlencode("Erreur de validation anti-spam."));
        exit();
    }
    if (!$salle_id) $erreurs[] = "ID de la salle";
    if (!$prenom) $erreurs[] = "Prénom";
    if (!$nom) $erreurs[] = "Nom";
    if (!$email) $erreurs[] = "Email";
    if (!$date) $erreurs[] = "Date";
    if (empty($creneaux)) $erreurs[] = "Au moins un créneau";

    if (empty($erreurs)) {
        
        // --- NOUVELLE VÉRIFICATION DE SÉCURITÉ ---
        foreach ($creneaux as $id_creneau) {
            $id_c = intval($id_creneau);
            // On vérifie s'il existe déjà une réservation CONFIRMÉE (validation = 1)
            $sqlVerif = "SELECT id FROM reservations 
                         WHERE salle_id = '$salle_id' 
                         AND date_voulue = '$date' 
                         AND id_creneau = '$id_c' 
                         AND validation = 1";
            
            $dejaPris = parcoursRs(SQLSelect($sqlVerif));
            
            if (!empty($dejaPris)) {
                $_SESSION['sauvegarde_post'] = $_POST; 

                header("Location: index.php?view=reserver-salle&err=" . urlencode("Désolé, ce créneau vient d'être réservé !"));
                exit();
            }
        }
        // --- FIN DE LA VÉRIFICATION ---

        $succes_global = true;
        foreach ($creneaux as $id_creneau) {
            $idResa = enregistrerReservation(
                $salle_id, 
                $prenom, 
                $nom, 
                $email, 
                $tel, 
                $date, 
                intval($id_creneau), 
                $materiel, 
                $cuisine, 
                $msg_client
            );

            if (!$idResa) $succes_global = false;
        }

        if ($succes_global) {
            // -- NOUVEAUTÉ : Envoi d'un email à l'admin --
            require_once __DIR__ . '/../../config/bootstrap.php';
            $messageMail = "Nouvelle demande de réservation :\n\n";
            $messageMail .= "Salle ID : $salle_id\n";
            $messageMail .= "Nom / Prénom : $nom $prenom\n";
            $messageMail .= "Email : $email\n";
            $messageMail .= "Date souhaitée : $date\n";
            $messageMail .= "Message : " . ($msg_client ? $msg_client : "Aucun") . "\n\n";
            $messageMail .= "Rendez-vous sur l'espace d'administration pour valider ou refuser cette demande.";
            
            \Services\Mailer::sendMail("contact@noeuxenvironnement.fr", "[Site Reserve] Nouvelle demande de Salle", nl2br($messageMail), $messageMail);

            header("Location: index.php?view=reserver-salle&msg=" . urlencode("Demande de réservation enregistrée ! Une réponse vous sera envoyée par mail dans les plus brefs délais."));
        } else {
            header("Location: index.php?view=reserver-salle&err=" . urlencode("Erreur lors de l'insertion."));
        }
        exit();

    } else {
        $liste = implode(", ", $erreurs);
        header("Location: index.php?view=reserver-salle&err=" . urlencode("Données manquantes : " . $liste));
        exit();
    }
}

header("Location: index.php?view=accueil");
?>