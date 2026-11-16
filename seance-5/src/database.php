<?php
// Chemin vers le fichier de base de données SQLite
const DATABASE_FILE = __DIR__ . '/../tasks.db';

// Création d'une instance de PDO pour se connecter à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// On définit la requête SQL pour créer la table `tasks` si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    kind TEXT NOT NULL DEFAULT 'personal' CHECK (kind IN ('personal', 'work', 'other')),
    name TEXT NOT NULL,
    description TEXT,
    deadline DATE,
    priority TEXT NOT NULL DEFAULT 'medium' CHECK (priority IN ('low', 'medium', 'high'))
);";

// On prépare la requête SQL
$stmt = $pdo->prepare($sql);

// On exécute la requête SQL
$stmt->execute();
