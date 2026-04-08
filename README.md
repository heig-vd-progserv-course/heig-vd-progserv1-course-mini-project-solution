# HEIG-VD ProgServ1 Course PHP Template

Ce modèle de projet est conçu pour les étudiant.es du cours _"Programmation
serveur 1 (ProgServ1)"_ à la HEIG-VD. Il fournit une structure de base pour les
projets PHP, avec des configurations recommandées pour l'éditeur de code Visual
Studio Code.

## Structure du projet

- `.devcontainer/`: Contient la configuration pour le développement dans un
  conteneur Docker.
- `.vscode/`: Contient les paramètres recommandés pour Visual Studio Code.
- `.gitignore`: Fichier de configuration pour Git, spécifiant les fichiers et
  dossiers à ignorer.
- `README.md`: Ce fichier de documentation.

## Ouvrir le projet localement

1. Clonez ce dépôt sur votre machine locale.
2. Ouvrez ce dossier dans Visual Studio Code.

## Ouvrir le projet dans un conteneur de développement

Si vous avez l'extension
[Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)
installée, Visual Studio Code vous proposera d'ouvrir le projet dans un
conteneur Docker.

Acceptez cette proposition pour bénéficier d'un environnement de développement
préconfiguré.

Si aucune notification n'apparaît, vous pouvez ouvrir manuellement le conteneur
en utilisant la commande _"Dev Containers: Reopen in Container"_ dans la palette
de commandes (<kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>P</kbd>).

## Lancer le serveur de développement de PHP

Une fois dans le conteneur de développement, ouvrez un terminal intégré et
exécutez la commande suivante pour lancer le serveur de développement de PHP :

```bash
php -S 0.0.0.0:8080
```

Le serveur sera accessible à l'adresse <http://localhost:8080> dans votre
navigateur.
