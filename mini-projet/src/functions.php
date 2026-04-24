<?php
require_once __DIR__ . '/data.php';

function getPets(): array {
    global $pets;

    return $pets;
}

function getPetById(int $id): ?array {
    global $pets;

    foreach ($pets as $pet) {
        if ($pet['id'] === $id) {
            return $pet;
        }
    }

    return null;
}

function validatePet(
    ?string $name,
): array {
    // Par défaut, il n'y a pas d'erreurs
    $errors = [];

    // Validation des données
    if (empty($name)) {
        array_push($errors, "Le nom est obligatoire.");
    }

    if (strlen($name) < 2) {
        array_push($errors, "Le nom doit contenir au minimum 2 caractères.");
    }

    if (strlen($name) > 50) {
        array_push($errors, "Le nom doit contenir au maximum 50 caractères.");
    }

    return $errors;
}
