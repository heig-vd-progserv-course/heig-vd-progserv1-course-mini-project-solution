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

        <article>
            <h2>Exemple de tâche 1</h2>

            <p>
                <span class="badge badge-contrast">Personnel</span>
                <span class="badge badge-primary">Haute</span>
                <span class="badge badge-secondary">2027-01-24</span>
            </p>

            Description de la tâche 1.

            <footer>
                <a class="btn btn-primary btn-sm" href="./view.php?id=1">
                    Visualiser la tâche
                </a>
            </footer>
        </article>

        <article>
            <h2>Exemple de tâche 2</h2>

            <p>
                <span class="badge badge-contrast">Autre</span>
                <span class="badge badge-primary">Moyenne</span>
                <span class="badge badge-secondary">2027-04-01</span>
            </p>

            <footer>
                <a class="btn btn-primary btn-sm" href="./view.php?id=2">
                    Visualiser la tâche
                </a>
            </footer>
        </article>

        <article>
            <h2>Exemple de tâche 3</h2>

            <p>
                <span class="badge badge-contrast">Personnel</span>
                <span class="badge badge-primary">Haute</span>
                <span class="badge badge-secondary">2027-10-10</span>
            </p>

            <p>Description de la tâche 3.</p>

            <footer>
                <a class="btn btn-primary btn-sm" href="./view.php?id=3">
                    Visualiser la tâche
                </a>
            </footer>
        </article>

        <article>
            <h2>Exemple de tâche 4</h2>

            <p>
                <span class="badge badge-contrast">Travail</span>
                <span class="badge badge-primary">Basse</span>
            </p>

            Description de la tâche 4.

            <footer>
                <a class="btn btn-primary btn-sm" href="./view.php?id=4">
                    Visualiser la tâche
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
