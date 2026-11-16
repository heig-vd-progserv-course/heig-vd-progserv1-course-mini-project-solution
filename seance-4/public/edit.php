<?php
require_once __DIR__ . '/../src/functions.php';

$taskId = $_GET['id'] ?? $_POST['id'] ?? null;

if ($taskId === null) {
    header('Location: ./index.php');
    exit;
}

$task = getTaskById($taskId);

if ($task === null) {
    header('Location: ./index.php');
    exit;
}

$name = $task['name'];
$kind = $task['kind'];
$priority = $task['priority'];
$description = $task['description'] ?? '';
$deadline = $task['deadline'] ?? '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $kind = $_POST["kind"] ?? '';
    $description = $_POST["description"] ?? '';
    $deadline = $_POST["deadline"] ?? '';
    $priority = $_POST["priority"] ?? '';

    $errors = validateTask(
        $name,
        $kind,
        $priority,
        $description,
        $deadline,
    );

    if (empty($errors)) {
        $success = updateTask(
            $taskId,
            $name,
            $kind,
            $priority,
            $description,
            $deadline,
        );

        if ($success) {
            header('Location: ./view.php?id=' . $taskId);
            exit;
        }

        $errors[] = "Une erreur est survenue lors de la mise à jour de la tâche.";
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

    <title>Éditer la tâche | Liste de tâches</title>
    <meta name="description" content="Modifier une tâche pour Ludovic.">
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
                <li><a href="./view.php?id=<?= htmlspecialchars($taskId) ?>"><?= htmlspecialchars($task['name']) ?></a></li>
                <li>Modifier la tâche</li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Modifier la tâche</h1>

        <?php if (!empty($errors)) { ?>
            <p style="color: red;">Le formulaire contient des erreurs :</p>
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <form action="./edit.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($taskId) ?>" />

            <label>Nom
                <input
                    type="text"
                    name="name"
                    value="<?= htmlspecialchars($name) ?>"
                    minlength="2"
                    maxlength="50"
                    required />
            </label>

            <label>Type
                <select name="kind" required>
                    <option value="personal" <?= $kind === "personal" ? "selected" : "" ?>>Personnel</option>
                    <option value="work" <?= $kind === "work" ? "selected" : "" ?>>Travail</option>
                    <option value="other" <?= $kind === "other" ? "selected" : "" ?>>Autre</option>
                </select>
            </label>

            <label>Priorité
                <select name="priority" required>
                    <option value="low" <?= $priority === "low" ? "selected" : "" ?>><?= TASK_PRIORITIES['low'] ?></option>
                    <option value="medium" <?= $priority === "medium" ? "selected" : "" ?>><?= TASK_PRIORITIES['medium'] ?></option>
                    <option value="high" <?= $priority === "high" ? "selected" : "" ?>><?= TASK_PRIORITIES['high'] ?></option>
                </select>
            </label>

            <label>Description (optionnelle)
                <textarea
                    name="description"
                    minlength="10"
                    maxlength="500"><?= htmlspecialchars($description) ?></textarea>
            </label>

            <label>Date limite (optionnelle)
                <input
                    type="date"
                    name="deadline"
                    min="<?= date('Y-m-d') ?>"
                    value="<?= htmlspecialchars($deadline) ?>" />
            </label>

            <button class="btn btn-primary" type="submit">Mettre à jour la tâche</button>
            <a class="btn btn-secondary full-width" href="./view.php?id=<?= htmlspecialchars($taskId) ?>" role="button">Revenir à la page de visualisation</a>
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
