<?php
$tasks = [
    [
        'id' => 1,
        'name' => 'Exemple de tâche 1',
        'kind' => 'personal',
        'priority' => 'high',
        'deadline' => '2023-10-15',
        'description' => 'Description de la tâche 1.',
    ],
    [
        'id' => 2,
        'name' => 'Exemple de tâche 2',
        'kind' => 'other',
        'priority' => 'medium',
        'deadline' => '2023-11-01',
    ],
    [
        'id' => 3,
        'name' => 'Exemple de tâche 3',
        'kind' => 'personal',
        'priority' => 'high',
    ],
    [
        'id' => 4,
        'name' => 'Exemple de tâche 4',
        'kind' => 'work',
        'priority' => 'low',
    ],
];

const TASK_KINDS = [
    'personal' => 'Personnel',
    'work' => 'Travail',
    'other' => 'Autre',
];

const TASK_PRIORITIES = [
    'low' => 'Basse',
    'medium' => 'Moyenne',
    'high' => 'Haute',
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://unpkg.com/@digicreon/mucss/dist/mu.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Page d'accueil | Liste de tâches</title>
    <meta name="description" content="La liste de tâches.">
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
    </header>
    <main>
        <center>
            <div class="logo">
                <img src="./images/logo.svg" alt="logo">
            </div>

        </center>

        <h1>Liste de tâches de Ludovic</h1>

        <p>Cette application web permet de gérer une liste de tâches pour Ludovic. Vous pouvez créer, visualiser, modifier et supprimer des tâches.</p>

        <?php if (empty($tasks)) { ?>
            <p><em>Aucune tâche n'a été trouvée.</em></p>
        <?php } else { ?>
            <?php foreach ($tasks as $task) { ?>
                <article>
                    <h2><?= htmlspecialchars($task['name']) ?></h2>

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
                        <a class="btn btn-primary btn-sm" href="./view.php">
                            Visualiser la tâche
                        </a>
                    </footer>
                </article>
            <?php } ?>
        <?php } ?>
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
