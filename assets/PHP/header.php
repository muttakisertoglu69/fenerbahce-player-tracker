<?php $playerId = $playerId ?? ''; ?>
<header>
    <div class="language-switcher">
        <a href="?lang=fr&player=<?php echo $playerId; ?>">Français</a> | <a href="?lang=en&player=<?php echo $playerId; ?>">English</a>
    </div>
    <div class="logo-container">
        <img src="assets/images/logo/fenerbahce-logo.png" alt="Fenerbahçe Logo" class="logo left-logo">
        <h1><a href="index.php"><?php echo $lang['header_title']; ?></a></h1>
        <img src="assets/images/turquie.png" alt="Turquie" class="logo right-logo">
    </div>
    <nav>
        <ul>
            <li><a href="index.php"><?php echo $lang['nav_home']; ?></a></li>
            <li><a href="players.php"><?php echo $lang['nav_players']; ?></a></li>
            <li><a href="matches.php"><?php echo $lang['nav_matches']; ?></a></li>
            <li><a href="suggest.php"><?php echo $lang['nav_suggest']; ?></a></li>
            <li><a href="full-ranking.php"><?php echo $lang['nav_ranking']; ?></a></li>
        </ul>
    </nav>
</header>