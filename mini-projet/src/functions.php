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
