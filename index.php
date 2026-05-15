<?php
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

<main class="home-sections">
    <section class="latest-results">
        <a href="matches.php" class="clickable-section">
            <h2><?php echo $lang['latest_results']; ?></h2>
    
            <div class="match" id="homeLastMatch">
                <p>Chargement du dernier match...</p>
            </div>
        </a>
    </section>

    <section class="top-players">
        <a href="players.php" class="clickable-section">
            <h2><?php echo $lang['senior_team']; ?></h2>

            <div class="player-card">
                <img src="assets/images/players/ederson.jpg" alt="Ederson">
                <p><strong>Ederson</strong><br>#31</p>
            </div>

            <div class="player-card">
                <img src="assets/images/players/talisca.jpg" alt="Talisca">
                <p><strong>Anderson Talisca</strong><br>#94</p>
            </div>
        </a>
    </section>
    
    <section class="ranking"> 
        <a href="full-ranking.php" class="clickable-section">
            <h2><?php echo $lang['current_ranking']; ?></h2>
    
            <div class="home-ranking-table-wrapper">
                <table class="home-ranking-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Team</th>
                            <th>Pts</th>
                        </tr>
                    </thead>
                    <tbody id="homeRanking">
                        <tr>
                            <td colspan="3">Chargement...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </a>
    </section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

<script>
fetch('assets/PHP/api/standings.php')
    .then(response => response.json())
    .then(data => {
        const ranking = document.getElementById('homeRanking');
        ranking.innerHTML = '';

        if (data.error || !data.table) {
            ranking.innerHTML = `
                <tr>
                    <td colspan="3">Classement indisponible</td>
                </tr>
            `;
            return;
        }

        data.table.slice(0, 5).forEach(team => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${team.intRank}</td>
                <td>${team.strTeam}</td>
                <td>${team.intPoints}</td>
            `;

            ranking.appendChild(row);
        });
    })
    .catch(() => {
        document.getElementById('homeRanking').innerHTML = `
            <tr>
                <td colspan="3">Erreur API</td>
            </tr>
        `;
    });
</script>

<script>
fetch('assets/data/matches.json')
    .then(response => response.json())
    .then(data => {

        const container = document.getElementById('homeLastMatch');

        if (!data.matches || data.matches.length === 0) {
            container.innerHTML = '<p>Aucun match trouvé.</p>';
            return;
        }

        const latestMatches = data.matches
            .sort((a, b) => new Date(b.date) - new Date(a.date))
            .slice(0, 3);

        container.innerHTML = '';

        latestMatches.forEach(match => {

            const resultClass =
                match.result === 'W' ? 'win' :
                match.result === 'D' ? 'draw' :
                'loss';

            const div = document.createElement('div');
            div.classList.add('mini-match-card');

            div.innerHTML = `
                <h3>
                    ${match.homeTeam}
                    ${match.homeScore} - ${match.awayScore}
                    ${match.awayTeam}
                </h3>

                <p>${match.date}</p>
                <p>${match.competition}</p>

                <span class="match-result ${resultClass}">
                    ${match.result}
                </span>
            `;

            container.appendChild(div);
        });
    })
    .catch(() => {
        document.getElementById('homeLastMatch').innerHTML =
            '<p>Erreur lors du chargement.</p>';
    });
</script>

</body>
</html>