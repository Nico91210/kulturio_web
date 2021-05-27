<?php
include('nav.php');
$pseudo = htmlentities(trim($_GET['pseudo']));
$pseudo = (string) $pseudo;

include("bdd/voir_profil.php");
$Datetime = DateTime::createFromFormat('Y-m-d H:i:s', $profil['date_creation']);
$Dateconvertit = $Datetime->format('d/m/Y');
?>

<div class="flexbox-profil">
    <div class="flexbox-div-profil">
        <br />

        <img src="data/avatars/<?= $profil['avatar'] ?>" width="100" />

        <h1><?= $profil['pseudo'] ?></h1>

        <h1><?= $Dateconvertit ?></h1>

        <h1>Victoire à Kulturio : <?php if ($profil['victoire'] === NULL) {
                                        echo "0";
                                    } else {
                                        echo $profil['victoire'];
                                    } ?></h1>

        <h1>Score à Sampl'Quizz :
            <?php if (!empty($score)) { ?>
        </h1>
        <div class="flexbox-div-profilbg">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Score</th>
                    <th>Timer</th>
                </tr>
                <?php foreach ($score as $s) { ?>
                    <tr>
                        <td><?= $s['date'] ?></td>
                        <td><?= $s['score'] ?>/20</td>
                        <td><?= $s['timer'] ?></td>
                    </tr>

                <?php } ?>
            </table>
        </div>
        <br />
    <?php } else {
                echo "0</h1><br/>";
            } ?>
    </div>
</div>

</body>

</html>