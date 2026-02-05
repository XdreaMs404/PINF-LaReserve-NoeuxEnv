<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location: ../noeux/index.php");
    die("");
}
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Landing - PINF</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #f0f0f0;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 2rem;
        }

        .btn {
            display: block;
            margin: 1rem;
            padding: 1rem 2rem;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #0056b3;
        }

        .btn-admin {
            background: #28a745;
        }

        .btn-admin:hover {
            background: #218838;
        }

        small {
            color: #666;
        }
    </style>
    <script src="/shared/config.js"></script>
</head>

<body>
    <div class="container">
        <h1>Choix du site (Dev Local)</h1>
        <a href="noeux/index.php?view=accueil" class="btn">Accueil</a>
        <a href="reserve/index.php?view=accueil" class="btn">Aller sur La Réserve</a>
        <hr>
        <a href="login.php" class="btn btn-admin">Connexion
            Backoffice</a>
        <small>URL Admin :
            <script>document.write(window.ADMIN_URL)</script>
        </small>
    </div>
</body>

</html>