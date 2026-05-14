<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Multilingue
require_once 'assets/PHP/lang.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenerbahçe - <?php echo $lang['nav_matches']; ?></title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<?php include_once 'assets/PHP/header.php'; ?>

<main>
    <section class="match-list">
        <h2><?php echo $lang['latest_results']; ?></h2>
        <div class="match">
            <p><strong>Fenerbahçe 3 - 1 Galatasaray</strong></p>
            <p>Date: 24 <?php echo $lang['february']; ?> 2025</p>
        </div>
        <div class="match">
            <p><strong>Anderlecht 2 - 2 Fenerbahçe</strong></p>
            <p>Date: 19 <?php echo $lang['february']; ?> 2025</p>
        </div>
        <div class="match">
            <p><strong>Fenerbahçe 3 - 1 Kasimpasa</strong></p>
            <p>Date: 16 <?php echo $lang['february']; ?> 2025</p>
        </div>
    </section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

</body>
</html>