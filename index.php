<?php
const PAGE_TITLE = "Page d'accueil du cours Programmation serveur 1 (ProgServ1)";
const PAGE_DESCRIPTION = "La page d'accueil du cours de Programmation serveur 1 (ProgServ1) !";
const WELCOME_MESSAGE = "Bienvenue sur la page d'accueil du cours de Programmation serveur 1 (ProgServ1) !";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title><?php echo PAGE_TITLE; ?></title>
    <meta name="description" content="<?php echo PAGE_DESCRIPTION; ?>">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1><?php echo PAGE_TITLE; ?></h1>

    <p><?php echo WELCOME_MESSAGE; ?></p>

    <ul>
        <li>Accéder aux <a href="./exercices/index.php">exercices</a>.</li>
        <li>Accéder au <a href="./mini-projet/public/index.php">mini-projet</a>.</li>
        <li>Accéder à la page de <a href="./phpinfo.php">configuration de PHP</a>.</li>
        <li>Tester la gestion des exceptions avec le fichier <a href="./exception.php">exception.php</a>.</li>
    </ul>
</body>

</html>
