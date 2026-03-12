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

// Gestion de la validation (Statut 1)
if ($id_a_valider = valider("valider_id")) {
    $sql = "UPDATE reservations SET validation = 1 WHERE id = '$id_a_valider'";
    SQLUpdate($sql);
    header("Location: index.php?tab=" . valider("tab") . "&msg=Réservation confirmée");
    exit();
}

// Gestion du refus (Statut -1)
if ($id_a_refuser = valider("refuser_id")) {
    $sql = "UPDATE reservations SET validation = -1 WHERE id = '$id_a_refuser'";
    SQLUpdate($sql);
    header("Location: index.php?tab=" . valider("tab") . "&msg=Réservation refusée");
    exit();
}

// --- SUPPRESSION DÉFINITIVE (Sans restriction de rôle) ---
if ($id_a_supprimer = valider("supprimer_id")) {
    $id_s = intval($id_a_supprimer);
    $sql = "DELETE FROM reservations WHERE id = '$id_s'";
    SQLDelete($sql);
    
    // On redirige vers l'onglet où on était avec un message de succès
    header("Location: index.php?tab=" . valider("tab") . "&msg=Supprimé définitivement.");
    exit();
}

// Gestion de la remise "En attente" (Statut 0)
if ($id_a_rétablir = valider("retablir_id")) {
    $id_r = intval($id_a_rétablir);
    $sql = "UPDATE reservations SET validation = 0 WHERE id = '$id_r'";
    SQLUpdate($sql);
    header("Location: index.php?tab=" . valider("tab") . "&msg=Réservation remise en attente");
    exit();
}
// Gestion des onglets
$tab = valider("tab") ?: "en_cours"; // Par défaut on affiche 'en cours'

function listerReservationsParStatut($statut) {
    $val = 0; 
    if ($statut == "confirme") $val = 1;
    if ($statut == "refuse") $val = -1;

    $sql = "SELECT r.*, s.nom as nom_salle, c.debut, c.fin 
            FROM reservations r
            LEFT JOIN salles s ON r.salle_id = s.id
            LEFT JOIN creneaux c ON r.id_creneau = c.id
            WHERE r.validation = $val
            /* On trie par date voulue (plus récent en premier) 
               puis par heure de début du créneau */
            ORDER BY r.date_voulue, r.date_demande"; 
            
    return parcoursRs(SQLSelect($sql));

}

function listerSalles() {
    $sql = "SELECT id, nom FROM salles ORDER BY nom ASC";
    $res = parcoursRs(SQLSelect($sql));
    return $res ? $res : [];
}


if ($action = valider("action")) {

    if ($action == "creer_creneau") {
        $debut = valider("debut");
        $fin = valider("fin");

        if ($debut && $fin) {
            creerCreneau($debut, $fin);
            header("Location: index.php?tab=salles_creneaux&msg=Créneau créé");
            exit();
        }
    }

    if ($action == "associer_creneau_salle") {
    $salle_id = valider("salle_id");
    $id_creneau = valider("id_creneau");

    if ($salle_id && $id_creneau) {
        $ok = associerCreneauSalle($salle_id, $id_creneau);

        if ($ok) {
            header("Location: index.php?tab=salles_creneaux&msg=Créneau associé à la salle");
        } else {
            header("Location: index.php?tab=salles_creneaux&msg=Association déjà existante ou invalide");
        }
        exit();
    }
}
}
if ($action == "desassocier_creneau_salle") {
    $salle_id = valider("salle_id");
    $id_creneau = valider("id_creneau");

    if ($salle_id && $id_creneau) {
        desassocierCreneauSalle($salle_id, $id_creneau);
        header("Location: index.php?tab=salles_creneaux&msg=Créneau retiré de la salle");
        exit();
    }
}

if ($action == "supprimer_creneau") {
    $id_creneau = valider("id_creneau");

    if ($id_creneau) {
        supprimerCreneau($id_creneau);
        header("Location: index.php?tab=salles_creneaux&msg=Créneau supprimé");
        exit();
    }
}
if ($action == "creer_salle") {
    $nom = valider("nom_salle");
    $capacite = valider("capacite_salle");
    $equipements = valider("equipements_salle");
    $description = valider("description_salle");
    $imageId = uploaderImageSalle();

    if ($nom) {
        $ok = creerSalle($nom, $capacite, $equipements, $description, $imageId);

        if ($ok) {
            header("Location: index.php?tab=salles_creneaux&msg=Salle créée");
        } else {
            header("Location: index.php?tab=salles_creneaux&msg=Impossible de créer la salle");
        }
        exit();
    }
}

if ($action == "editer_salle") {
    $id = valider("salle_id");
    $nom = valider("nom_salle");
    $capacite = valider("capacite_salle");
    $equipements = valider("equipements_salle");
    $description = valider("description_salle");
    
    if ($id && $nom) {
        $imageId = uploaderImageSalle();
        $ok = editerSalle($id, $nom, $capacite, $equipements, $description, $imageId);

        if ($ok) {
            header("Location: index.php?tab=salles_creneaux&msg=Salle modifiée avec succès");
        } else {
            header("Location: index.php?tab=salles_creneaux&msg=Erreur lors de la modification");
        }
        exit();
    }
}

if ($action == "supprimer_salle") {
    $salle_id = valider("salle_id");

    if ($salle_id) {
        supprimerSalle($salle_id);
        header("Location: index.php?tab=salles_creneaux&msg=Salle supprimée");
        exit();
    }
}

function uploaderImageSalle() {
    if (isset($_FILES['image_salle']) && $_FILES['image_salle']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['image_salle']['tmp_name'];
        $name = basename($_FILES['image_salle']['name']);
        $mime = $_FILES['image_salle']['type'];
        
        $uploadDir = __DIR__ . '/../../../../public/uploads/salles/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        
        $uniqueName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9.\-_]/', '', $name);
        $dest = $uploadDir . $uniqueName;
        
        if (move_uploaded_file($tmpName, $dest)) {
            $chemin = 'uploads/salles/' . $uniqueName;
            $sql = "INSERT INTO medias (site_id, chemin_fichier, nom_original, type_mime) 
                    VALUES (2, '$chemin', '" . proteger($name) . "', '" . proteger($mime) . "')";
            return SQLInsert($sql);
        }
    }
    return null;
}

function creerSalle($nom, $capacite = null, $equipements = null, $description = null, $imageId = null) {
    $nom = trim($nom);
    $nom = proteger($nom);
    $capacite = intval($capacite);
    $equipements = proteger(trim($equipements ?? ""));
    $description = proteger(trim($description ?? ""));
    $imageIdSql = ($imageId) ? intval($imageId) : "NULL";

    if (!$nom) return false;

    $identifiant = strtolower($nom);
    $identifiant = str_replace(
        ['à','á','â','ä','ã','å','ç','è','é','ê','ë','ì','í','î','ï','ò','ó','ô','ö','õ','ù','ú','û','ü','ý','ÿ','ñ'],
        ['a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','u','u','u','u','y','y','n'],
        $identifiant
    );
    $identifiant = preg_replace('/[^a-z0-9]+/', '-', $identifiant);
    $identifiant = trim($identifiant, '-');

    if (!$identifiant) {
        $identifiant = "salle";
    }

    $baseIdentifiant = $identifiant;
    $i = 1;

    while (true) {
        $sqlVerif = "SELECT id FROM salles WHERE site_id = 2 AND identifiant_url = '$identifiant'";
        $existant = parcoursRs(SQLSelect($sqlVerif));

        if (empty($existant)) break;

        $identifiant = $baseIdentifiant . "-" . $i;
        $i++;
    }

    $capaciteSql = ($capacite > 0) ? $capacite : "NULL";
    $equipementsSql = ($equipements !== "") ? "'$equipements'" : "NULL";
    $descriptionSql = ($description !== "") ? "'$description'" : "NULL";

    $sql = "INSERT INTO salles (
                site_id,
                identifiant_url,
                nom,
                capacite,
                equipements,
                description,
                image_principale_id,
                statut
            ) VALUES (
                2,
                '$identifiant',
                '$nom',
                $capaciteSql,
                $equipementsSql,
                $descriptionSql,
                $imageIdSql,
                'publie'
            )";

    return SQLInsert($sql);
}

function editerSalle($id, $nom, $capacite = null, $equipements = null, $description = null, $imageId = null) {
    $id = intval($id);
    $nom = proteger(trim($nom));
    $capaciteSql = (intval($capacite) > 0) ? intval($capacite) : "NULL";
    $equipementsSql = ($equipements !== "") ? "'" . proteger(trim($equipements)) . "'" : "NULL";
    $descriptionSql = ($description !== "") ? "'" . proteger(trim($description)) . "'" : "NULL";

    if (!$id || !$nom) return false;

    $sql = "UPDATE salles SET 
                nom = '$nom',
                capacite = $capaciteSql,
                equipements = $equipementsSql,
                description = $descriptionSql";
                
    if ($imageId) {
        $sql .= ", image_principale_id = " . intval($imageId);
    }
    
    $sql .= " WHERE id = $id";
    
    SQLUpdate($sql);
    return true;
}

function listerCreneaux() {
    $sql = "SELECT id, moment, debut, fin, actif
            FROM creneaux
            WHERE actif = 1
            ORDER BY debut ASC";
    $res = parcoursRs(SQLSelect($sql));
    return $res ? $res : [];
}

function supprimerSalle($salle_id) {
    $salle_id = intval($salle_id);

    if ($salle_id <= 0) return false;

    $sql = "DELETE FROM salles WHERE id = $salle_id";
    return SQLDelete($sql);
}

function creerCreneau($debut, $fin) {
    $debut = proteger($debut);
    $fin = proteger($fin);

    if (!$debut || !$fin) return false;
    if ($debut >= $fin) return false;

    $moment = ($debut < "12:00") ? "matin" : "aprem";

    $sqlVerif = "SELECT id
                 FROM creneaux
                 WHERE debut = '$debut'
                 AND fin = '$fin'
                 AND actif = 1";
    $existant = parcoursRs(SQLSelect($sqlVerif));

    if (!empty($existant)) return false;

    $sql = "INSERT INTO creneaux (moment, debut, fin, actif)
            VALUES ('$moment', '$debut', '$fin', 1)";
    return SQLInsert($sql);
}

function associerCreneauSalle($salle_id, $id_creneau) {

    $salle_id = intval($salle_id);
    $id_creneau = intval($id_creneau);

    if (!$salle_id || !$id_creneau) return false;

    $sqlVerif = "SELECT id
                 FROM disponibilites_salles
                 WHERE salle_id = '$salle_id'
                 AND id_creneau = '$id_creneau'";
    $existant = parcoursRs(SQLSelect($sqlVerif));

    if (!empty($existant)) return false;

    $sql = "INSERT INTO disponibilites_salles (salle_id, id_creneau, date)
            VALUES ('$salle_id', '$id_creneau', '2000-01-01')";

    return SQLInsert($sql);
}

function listerSallesAvecCreneaux() {
    $sql = "SELECT s.id AS salle_id, s.nom AS nom_salle,
                   ds.date,
                   c.id AS creneau_id,
                   c.moment,
                   c.debut,
                   c.fin
            FROM salles s
            LEFT JOIN disponibilites_salles ds ON ds.salle_id = s.id
            LEFT JOIN creneaux c ON c.id = ds.id_creneau
            ORDER BY s.nom ASC, ds.date ASC, c.debut ASC";
    return parcoursRs(SQLSelect($sql));
}

function desassocierCreneauSalle($salle_id, $id_creneau) {
    $salle_id = intval($salle_id);
    $id_creneau = intval($id_creneau);

    if (!$salle_id || !$id_creneau) return false;

    $sql = "DELETE FROM disponibilites_salles
            WHERE salle_id = '$salle_id'
            AND id_creneau = '$id_creneau'";

    return SQLDelete($sql);
}

function supprimerCreneau($id_creneau) {
    $id_creneau = intval($id_creneau);

    if (!$id_creneau) return false;

    $sql1 = "DELETE FROM disponibilites_salles
             WHERE id_creneau = '$id_creneau'";
    SQLDelete($sql1);

    $sql2 = "DELETE FROM creneaux
             WHERE id = '$id_creneau'";
    return SQLDelete($sql2);
}




?>