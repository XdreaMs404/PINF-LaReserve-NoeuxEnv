<?php
// public/admin/403.php
require_once __DIR__ . '/../../config/bootstrap.php';
http_response_code(403);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accès Interdit - 403</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #d9534f;
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>403 - Accès Interdit</h1>
    <p>Vous n'avez pas les droits suffisants pour accéder à cette page.</p>
    <p><a href="/noeux/index.php?view=accueil">Retour à l'accueil</a> | <a href="/logout.php">Se déconnecter</a></p>
</body>

</html>