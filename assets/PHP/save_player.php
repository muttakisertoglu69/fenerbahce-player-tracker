<?php
require_once 'Database.php';

$db = Database::getInstance(); // CORRECT maintenant

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $image = $_FILES['image'];

    if (!empty($name) && !empty($number) && !empty($image['name'])) {
        $uploadDir = 'assets/uploads/';
        $uploadFile = $uploadDir . basename($image['name']);

        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $query = $db->getConnection()->prepare("INSERT INTO players (name, numero, picture) VALUES (?, ?, ?)");
            $query->execute([$name, $number, basename($image['name'])]); // Juste le nom du fichier

            header("Location: ../players.php");
            exit;
        } else {
            echo "Erreur lors de l'upload du fichier.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode invalide.";
}
?>