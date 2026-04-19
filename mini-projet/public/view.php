<?php
require_once __DIR__ . '/../src/functions.php';

$petId = $_GET['id'];

$pet = getPetById($petId);

if ($pet === null) {
    header('Location: ./index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Page de visualisation | ninetendogs</title>
    <meta name="description" content="ninetendogs - Gestionnaire d'animaux de compagnie - Visualisation d'un animal de compagnie">
</head>

<body class="container">
    <header>
        <nav>
            <ul>
                <li><strong>ninetendogs</strong></li>
            </ul>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
            </ul>
        </nav>

        <nav aria-label="breadcrumb">
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><?= $pet['name'] ?></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1><?= $pet['name'] ?></h1>

        <ul>
            <li><strong>Espèce</strong> : <?= $pet['species'] ?></li>
            <li><strong>Sexe</strong> : <?= $pet['gender'] ?></li>
            <li><strong>Date de naissance</strong> : <?= $pet['birthday'] ?></li>
        </ul>
    </main>
    <footer>
        <center>
            <small>
                Un projet réalisé dans le cadre du cours <a href="https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course">ProgServ1</a> enseigné à la <a href="https://heig-vd.ch">HEIG-VD</a>.
            </small>
        </center>
    </footer>
</body>

</html>
