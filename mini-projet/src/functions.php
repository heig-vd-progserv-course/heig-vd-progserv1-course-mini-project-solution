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
    ?string $species,
    ?string $nickname,
    ?string $sex,
    ?string $birthday,
    ?string $color,
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

    if (empty($species)) {
        array_push($errors, "L'espèce est obligatoire.");
    } else if (!in_array($species, ["dog", "cat", "lizard", "snake", "bird", "rabbit", "other"])) {
        array_push($errors, "L'espèce n'est pas valide.");
    }

    if (!empty($nickname)) {
        if (strlen($nickname) < 2) {
            array_push($errors, "Le surnom doit contenir au minimum 2 caractères.");
        } else if (strlen($nickname) > 50) {
            array_push($errors, "Le surnom doit contenir au maximum 30 caractères.");
        }
    }

    if (empty($sex)) {
        array_push($errors, "Le sexe est obligatoire.");
    } else if (!in_array($species, ["male", "female"])) {
        array_push($errors, "Le sexe n'est pas valide.");
    }

    if (!empty($birthday)) {
        if (strtotime($birthday) === false) {
            array_push($errors, "La date de naissance n'est pas valide.");
        } else if (strtotime($birthday) > time()) {
            array_push($errors, "La date de naissance ne peut pas être dans le futur.");
        }
    }

    if (!empty($color)) {
        if (!preg_match("/^#[a-f0-9]{6}$/i", $color)) {
            array_push($errors, "La couleur n'est pas valide.");
        }
    }

    return $errors;
}
