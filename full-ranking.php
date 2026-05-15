<?php

// Multilingue
include 'assets/PHP/lang.php';

?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenerbahçe - <?php echo $lang['ranking_title']; ?></title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>

<?php include_once 'assets/PHP/header.php'; ?>

<main>
    <section class="full-ranking">
        <h2><?php echo $lang['current_ranking']; ?></h2>
        <div class="ranking-wrapper">
            <table>
                <thead>
                    <tr>
                        <th><?php echo $lang['position']; ?></th>
                        <th><?php echo $lang['logo']; ?></th>
                        <th><?php echo $lang['team']; ?></th>
                        <th><?php echo $lang['points']; ?></th>
                        <th><?php echo $lang['played']; ?></th>
                        <th><?php echo $lang['won']; ?></th>
                        <th><?php echo $lang['draw']; ?></th>
                        <th><?php echo $lang['lost']; ?></th>
                        <th><?php echo $lang['goals']; ?></th>
                        <th><?php echo $lang['conceded']; ?></th>
                    </tr>
                </thead>
                <tbody id="rankingBody">
                    <tr>
                        <td colspan="10">Chargement du classement...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

<script>
fetch('assets/PHP/api/standings.php')
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('rankingBody');
        tbody.innerHTML = '';

        if (data.error || !data.table) {
            tbody.innerHTML = '<tr><td colspan="10">Erreur lors du chargement du classement.</td></tr>';
            return;
        }

        const table = data.table;

        const logos = {
            "Galatasaray": "assets/images/logo/galatasaray-logo.png",
            "Fenerbahçe": "assets/images/logo/fenerbahce-logo.png",
            "Fenerbahce": "assets/images/logo/fenerbahce-logo.png",
            "Trabzonspor": "assets/images/logo/trabzonspor-logo.png",
            "Beşiktaş": "assets/images/logo/besiktas-logo.png",
            "Göztepe": "assets/images/logo/goztepe-logo.png"
        };

        table.forEach(team => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${team.intRank}</td>
                <td>
                    <img 
                        src="${logos[team.strTeam] || 'assets/images/default.jpg'}" 
                        alt="${team.strTeam}" 
                        class="team-logo"
                    >
                </td>                <td>${team.strTeam}</td>
                <td>${team.intPoints}</td>
                <td>${team.intPlayed}</td>
                <td>${team.intWin}</td>
                <td>${team.intDraw}</td>
                <td>${team.intLoss}</td>
                <td>${team.intGoalsFor}</td>
                <td>${team.intGoalsAgainst}</td>
            `;

            tbody.appendChild(row);
        });
    })
    .catch(() => {
        document.getElementById('rankingBody').innerHTML =
            '<tr><td colspan="10">Erreur API.</td></tr>';
    });
</script>
</body>
</html>