<?php
$pets = [
    [
        'id' => 1,
        'name' => 'Rex',
        'species' => 'Chien',
        'gender' => 'Mâle',
        'birthday' => '2019-01-18'
    ],
    [
        'id' => 2,
        'name' => 'Caramel',
        'species' => 'Chat',
        'gender' => 'Femelle',
        'birthday' => '2020-04-28'
    ],
    [
        'id' => 3,
        'name' => 'Tweety',
        'species' => 'Oiseau',
        'gender' => 'Femelle',
        'birthday' => '2023-07-15'
    ],
    [
        'id' => 4,
        'name' => 'Nemo',
        'species' => 'Poisson',
        'gender' => 'Mâle',
        'birthday' => '2025-12-05'
    ],
    [
        'id' => 5,
        'name' => 'Godzilla',
        'species' => 'Lézard',
        'gender' => 'Mâle',
        'birthday' => '2018-11-30'
    ]
];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Page d'accueil | ninetendogs</title>
    <meta name="description" content="ninetendogs - Gestionnaire d'animaux de compagnie">
</head>

<body class="container">
    <header>
        <nav>
            <ul>
                <li><strong>ninetendogs</strong></li>
            </ul>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <center>
            <div class="logo">
                <img src="./images/logo.svg" alt="ninetendogs logo">
            </div>

            <h1>ninetendogs</h1>
        </center>

        <p>Bienvenue sur ninetendogs, le gestionnaire d'animaux de compagnie !</p>

        <p>Cette application te permet de gérer facilement tes animaux de compagnie.</p>

        <h2>Liste des animaux de compagnie</h2>

        <div class="overflow-auto">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Espèce</th>
                        <th>Sexe</th>
                        <th>Date de naissance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pets as $pet) { ?>
                        <tr>
                            <td><?= $pet['name'] ?></td>
                            <td><?= $pet['species'] ?></td>
                            <td><?= $pet['gender'] ?></td>
                            <td><?= $pet['birthday'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
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
