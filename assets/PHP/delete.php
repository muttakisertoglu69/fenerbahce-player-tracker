<?php
require_once 'Database.php'; // Assure-toi que le chemin est bon si tu es déjà dans assets/PHP/

if (isset($_GET['id']) && isset($_GET['type'])) {
    $db = Database::getInstance();
    $id = (int)$_GET['id'];
    $type = $_GET['type'];

    if ($type === 'official') {
        $success = $db->deletePlayer($id);
    } elseif ($type === 'suggested') {
        $success = $db->deleteSuggestedPlayer($id);
    } else {
        $success = false;
    }

    if ($success) {
        header('Location: ../../players.php'); // ou autre redirection après suppression
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "Requête invalide.";
}
?>
