<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Multilingue
require_once 'assets/PHP/lang.php';
require_once 'assets/PHP/Database.php';

$db = Database::getInstance();
$players = $db->getPlayers();
$suggestedPlayers = $db->getSuggestedPlayers();

usort($players, function($a, $b) {
    return $a['id'] - $b['id'];
});

$searchQuery = $_GET['search'] ?? '';
if (!empty($searchQuery)) {
    $players = array_filter($players, function($player) use ($searchQuery) {
        return stripos($player['name'], $searchQuery) !== false;
    });

    $suggestedPlayers = array_filter($suggestedPlayers, function($player) use ($searchQuery) {
        return stripos($player['name'], $searchQuery) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenerbahçe - <?php echo $lang['players_title']; ?></title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<?php include_once 'assets/PHP/header.php'; ?>
<main>
    <?php if (isset($_GET['message'])): ?>
        <div class="message-box success-message">
            <p><?php echo htmlspecialchars($_GET['message']); ?></p>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="message-box error-message">
            <p><?php echo htmlspecialchars($_GET['error']); ?></p>
        </div>
    <?php endif; ?>

    <section class="search-form">
        <h2><?php echo $lang['search_title']; ?></h2>
        <form action="players.php" method="get" id="searchForm">
            <input type="hidden" name="lang" value="<?php echo $language; ?>">
            <input type="text" id="searchInput" name="search" placeholder="<?php echo $lang['search_placeholder']; ?>" value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit"><?php echo $lang['search_button']; ?></button>
        </form>
        <div id="resultsContainer"></div>
    </section>

    <section class="players-grid">
        <h2><?php echo $lang['coach']; ?></h2>
        <div class="player-card coach-card"
             onclick="window.location.href='https://fr.wikipedia.org/wiki/Jos%C3%A9_Mourinho'">
    <img 
        src="assets/images/mourinho.jpg" 
        alt="José Mourinho"
    >

    <p>
        <strong>José Mourinho</strong><br>
        <?php echo $lang['coach']; ?>
    </p>

</div>

        <h2><?php echo $lang['official_squad']; ?></h2>
        <?php
        if (empty($players)) {
            echo "<p>" . $lang['no_official_players'] . "</p>";
        } else {
            foreach ($players as $player) {
                echo '<div class="player-card" data-player-id="' . $player['id'] . '">';
                echo '<img src="assets/images/players/' . htmlspecialchars($player['picture']) . '" alt="' . htmlspecialchars($player['name']) . '">';
                echo '<p><strong>' . htmlspecialchars($player['name']) . ' <br> ' . $player['numero'] . '</strong></p>';
                echo '</div>';
            }
        }
        ?>

        <?php if (!empty($suggestedPlayers)): ?>
            <h2><?php echo $lang['suggested_players']; ?></h2>
            <div class="players-grid suggested-players">
                <?php
                foreach ($suggestedPlayers as $player) {
                    echo '<div class="player-card suggested" data-suggested-id="' . $player['id'] . '">';
                    echo '<img src="assets/uploads/' . htmlspecialchars($player['picture']) . '" alt="' . htmlspecialchars($player['name']) . '">';
                    echo '<p><strong>' . htmlspecialchars($player['name']) . ' <br> ' . $player['numero'] . '</strong></p>';
                    echo '</div>';
                }
                ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('searchForm');
    const input = document.getElementById('searchInput');
    const container = document.getElementById('resultsContainer');

    if (!form || !input || !container) {
        console.warn('Formulaire ou champ manquant');
        return;
    }

    // Empêche soumission avec < 2 caractères
    form.addEventListener('submit', function (e) {
        if (input.value.trim().length < 2) {
            e.preventDefault();
            alert('<?php echo $lang['search_alert']; ?>');
        }
    });

    // AJAX live search
    input.addEventListener('input', function () {
        const query = input.value.trim();

        if (query.length < 2) {
            container.innerHTML = '';
            return;
        }

        fetch(`assets/PHP/api/search_players.php?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                container.innerHTML = '';

                if (!Array.isArray(data) || data.length === 0) {
                    container.innerHTML = '<p>Aucun joueur trouvé.</p>';
                    return;
                }

                data.forEach(player => {
                    const card = document.createElement('div');
                    card.classList.add('player-card');
                    card.setAttribute('data-player-id', player.id);
                    card.innerHTML = `
			<img src="assets/images/players/${player.picture}" alt="${player.name}">
                        <p><strong>${player.name} <br> ${player.numero}</strong></p>
                    `;
                    card.addEventListener('click', function () {
                        window.location.href = `player.php?player=${player.id}&lang=<?php echo $language; ?>`;
                    });
                    container.appendChild(card);
                });
            })
            .catch(err => {
                console.error('Erreur AJAX :', err);
                container.innerHTML = '<p>Erreur lors de la recherche.</p>';
            });
    });

    // Navigation vers fiche joueur (clics)
    document.querySelectorAll(".player-card:not(.suggested)").forEach(card => {
        card.addEventListener("click", function () {
            const playerId = this.getAttribute("data-player-id");
            if (playerId) {
                window.location.href = `player.php?player=${playerId}&lang=<?php echo $language; ?>`;
            }
        });
    });

    document.querySelectorAll(".player-card.suggested").forEach(card => {
        card.addEventListener("click", function () {
            const suggestedId = this.getAttribute("data-suggested-id");
            if (suggestedId) {
                window.location.href = `suggested-player.php?player=${suggestedId}&lang=<?php echo $language; ?>`;
            }
        });
    });
});
</script>

</body>
</html>
