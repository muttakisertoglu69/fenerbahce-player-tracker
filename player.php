<?php

// Multilingue
include_once 'assets/PHP/lang.php';

// Inclure la classe Database pour se connecter à la base de données
require_once 'assets/PHP/Database.php';

// Récupérer l'ID du joueur depuis l'URL
$playerId = isset($_GET['player']) ? (int)$_GET['player'] : 0;

// Vérifier si l'ID est valide
if ($playerId <= 0) {
    echo "Joueur non trouvé";
    exit;
}

// Récupérer les détails du joueur depuis la base de données
$db = Database::getInstance();
$player = $db->getPlayer($playerId);

// Vérifier si le joueur existe
if (!$player) {
    echo "Joueur non trouvé";
    exit;
}

// Traitement de la suppression du joueur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Supprimer le joueur de la base de données
    $result = $db->deletePlayer($playerId);
    
    if ($result) {
        // Supprimer l'image du joueur du dossier
        $imagePath = 'assets/images/' . $player['picture'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Supprimer l'image du répertoire
        }
        echo "Joueur supprimé avec succès.";
        exit; // Arrêter l'exécution après la suppression
    } else {
        echo "Erreur lors de la suppression du joueur.";
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenerbahçe - <?php echo $lang['player_title']; ?></title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<?php include_once 'assets/PHP/header.php'; ?>

<main>
<section class="player-details-card">
    <!-- Bouton retour -->
    <a href="players.php" class="regular-back-button"><?php echo $lang['back']; ?></a>
    
    <!-- Section photo -->
    <div class="player-image-section">
        <div class="player-number"><?php echo $player['numero']; ?></div>
        <img id="player-image" src="assets/images/<?php echo $player['picture']; ?>" alt="<?php echo htmlspecialchars($player['name']); ?>">
    </div>
    
    <!-- Section informations -->
    <div class="player-info-section">
        <h2 class="player-name"><?php echo htmlspecialchars($player['name']); ?></h2>
        
        <div class="player-details">
            <div class="player-detail-item">
                <span class="detail-label"><?php echo $lang['player_age']; ?></span>
                <span class="detail-value"><?php echo $player['age']; ?> <?php echo $lang['years_old']; ?></span>
            </div>
            
            <div class="player-detail-item">
                <span class="detail-label"><?php echo $lang['player_nationality']; ?></span>
                <span class="detail-value"><?php echo htmlspecialchars($player['nationality']); ?></span>
            </div>
            
            <div class="player-detail-item">
                <span class="detail-label"><?php echo $lang['at_club_since']; ?></span>
                <span class="detail-value">2021</span>
            </div>
        </div>
        
        <div class="player-stats">
            <div class="stat-item">
                <div class="stat-value"><?php echo $player['goals']; ?></div>
                <div class="stat-label"><?php echo $lang['player_goals']; ?></div>
            </div>
            
            <div class="stat-item">
                <div class="stat-value"><?php echo $player['assists']; ?></div>
                <div class="stat-label"><?php echo $lang['player_assists']; ?></div>
            </div>
        </div>
    </div>
</section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

</body>
</html>
