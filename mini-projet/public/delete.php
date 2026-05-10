<?php
require_once __DIR__ . '/../src/functions.php';

$petId = $_GET['id'] ?? $_POST["id"];

if ($petId === null) {
    header('Location: ./index.php');
    exit;
}

$pet = getPetById($petId);

if ($pet === null) {
    header('Location: ./index.php');
    exit;
}

// Définition des valeurs par défaut de l'animal de compagnie
$petId = $_POST["id"] ?? $pet['id'];

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $success = deletePet($petId);

    if ($success) {
        header('Location: ./index.php');
        exit;
    } else {
        $errors = "Une erreur est survenue lors de la suppression de l'animal de compagnie.";
    }
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

    <title>Page de suppression | ninetendogs</title>
    <meta name="description" content="ninetendogs - Gestionnaire d'animaux de compagnie - Suppression d'un animal de compagnie">
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
                <li><a href="./view.php?id=<?= htmlspecialchars($pet['id']) ?>"><?= htmlspecialchars($pet['name']) ?></a></li>
                <li>Suppression de l'animal</li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Supprimer <?= htmlspecialchars($pet['name']) ?> ?</h1>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errors)) { ?>
            <p style="color: red;"><?= $errors ?></p>
        <?php } ?>

        <p>Souhaites-tu vraiment supprimer l'animal de compagnie <strong><?= htmlspecialchars($pet['name']) ?></strong> ? Cette action est irréversible.</p>

        <form action="./delete.php?id=<?= htmlspecialchars($pet['id']) ?>" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($petId) ?>" />

            <button type="submit" class="contrast">Supprimer l'animal</button>
            <a href="./view.php?id=<?= htmlspecialchars($pet['id']) ?>">
                <button class="button-full-width secondary">Revenir à la page de visualisation</button>
            </a>
        </form>
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
