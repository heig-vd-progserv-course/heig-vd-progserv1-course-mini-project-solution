<?php

function getTasks(): array {
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

    return $tasks;
}

function getTaskById(int $id): ?array {
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

    foreach ($tasks as $task) {
        if ($task['id'] === $id) {
            $task = $task;
            return $task;
        }
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
