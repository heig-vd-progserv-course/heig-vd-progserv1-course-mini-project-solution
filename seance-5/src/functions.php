<?php
require_once __DIR__ . '/constants.php';

function getTasks(PDO $pdo): array {
    $sql = "SELECT * FROM tasks ORDER BY name ASC";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $tasks = $stmt->fetchAll();

    return $tasks;
}

function getTaskById(PDO $pdo, int $id): ?array {
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");

    $stmt->bindValue(':id', $id);

    $stmt->execute();

    $task = $stmt->fetch();

    if ($task) {
        return $task;
    }

    return null;
}

function validateTask(
    ?string $name,
    ?string $kind,
    ?string $priority,
    ?string $description,
    ?string $deadline,
): array {
    // Par défaut, il n'y a pas d'erreurs
    $errors = [];

    // Validation des données
    if (empty($name)) {
        array_push($errors, "Le nom est obligatoire.");
    } else if (strlen($name) < 2) {
        array_push($errors, "Le nom doit contenir au minimum 2 caractères.");
    } else if (strlen($name) > 50) {
        array_push($errors, "Le nom doit contenir au maximum 50 caractères.");
    }

    if (empty($kind)) {
        array_push($errors, "Le type est obligatoire.");
    } else if (!in_array($kind, ["personal", "work", "other"])) {
        array_push($errors, "Le type n'est pas valide.");
    }

    if (empty($priority)) {
        array_push($errors, "La priorité est obligatoire.");
    } else if (!array_key_exists($priority, TASK_PRIORITIES)) {
        array_push($errors, "La priorité n'est pas valide.");
    }

    if (!empty($description)) {
        if (strlen($description) < 10) {
            array_push($errors, "La description doit contenir au minimum 10 caractères.");
        } else if (strlen($description) > 500) {
            array_push($errors, "La description doit contenir au maximum 500 caractères.");
        }
    }

    if ($deadline !== null && $deadline !== '') {
        $deadlineDate = DateTimeImmutable::createFromFormat('!Y-m-d', $deadline);

        if ($deadlineDate === false || $deadlineDate->format('Y-m-d') !== $deadline) {
            array_push($errors, "La date limite n'est pas valide.");
        } else if ($deadlineDate < new DateTimeImmutable('today')) {
            array_push($errors, "La date limite ne peut pas être dans le passé.");
        }
    }

    return $errors;
}

function addTask(
    PDO $pdo,
    string $name,
    string $kind,
    string $priority,
    ?string $description,
    ?string $deadline,
): ?int {
    $sql = "INSERT INTO tasks (
        name,
        kind,
        priority,
        description,
        deadline
    ) VALUES (
        :name,
        :kind,
        :priority,
        :description,
        :deadline
    )";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':kind', $kind);
    $stmt->bindValue(':priority', $priority);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':deadline', $deadline);

    $stmt->execute();

    return $pdo->lastInsertId();
}

function deleteTask(PDO $pdo, int $id): bool {
    $sql = "DELETE FROM tasks WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $id);

    $stmt->execute();

    $success = $stmt->rowCount() === 1;

    return $success;
}

function updateTask(
    PDO $pdo,
    int $id,
    string $name,
    string $kind,
    string $priority,
    ?string $description,
    ?string $deadline,
): bool {
    $sql = "UPDATE tasks SET
        name = :name,
        kind = :kind,
        priority = :priority,
        description = :description,
        deadline = :deadline
    WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':kind', $kind);
    $stmt->bindValue(':priority', $priority);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':deadline', $deadline);

    $stmt->execute();

    $success = $stmt->rowCount() === 1;

    return $success;
}
