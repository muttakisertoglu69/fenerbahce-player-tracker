<?php
header('Content-Type: application/json');

$url = "https://www.thesportsdb.com/api/v1/json/3/lookuptable.php?l=4339&s=2025-2026";

$response = file_get_contents($url);

if ($response === false) {
    echo json_encode([
        'error' => 'Impossible de récupérer le classement'
    ]);
    exit;
}

echo $response;