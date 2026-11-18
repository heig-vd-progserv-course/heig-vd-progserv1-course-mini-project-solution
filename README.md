# HEIG-VD ProgServ1 Course PHP Template

Ce modèle de projet est conçu pour les étudiant·es du cours
[Programmation serveur 1 (ProgServ1)](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course)
à la [HEIG-VD](https://heig-vd.ch).

Il fournit une structure de base pour les projets PHP avec les éléments suivants
:

- Un [conteneur de développement](https://containers.dev/) basé sur une
  [distribution Linux](https://www.debian.org/) avec
  [PHP 8.5](https://www.php.net/) afin de faciliter le développement et
  l'exécution du projet dans un environnement cohérent.
- Des configurations recommandées pour l'éditeur de code
  [Visual Studio Code](https://code.visualstudio.com/), y compris des extensions
  utiles pour le développement PHP et la gestion de bases de données :
  - [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client).
  - [Prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode).
  - [SQLite Viewer](https://marketplace.visualstudio.com/items?itemName=qwtel.sqlite-viewer).
  - [Database Client](https://marketplace.visualstudio.com/items?itemName=cweijan.vscode-database-client2).
- Un serveur [Apache](https://httpd.apache.org/) avec
  [PHP 8.5](https://www.php.net/) et les extensions nécessaires pour se
  connecter à une base de données [SQLite](https://www.sqlite.org/), décrit dans
  un fichier [Docker Compose](https://docs.docker.com/compose/)
  (`compose.yaml`).

N'hésitez pas à personnaliser ce modèle et ce document pour ajouter des
instructions spécifiques à votre projet ou des détails supplémentaires sur la
configuration et l'utilisation du projet.

## Prérequis

Afin de pouvoir ouvrir et exécuter ce projet, vous devez avoir les éléments
suivants installés sur votre machine :

- [Docker](https://www.docker.com/) et
  [Docker Compose](https://docs.docker.com/compose/) installés sur votre
  machine.
- [Visual Studio Code](https://code.visualstudio.com/) avec l'extension
  [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)
  installée.

## Structure du projet

- `.devcontainer/`: Contient la configuration pour le développement dans un
  conteneur Docker.
- `.vscode/`: Contient les paramètres recommandés pour Visual Studio Code.
- `.gitignore`: Fichier de configuration pour Git, spécifiant les fichiers et
  dossiers à ignorer.
- `compose.yaml`: Permet de démarrer le serveur Apache avec PHP et SQLite dans
  un conteneur Docker.
- `README.md`: Ce fichier de documentation.

## Ouvrir le projet localement

1. Clonez ce dépôt sur votre machine locale.
2. Ouvrez ce dossier dans Visual Studio Code.

## Ouvrir le projet dans un conteneur de développement

Si vous avez l'extension
[Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)
installée, Visual Studio Code vous proposera d'ouvrir le projet dans un
conteneur de développement lorsque vous ouvrez le projet selon plusieurs options
:

- Vous pouvez utiliser la bulle de notification qui apparaît en bas à droite de
  l'éditeur pour accepter l'ouverture du projet dans un conteneur de
  développement.
- Vous pouvez également cliquer sur l'icône `><` en bas à gauche de l'éditeur et
  sélectionner _"Reopen in Container"_ dans le menu qui s'affiche.
- Vous pouvez également ouvrir la palette de commandes
  (<kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>P</kbd> sur Windows/Linux ou
  <kbd>Cmd</kbd>+<kbd>Shift</kbd>+<kbd>P</kbd> sur macOS) et rechercher la
  commande _"Dev Containers: Reopen in Container"_.

Acceptez cette proposition pour bénéficier d'un environnement de développement
préconfiguré. Lors de la première ouverture du projet dans un conteneur de
développement, Visual Studio Code téléchargera l'image Docker nécessaire et
installera les dépendances. Cela peut prendre quelques minutes selon la vitesse
de votre connexion Internet et les performances de votre machine.

## Lancer le serveur Apache

Une fois dans le conteneur de développement, ouvrez un terminal intégré et
exécutez la commande suivante pour lancer le serveur de développement de PHP :

```bash
# Démarre le serveur Apache
docker compose up
```

Un serveur Apache avec PHP et SQLite sera démarré, vous permettant d'exécuter et
de tester votre application PHP dans un environnement local.

Le serveur Apache sera accessible à l'adresse <http://localhost:8080> dans votre
navigateur. Par défaut, le serveur liste tous les fichiers de votre projet. Vous
pouvez accéder à vos fichiers PHP en naviguant vers l'URL correspondante.

## Arrêter le serveur Apache

Pour arrêter le serveur de développement, vous pouvez utiliser le raccourci
clavier <kbd>Ctrl</kbd>+<kbd>C</kbd> dans le terminal intégré, ou exécuter la
commande suivante dans le terminal intégré :

```bash
# Arrête le serveur Apache
docker compose down
```
