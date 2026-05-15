<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        <div id="matchesContainer">
            <p>Chargement des matchs...</p>
        </div>
    </section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

<script>
fetch('assets/data/matches.json')
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('matchesContainer');
        container.innerHTML = '';

        if (!data.matches || data.matches.length === 0) {
            container.innerHTML = '<p>Aucun match trouvé.</p>';
            return;
        }

        data.matches
            .sort((a, b) => new Date(b.date) - new Date(a.date))
            .forEach(match => {
                const div = document.createElement('div');
                div.classList.add('match');

                const resultClass = match.result === 'W' ? 'win' :
                                    match.result === 'D' ? 'draw' :
                                    match.result === 'L' ? 'loss' : '';

                div.innerHTML = `
                    <h3>${match.homeTeam} ${match.homeScore} - ${match.awayScore} ${match.awayTeam}</h3>
                    <p>${match.date}</p>
                    <p>${match.competition}</p>
                    <span class="match-result ${resultClass}">${match.result}</span>
                `;

                container.appendChild(div);
            });
    })
    .catch(() => {
        document.getElementById('matchesContainer').innerHTML =
            '<p>Erreur lors du chargement des matchs.</p>';
    });
</script>

</body>
</html>