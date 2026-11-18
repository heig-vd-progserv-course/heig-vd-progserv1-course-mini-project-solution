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
                <li>Exemple de tâche 1</li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <h1>Exemple de tâche 1</h1>

            <p>
                <span class="badge badge-contrast">Personnel</span>
                <span class="badge badge-primary">Haute</span>
                <span class="badge badge-secondary">2027-01-24</span>
            </p>

            Description de la tâche 1.

            <footer>
                <a class="btn btn-primary btn-sm" href="./edit.php">
                    Modifier la tâche
                </a>
                <a class="btn btn-error btn-sm" href="./delete.php">
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
