<?php
require_once __DIR__ . '/../src/functions.php';

$name = '';
$kind = '';
$priority = '';
$description = '';
$deadline = '';

$errors = validateTask(
    $name,
    $kind,
    $priority,
    $description,
    $deadline,
);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://unpkg.com/@digicreon/mucss/dist/mu.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Créer une nouvelle tâche | Liste de tâches</title>
    <meta name="description" content="Créer une nouvelle tâche pour Ludovic.">
</head>

<body class="container">
    <header>
        <nav>
            <ul>
                <li><strong>Liste de tâches</strong></li>
            </ul>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./create.php">Nouvelle tâche</a></li>
            </ul>
        </nav>
        <nav aria-label="breadcrumb">
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li>Nouvelle tâche</li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Créer une nouvelle tâche</h1>

        <?php if (!empty($errors)) { ?>
            <p style="color: red;">Le formulaire contient des erreurs :</p>
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= $error ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p style="color: green;">La tâche a été créée avec succès.</p>
        <?php } ?>

        <p><em>Contenu à venir...</em></p>
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
