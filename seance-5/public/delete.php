<?php
require_once __DIR__ . '/../src/database.php';
require_once __DIR__ . '/../src/functions.php';

$taskId = $_GET['id'] ?? $_POST["id"];

if ($taskId === null) {
    header('Location: ./index.php');
    exit;
}

$task = getTaskById($pdo, $taskId);

if ($task === null) {
    header('Location: ./index.php');
    exit;
}

// Définition des valeurs par défaut de l'animal de compagnie
$taskId = $_POST["id"] ?? $task['id'];

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $success = deleteTask($pdo, $taskId);

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
    <link rel="stylesheet" href="https://unpkg.com/@digicreon/mucss/dist/mu.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Supprimer la tâche | Liste de tâches</title>
    <meta name="description" content="Supprimer une tâche pour Ludovic.">
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
                <li><a href="./view.php?id=<?= htmlspecialchars($task['id']) ?>"><?= htmlspecialchars($task['name']) ?></a></li>
                <li>Supprimer la tâche</li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Supprimer la tâche ?</h1>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errors)) { ?>
            <p style="color: red;"><?= $errors ?></p>
        <?php } ?>

        <p>Souhaitez-vous vraiment supprimer la tâche <strong><?= htmlspecialchars($task['name']) ?></strong> ? Cette action est irréversible.</p>

        <form action="./delete.php?id=<?= htmlspecialchars($task['id']) ?>" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($taskId) ?>" />

            <button class="btn btn-error" type="submit">Supprimer la tâche</button>
            <a class="btn btn-secondary full-width" href="./view.php?id=<?= htmlspecialchars($task['id']) ?>">
                Revenir à la page de visualisation
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
