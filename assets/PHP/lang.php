<?php
session_start();

// Vérifier si l'utilisateur a sélectionné une langue via GET
if (isset($_GET['lang']) && in_array($_GET['lang'], ['fr', 'en'])) {
    $language = $_GET['lang'];
    $_SESSION['lang'] = $language;
} elseif (isset($_SESSION['lang']) && in_array($_SESSION['lang'], ['fr', 'en'])) {
    $language = $_SESSION['lang'];
} else {
    // Langue par défaut
    $language = 'fr';
}

// Définir les chemins complets vers les fichiers de langue
$fr_file = __DIR__ . '/lang/fr.php';
$en_file = __DIR__ . '/lang/en.php';

// Charger le fichier de traduction correspondant
if ($language == 'fr' && file_exists($fr_file)) {
    require_once $fr_file;
} elseif ($language == 'en' && file_exists($en_file)) {
    require_once $en_file;
} else {
    die('Erreur: Fichier de langue introuvable');
}
?>