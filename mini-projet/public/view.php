<?php
require_once __DIR__ . '/../src/constants.php';
require_once __DIR__ . '/../src/functions.php';

$petId = $_GET['id'] ?? null;

if ($petId === null) {
    header('Location: ./index.php');
    exit;
}

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
                <li><a href="./create.php">Nouvel animal</a></li>
            </ul>
        </nav>

        <nav aria-label="breadcrumb">
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><?= htmlspecialchars($pet['name']) ?></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1><?= htmlspecialchars($pet['name']) ?></h1>

        <ul>
            <li><strong>Espèce</strong> : <?= PET_SPECIES[htmlspecialchars($pet['species'])] ?></li>
            <li><strong>Sexe</strong> : <?= PET_SEXES[htmlspecialchars($pet['sex'])] ?></li>
            <li><strong>Date de naissance</strong> : <?= htmlspecialchars($pet['birthday']) ?></li>
            <?php if ($pet['nickname']) { ?>
                <li><strong>Surnom</strong> : <?= htmlspecialchars($pet['nickname']) ?></li>
            <?php } ?>
            <?php if ($pet['color']) { ?>
                <li><strong>Couleur</strong> :
                    <span class="color-chip" style="background-color: <?= htmlspecialchars($pet['color']) ?>;"></span>
                    <?= htmlspecialchars($pet['color']) ?>
                </li>
            <?php } ?>
            <?php if ($pet['personalities']) { ?>
                <li>
                    <strong>Personnalité</strong> :
                    <ul>
                        <?php foreach ($pet['personalities'] as $personality) { ?>
                            <li><?= PET_PERSONALITIES[htmlspecialchars($personality)] ?></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($pet['size']) { ?>
                <li><strong>Taille</strong> : <?= htmlspecialchars($pet['size']) ?> cm</li>
            <?php } ?>
            <?php if ($pet['weight']) { ?>
                <li><strong>Poids</strong> : <?= htmlspecialchars($pet['weight']) ?> kg</li>
            <?php } ?>
            <?php if ($pet['notes']) { ?>
                <li><strong>Notes</strong> : <?= nl2br(htmlspecialchars($pet['notes'])) ?></li>
            <?php } ?>
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
