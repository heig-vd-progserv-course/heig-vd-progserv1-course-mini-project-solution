<?php
require_once __DIR__ . '/../src/constants.php';
require_once __DIR__ . '/../src/functions.php';

$taskId = $_GET['id'] ?? null;

if ($taskId === null) {
    header('Location: ./index.php');
    exit;
}

$task = getTaskById($taskId);

if ($task === null) {
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
    <link rel="stylesheet" href="https://unpkg.com/@digicreon/mucss/dist/mu.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Visualiser la tâche | Liste de tâches</title>
    <meta name="description" content="Visualiser une tâche pour Ludovic.">
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
                <li><?= htmlspecialchars($task['name']) ?></li>
            </ul>
        </nav>
    </header>
    <main>

        <article>
            <h1><?= htmlspecialchars($task['name']) ?></h1>

            <p>
                <span class="badge badge-contrast"><?= TASK_KINDS[htmlspecialchars($task['kind'])] ?></span>
                <span class="badge badge-primary"><?= htmlspecialchars(TASK_PRIORITIES[$task['priority']]) ?></span>
                <?php if (!empty($task['deadline'])) { ?>
                    <span class="badge badge-secondary"><?= htmlspecialchars($task['deadline']) ?></span>
                <?php } ?>
            </p>


            <?php if (!empty($task['description'])) { ?>
                <p><?= htmlspecialchars($task['description']) ?></p>
            <?php } ?>

            <footer>
                <a class="btn btn-primary btn-sm" href="./edit.php?id=<?= htmlspecialchars($task['id']) ?>">
                    Modifier la tâche
                </a>
                <a class="btn btn-error btn-sm" href="./delete.php?id=<?= htmlspecialchars($task['id']) ?>">
                    Supprimer la tâche
                </a>
            </footer>
        </article>
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
