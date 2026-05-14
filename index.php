<?php
// Multilingue
include 'assets/PHP/lang.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['title']; ?></title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<?php include_once 'assets/PHP/header.php'; ?>

<main>
    <section class="latest-results">
        <a href="matches.php" class="clickable-section">
            <h2><?php echo $lang['latest_results']; ?></h2>
            <div class="match">
                <p>Galatasaray 0 - 0 Fenerbahçe </p>
                <p>24 <?php echo $lang['february']; ?> 2025</p>
            </div>
        </a>
    </section>

    <section class="top-players">
        <a href="players.php" class="clickable-section">
            <h2><?php echo $lang['senior_team']; ?></h2>
            <div class="player-card">
                <img src="assets/images/livakovic.jpg" alt="Livakovic">
                <p> Dominik Livaković #40 <?php echo $trans['goalkeeper']; ?></p>
            </div>
            <div class="player-card">
                <img src="assets/images/talisca.jpg" alt="Talisca">
                <p> Anderson Talisca #94 <?php echo $trans['midfielder']; ?></p>
            </div>
        </a>
    </section>

    <section class="ranking"> 
        <a href="full-ranking.php" class="clickable-section">
            <h2><?php echo $lang['current_ranking']; ?></h2>
            <div class="ranking-container">
                <div class="ranking-card">
                    <h3>1. Galatasaray</h3>
                    <p><?php echo $trans['points']; ?> 65</p>
                </div>
                <div class="ranking-card">
                    <h3>2. Fenerbahçe</h3>
                    <p><?php echo $trans['points']; ?> 61</p>
                </div>
                <div class="ranking-card">
                    <h3>3. Samsunspor</h3>
                    <p><?php echo $trans['points']; ?> 46</p>
                </div>
                <div class="ranking-card">
                    <h3>4. Besiktas</h3>
                    <p><?php echo $trans['points']; ?> 41</p>
                </div>         
            </div>
        </a>
    </section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

</body>
</html>
