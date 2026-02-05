<?php

/*
Partie modèle : on effectue ici tous les traitements sur la base de données (lecture, insertion, suppression, mise à jour).

Des fonctions sont déjà présentes : vous avez le droit de les modifier ou d'en ajouter à votre guise. Des indications sont données en commentaires.
*/

include_once("maLibSQL.pdo.php");
include_once "maLibUtils.php";

//*** Il est recommandé de ne pas modifier les fonctions suivantes, utilisées pour l'identification ***

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT id FROM users WHERE pseudo='$login' AND pass='$passe';";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function isAdmin($idUser)
{
	// Vérifie si l'utilisateur est un administrateur
	$SQL ="SELECT id FROM users WHERE id='$idUser' AND role='admin';";
	return SQLGetChamp($SQL); 
}


//*** Fin des fonctions fournies avec le sujet ***

// TODO : D'autres fonctions peuvent être ajoutées à la suite



function utilisateurExiste($login) {
	$login = esc($login);
	$sql = "SELECT id FROM users WHERE pseudo = '$login'";
	return SQLGetChamp($sql) !== false;
}

function creerUtilisateur($login, $passe) {
	$login = esc($login);
	$passe = esc($passe); 
	$sql = "INSERT INTO users(pseudo, pass, Points, Admin) VALUES ('$login', '$passe', 250, 0)";
	return SQLInsert($sql);
}

function getRestaurantsDuMoment() {
    $sql = "
        SELECT r.ID, r.nom, r.adresse, r.site_web, r.image, r.prix, r.telephone,
               COUNT(a.ID_avis) AS nb_avis,
               AVG(a.Note) AS moyenneAvis
        FROM restaurants r
        LEFT JOIN avis a ON r.ID = a.ID_restaurant
        WHERE a.Date_avis >= NOW() - INTERVAL 3 WEEK
        GROUP BY r.ID, r.nom, r.adresse, r.site_web, r.image, r.prix, r.telephone
        ORDER BY nb_avis DESC
        LIMIT 3
    ";
    return SQLSelect($sql);
}

function coin($login) {
	$SQL="SELECT Points FROM users WHERE pseudo='$login';";

	return SQLGetChamp($SQL);


}

function getAllRestaurants($tri = "note_desc") {
	switch ($tri) {
		case "nom_asc":
			$order = "r.nom ASC";
			break;
		case "nom_desc":
			$order = "r.nom DESC";
			break;
		case "note_asc":
			$order = "moyenneAvis ASC";
			break;
		case "note_desc":
		default:
			$order = "moyenneAvis DESC";
			break;
	}

$SQL = "
	SELECT r.*, 
	       IFNULL((SELECT AVG(a.note) FROM avis a WHERE a.id_restaurant = r.id), 0) AS moyenneAvis
	FROM restaurants r
	ORDER BY $order
";


	return SQLSelect($SQL);
}

function getRestaurantById($id) {
    $SQL = "
        SELECT nom, adresse, telephone, site_web, horaires, image
        FROM restaurants 
        WHERE id = $id
    ";

    $res = SQLSelect($SQL);
    $data = parcoursRs($res);

    if (!isset($data[0])) return false;

    // Calcul de la moyenne des avis
    $SQL_moyenne = "
        SELECT AVG(Note) as moyenne
        FROM avis
        WHERE ID_restaurant = $id
    ";

    $moyenne = SQLGetChamp($SQL_moyenne); // retourne la valeur seule

    // Ajoute la moyenne au tableau du restaurant
    $data[0]['moyenneAvis'] = $moyenne !== false ? round($moyenne, 1) : null;

    return $data[0];
}



function getAvisByRestaurantId($idRestaurant) {
    $SQL = "
        SELECT 
            users.pseudo, 
            users.Points,
            avis.Note, 
            avis.Commentaire, 
            avis.Date_avis, 
            avis.image
        FROM avis 
        JOIN users ON avis.ID_utilisateur = users.id
        WHERE avis.ID_restaurant = $idRestaurant
        ORDER BY avis.Date_avis DESC
    ";

    $res = SQLSelect($SQL);

    // Ajout du grade selon le nombre de Coins-Coins
    $resArray = parcoursRs($res);

foreach ($resArray as &$a) {
    $pts = intval($a['Points']);
    if ($pts >= 2000) $a['grade'] = "Duck de Diamant";
    elseif ($pts >= 1250) $a['grade'] = "Duck d'Or";
    elseif ($pts >= 1000) $a['grade'] = "Duck d'Argent";
    elseif ($pts >= 750) $a['grade'] = "Duck de Bronze";
    elseif ($pts >= 500) $a['grade'] = "Duck de Pierre";
    elseif ($pts >= 250) $a['grade'] = "Duck de Bois";
    else $a['grade'] = "Aucun grade";
}

return $resArray;
}
function ajouterAvis($idUser, $idRestaurant, $note, $commentaire, $image = null) {
    $commentaire = addslashes($commentaire);
    $imageSQL = $image ? "'$image'" : "NULL";

    // Insertion de l'avis
    $SQL = "
        INSERT INTO avis (ID_utilisateur, ID_restaurant, Note, Commentaire, Date_avis, image)
        VALUES ($idUser, $idRestaurant, $note, '$commentaire', NOW(), $imageSQL)
    ";
    $result = SQLInsert($SQL);

    // Ajout de 40 points à l'utilisateur
    if ($result !== false) {
        $SQLupdate = "
            UPDATE users
            SET Points = Points + 40
            WHERE id = $idUser
        ";
        SQLUpdate($SQLupdate);
    }

    return $result;
}




?>
