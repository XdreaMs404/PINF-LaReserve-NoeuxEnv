<?php
session_start();

/*
Cette page génère les différentes vues de l'application en utilisant des templates situés dans le répertoire "templates". Un template ou 'gabarit' est un fichier php qui génère une partie de la structure XHTML d'une page. 

La vue à afficher dans la page index est définie par le paramètre "view" qui doit être placé dans la chaîne de requête. En fonction de la valeur de ce paramètre, on doit vérifier que l'on a suffisamment de données pour inclure le template nécessaire, puis on appelle le template à l'aide de la fonction include

Les formulaires de toutes les vues générées enverront leurs données vers la page data.php pour traitement. La page data.php redirigera alors vers la page index pour réafficher la vue pertinente, généralement la vue dans laquelle se trouvait le formulaire. 
*/


	include_once "libs/maLibUtils.php";
	include_once "libs/maLibBootstrap.php";
	include_once "libs/modele.php";
	include_once "libs/maLibForms.php";



	// on récupère le paramètre view éventuel 
	$view = valider("view"); 
	/* valider automatise le code suivant :
	if (isset($_GET["view"]) && $_GET["view"]!="")
	{
		$view = $_GET["view"]
	}*/

	// S'il est vide, on charge la vue accueil par défaut
	if (!$view) $view = "accueil"; 

	// NB : il faut que view soit défini avant d'appeler l'entête

	// Dans tous les cas, on affiche l'entete, 
	// qui contient les balises de structure de la page, le logo, etc. 
	// Le formulaire de recherche ainsi que le lien de connexion 
	// si l'utilisateur n'est pas connecté 

	include("templates/header.php");

	// En fonction de la vue à afficher, on appelle tel ou tel template
	switch($view)
	{		

		case "accueil" : 
			include("templates/accueil.php");
		break;


		default : // si le template correspondant à l'argument existe, on l'affiche
			if (file_exists("templates/$view.php")) {
                // VERIFICATION VISIBILITE PAGE
                try {
                    $db = class_exists('Database') ? Database::getConnection() : null;
                    if ($db) {
                        $stmtCheckPage = $db->prepare("SELECT statut FROM pages WHERE identifiant_url = :url AND site_id = 2 LIMIT 1");
                        $stmtCheckPage->execute(['url' => $view]);
                        $pageDb = $stmtCheckPage->fetch();
                        if ($pageDb && $pageDb['statut'] === 'brouillon') {
                            $isRedacteur = isset($_SESSION['role']) && in_array($_SESSION['role'], ['redacteur', 'admin']);
                            if (!$isRedacteur) {
                                header("Location: index.php?view=accueil");
                                exit;
                            }
                        }
                    }
                } catch(Exception $e) {}

				include("templates/$view.php");
			}

	}


	// ----- Ajout générique des blocs dynamiques du CMS -----
    try {
        $db = class_exists('Database') ? Database::getConnection() : null;
        if ($db) {
            $stmtPage = $db->prepare("SELECT id FROM pages WHERE identifiant_url = :url AND site_id = 2");
            $stmtPage->execute(['url' => $view]);
            if ($p = $stmtPage->fetch()) {
                // Fetch newly created blocks (which do NOT have a structural title)
                $stmtGenBlocs = $db->prepare("SELECT b.*, m.chemin_fichier, m.texte_alt FROM blocs_page b LEFT JOIN medias m ON b.media_publie_id = m.id WHERE b.page_id = :pid AND b.statut = 'publie' AND (b.titre_publie IS NULL OR b.titre_publie = '') ORDER BY b.ordre ASC");
                $stmtGenBlocs->execute(['pid' => $p['id']]);
                $genBlocs = $stmtGenBlocs->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($genBlocs) > 0) {
                    echo '<main class="container" style="padding-top: 0; margin-top: 2rem;">';
                    foreach($genBlocs as $gb) {
                        $styleCSS = "";
                        if (($gb['style'] ?? 'normal') === 'fond_colore') {
                            $styleCSS = "background-color: var(--background-color, #f1f8f5); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;";
                        } elseif (($gb['style'] ?? 'normal') === 'encadre') {
                            $styleCSS = "border: 1px solid #ddd; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 2rem;";
                        } else {
                            $styleCSS = "margin-bottom: 2rem;";
                        }
                        
                        echo "<section class='content-section' style='{$styleCSS}'>";
                        if ($gb['type'] === 'texte') {
                            echo $gb['contenu_texte_publie'];
                        } elseif ($gb['type'] === 'image' && !empty($gb['chemin_fichier'])) {
                            echo '<div style="text-align:center;"><img src="' . htmlspecialchars($gb['chemin_fichier']) . '" alt="' . htmlspecialchars($gb['texte_alt'] ?? '') . '" style="max-width:100%; height:auto; border-radius:8px;"></div>';
                        } elseif ($gb['type'] === 'lien' && !empty($gb['url_publie'])) {
                            echo '<div style="text-align:center;"><a href="' . htmlspecialchars($gb['url_publie']) . '" class="btn btn-primary" style="display:inline-block; margin-top:10px;">' . htmlspecialchars($gb['contenu_texte_publie']) . '</a></div>';
                        }
                        echo "</section>";
                    }
                    echo '</main>';
                }
            }
        }
    } catch(Exception $e) {}
    // --------------------------------------------------------

	// Dans tous les cas, on affiche le pied de page
	// Qui contient les coordonnées de la personne si elle est connectée
	
	include("templates/footer.php");


	
?>