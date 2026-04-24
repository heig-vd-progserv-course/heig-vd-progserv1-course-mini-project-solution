<?php
require_once __DIR__ . '/../src/functions.php';

// Définition des valeurs par défaut de l'animal de compagnie
$name = $_POST["name"] ?? null;
$species = $_POST["species"] ?? null;
$nickname = $_POST["nickname"] ?? null;

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation de l'animal de compagnie
    $errors = validatePet(
        $name,
        $species,
    );

    // S'il n'y a pas d'erreurs, affiche les données de l'animal de compagnie qui va être ajouté
    if (empty($errors)) {
        // Information de debug : affichage du contenu de la variable $_POST
        // À supprimer une fois que le formulaire fonctionne correctement
        echo "Succès ! L'animal de compagnie va être ajouté avec les données suivantes : ";

        print_r($_POST);
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

    <title>Page de création | ninetendogs</title>
    <meta name="description" content="ninetendogs - Gestionnaire d'animaux de compagnie - Création d'un animal de compagnie">
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
                <li>Nouvel animal</li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Créer un nouvel animal de compagnie</h1>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
            <?php if (!empty($errors)) { ?>
                <p style="color: red;">Le formulaire contient des erreurs :</p>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php } ?>

        <form action="./create.php" method="POST">
            <label for="name">Nom</label>
            <input
                type="text"
                id="name"
                name="name"
                value="<?= $name ?>"
                minlength="2"
                maxlength="50"
                required />

            <label for="species">Espèce</label>
            <select id="species" name="species" required>
                <option
                    value="dog"
                    <?= $species === "dog" ? "selected" : "" ?> />
                Chien
                </option>
                <option
                    value="cat"
                    <?= $species === "cat" ? "selected" : "" ?> />
                Chat
                </option>
                <option
                    value="lizard"
                    <?= $species === "lizard" ? "selected" : "" ?> />
                Lézard
                </option>
                <option
                    value="snake"
                    <?= $species === "snake" ? "selected" : "" ?> />
                Serpent
                </option>
                <option
                    value="bird"
                    <?= $species === "bird" ? "selected" : "" ?> />
                Oiseau
                </option>
                <option
                    value="rabbit"
                    <?= $species === "rabbit" ? "selected" : "" ?> />
                Lapin
                </option>
                <option
                    value="other"
                    <?= $species === "other" ? "selected" : "" ?> />
                Autre
                </option>
            </select>

            <label for="nickname">Surnom (optionnel)</label>
            <input
                type="text"
                id="nickname"
                name="nickname" />

            <button type="submit">Créer le nouvel animal</button>
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
