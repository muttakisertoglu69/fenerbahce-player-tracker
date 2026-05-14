<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Multilingue
include_once 'assets/PHP/lang.php';

// Chemin simple et direct vers la classe Database
require_once 'assets/PHP/Database.php';

// Vérifier si l'ID du joueur est fourni
if (!isset($_GET['player']) || empty($_GET['player'])) {
    header('Location: players.php');
    exit;
}

// Récupérer les détails du joueur suggéré
$playerId = (int) $_GET['player'];
$db = Database::getInstance();
$player = $db->getSuggestedPlayer($playerId);

// Si le joueur n'existe pas, rediriger vers la page des joueurs
if (!$player) {
    header('Location: players.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenerbahçe - <?php echo htmlspecialchars($player['name']); ?> (Suggéré)</title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<?php include_once 'assets/PHP/header.php'; ?>
    
    <main>
    <section class="player-details">
    <div class="suggested-back-button">
            <a href="players.php?lang=<?php echo $language; ?>"><?php echo $lang['back']; ?></a>
    </div>
    
    <div class="player-header">
        <!-- Section photo -->
        <div class="player-image">
            <img src="assets/uploads/<?php echo $player['picture']; ?>" alt="<?php echo htmlspecialchars($player['name']); ?>">
        </div>
        
        <!-- Section informations -->
        <div class="player-info">
            <h2><?php echo htmlspecialchars($player['name']); ?> <span class="suggested-tag"><?php echo $lang['fan_suggestion']; ?></span></h2>
            
            <div class="player-stats">
                <div class="stat">
                    <span class="stat-label"><?php echo $lang['player_nationality']; ?></span>
                    <span class="stat-value"><?php echo htmlspecialchars($player['nationality']); ?></span>
                </div>
                
                <div class="stat">
                    <span class="stat-label"><?php echo $lang['player_age']; ?></span>
                    <span class="stat-value"><?php echo $player['age']; ?> ans</span>
                </div>
                
                <div class="stat">
                    <span class="stat-label"><?php echo $lang['player_number']; ?></span>
                    <span class="stat-value"><?php echo $player['numero']; ?></span>
                </div>
                
                <div class="stat">
                    <span class="stat-label"><?php echo $lang['player_goals']; ?></span>
                    <span class="stat-value"><?php echo $player['goals']; ?></span>
                </div>
                
                <div class="stat">
                    <span class="stat-label"><?php echo $lang['player_assists']; ?></span>
                    <span class="stat-value"><?php echo $player['assists']; ?></span>
                </div>
            </div>
            
            <!-- Lien de suppression -->
            <div class="delete-button">
                <a href="assets/PHP/delete.php?id=<?php echo $player['id']; ?>&type=suggested" onclick="return confirm('<?php echo $lang['confirm_delete']; ?>');" class="delete-btn"><?php echo $lang['delete_player']; ?></a>
            </div>
        </div>
    </div>
</section>
    </main>
    
<?php include_once 'assets/PHP/footer.php'; ?>

</body>
</html>