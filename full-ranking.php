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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="assets/images/galatasaray-logo.png" alt="Galatasaray Logo" class="team-logo"></td>
                        <td>Galatasaray</td>
                        <td>65</td>
                        <td>23</td>
                        <td>20</td>
                        <td>3</td>
                        <td>0</td>
                        <td>59</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="assets/images/fenerbahce-logo.png" alt="Fenerbahçe Logo" class="team-logo"></td>
                        <td>Fenerbahçe</td>
                        <td>61</td>
                        <td>23</td>
                        <td>18</td>
                        <td>3</td>
                        <td>2</td>
                        <td>60</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="assets/images/samsunspor-logo.png" alt="Samsunspor Logo" class="team-logo"></td>
                        <td>Samsunspor</td>
                        <td>46</td>
                        <td>24</td>
                        <td>14</td>
                        <td>4</td>
                        <td>6</td>
                        <td>39</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><img src="assets/images/besiktas-logo.png" alt="Beşiktaş Logo" class="team-logo"></td>
                        <td>Beşiktaş</td>
                        <td>41</td>
                        <td>23</td>
                        <td>11</td>
                        <td>8</td>
                        <td>4</td>
                        <td>36</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><img src="assets/images/eyup-logo.png" alt="Eyüp Logo" class="team-logo"></td>
                        <td>Eyüp</td>
                        <td>40</td>
                        <td>24</td>
                        <td>11</td>
                        <td>7</td>
                        <td>6</td>
                        <td>36</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><img src="assets/images/goztepe-logo.png" alt="Göztepe Logo" class="team-logo"></td>
                        <td>Göztepe</td>
                        <td>35</td>
                        <td>23</td>
                        <td>10</td>
                        <td>5</td>
                        <td>8</td>
                        <td>40</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><img src="assets/images/basaksehir-logo.png" alt="Başakşehir Logo" class="team-logo"></td>
                        <td>Başakşehir</td>
                        <td>33</td>
                        <td>23</td>
                        <td>9</td>
                        <td>6</td>
                        <td>8</td>
                        <td>39</td>
                        <td>31</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><img src="assets/images/trabzonspor-logo.png" alt="Trabzonspor Logo" class="team-logo"></td>
                        <td>Trabzonspor</td>
                        <td>32</td>
                        <td>23</td>
                        <td>8</td>
                        <td>8</td>
                        <td>7</td>
                        <td>39</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td><img src="assets/images/kasimpasa-logo.png" alt="Kasımpaşa Logo" class="team-logo"></td>
                        <td>Kasımpaşa</td>
                        <td>31</td>
                        <td>24</td>
                        <td>7</td>
                        <td>10</td>
                        <td>7</td>
                        <td>42</td>
                        <td>47</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><img src="assets/images/alanya-logo.png" alt="Alanya Logo" class="team-logo"></td>
                        <td>Alanya</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>11</td>
                        <td><img src="assets/images/rizespor-logo.png" alt="Rizespor Logo" class="team-logo"></td>
                        <td>Rizespor</td>
                        <td>30</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>30</td>
                        <td>41</td>
                    </tr>

                    <tr>
                        <td>12</td>
                        <td><img src="assets/images/antalyaspor-logo.png" alt="Antalyaspor Logo" class="team-logo"></td>
                        <td>Antalyaspor</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>13</td>
                        <td><img src="assets/images/gaziantep-logo.png" alt="Gaziantep FK Logo" class="team-logo"></td>
                        <td>Gaziantep FK</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>14</td>
                        <td><img src="assets/images/konyaspor-logo.png" alt="Konyaspor Logo" class="team-logo"></td>
                        <td>Konyaspor</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>15</td>
                        <td><img src="assets/images/sivasspor_logo.png" alt="Sivasspor Logo" class="team-logo"></td>
                        <td>Sivasspor</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>16</td>
                        <td><img src="assets/images/kayserispor-logo.png" alt="Kayserispor Logo" class="team-logo"></td>
                        <td>Kayserispor</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>17</td>
                        <td><img src="assets/images/bodrumspor-logo.png" alt="Bodrumspor Logo" class="team-logo"></td>
                        <td>Bodrumspor</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>18</td>
                        <td><img src="assets/images/hatayspor-logo.png" alt="Hatayspor Logo" class="team-logo"></td>
                        <td>Hatayspor</td>
                        <td>31</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>

                    <tr>
                        <td>19</td>
                        <td><img src="assets/images/adana-logo.png" alt="Adana Demirspor Logo" class="team-logo"></td>
                        <td>Adana Demirspor</td>
                        <td>3</td>
                        <td>24</td>
                        <td>8</td>
                        <td>7</td>
                        <td>9</td>
                        <td>28</td>
                        <td>33</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include_once 'assets/PHP/footer.php'; ?>

</body>
</html>