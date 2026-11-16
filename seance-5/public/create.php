<?php
require_once __DIR__ . '/../src/database.php';
require_once __DIR__ . '/../src/functions.php';

// Définition des valeurs par défaut de la tâche
$name = $_POST["name"] ?? '';
$kind = $_POST["kind"] ?? '';
$priority = $_POST["priority"] ?? 'medium';
$description = $_POST["description"] ?? '';
$deadline = $_POST["deadline"] ?? '';

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation de la tâche
    $errors = validateTask(
        $name,
        $kind,
        $priority,
        $description,
        $deadline,
    );

    // S'il n'y a pas d'erreurs, ajoute la tâche à la base de données
    if (empty($errors)) {
        $newTaskId = addTask(
            $pdo,
            $name,
            $kind,
            $priority,
            $description,
            $deadline,
        );

        if ($newTaskId !== null) {
            header('Location: ./view.php?id=' . $newTaskId);
            exit;
        } else {
            $errors = array_push($errors, "Une erreur est survenue lors de l'ajout de la tâche.");
        }
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

            <button class="btn btn-primary" type="submit">Créer la nouvelle tâche</button>
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
