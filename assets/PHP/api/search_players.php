<?php
require_once '../Database.php'; 
header('Content-Type: application/json');

$query = $_GET['q'] ?? '';
if (strlen($query) < 2) {
    echo json_encode(["error" => "Query too short"]);
    exit;
}

$db = Database::getInstance();
$players = $db->getPlayers();

if (!$players || !is_array($players)) {
    echo json_encode(["error" => "No players or invalid format"]);
    exit;
}

// On filtre les joueurs selon la recherche
$matchedPlayers = array_filter($players, function($player) use ($query) {
    return stripos($player['name'], $query) !== false;
});

// On retourne uniquement les joueurs filtrés
echo json_encode(array_values($matchedPlayers));
