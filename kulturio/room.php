<?php
session_start();
include("../bdd/connexion_bdd.php");
if (empty($_SESSION)) {
    header('location:../index.php');
}

$id = $_SESSION['user']['id'];
$sql =  'SELECT * from user where id="' . $id . '"';
$resul = $conn->query($sql);
$user = $resul->fetch(PDO::FETCH_ASSOC);

if ($user['kulturio_token'] === $_GET['t']) {
    $sql =  'SELECT * from user where kulturio_token="' . $_GET['t'] . '"';
    $resul_co = $conn->query($sql);
    $user_co = $resul_co->fetchAll(PDO::FETCH_ASSOC);
} else {
    header('location: home_kulturio');
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kulturio</title>
    <link rel="stylesheet" href="../style.css" media="screen and (min-width: 640px)" />
    <link rel="stylesheet" href="../mobile.css" media="screen and (max-width: 640px)" />
    <script src="../jquery-3.1.1.js"></script>
    <script src="../script.js"></script>
    <script src="../vue.min.js"></script>

    <script>
        function copycode() {
            var copyText = document.getElementById("copier");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        }
    </script>

</head>

<body>
    <div id="navbar">
        <ul id="ul-nav">
            <li class="list-nav">
                <a href="leave_room.php"><svg width="63" height="37" viewBox="0 0 63 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.228 16.7322C0.251692 17.7085 0.251692 19.2915 1.228 20.2678L17.1379 36.1777C18.1142 37.154 19.6971 37.154 20.6734 36.1777C21.6497 35.2014 21.6497 33.6184 20.6734 32.6421L6.5313 18.5L20.6734 4.35786C21.6497 3.38155 21.6497 1.79864 20.6734 0.82233C19.6971 -0.15398 18.1142 -0.15398 17.1379 0.82233L1.228 16.7322ZM62.0042 16L2.99577 16V21L62.0042 21V16Z" fill="white" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>





    <div class="flexbox-room">
        <div class="flexbox-div-room">

            <?php
            foreach ($user_co as $joueurs) {
                echo "<img src='../data/avatars/$joueurs[avatar]' width='50' />";
                echo "<h3>$joueurs[pseudo]</h3>";
                echo "<hr/>";
            }
            ?>
            <h2>20 Questions</h2>
            <h2>Code de la salle : <?= $_GET['t'] ?></h2>
            <input style="z-index: -999;position:absolute; top: -9999px;left: -9999px;opacity:0;" type="text" value="<?= $_GET['t'] ?>" id="copier">
            <button onclick="copycode()">
                <svg width="50" height="50" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 488.3 488.3" style="enable-background:new 0 0 488.3 488.3;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M314.25,85.4h-227c-21.3,0-38.6,17.3-38.6,38.6v325.7c0,21.3,17.3,38.6,38.6,38.6h227c21.3,0,38.6-17.3,38.6-38.6V124
			C352.75,102.7,335.45,85.4,314.25,85.4z M325.75,449.6c0,6.4-5.2,11.6-11.6,11.6h-227c-6.4,0-11.6-5.2-11.6-11.6V124
			c0-6.4,5.2-11.6,11.6-11.6h227c6.4,0,11.6,5.2,11.6,11.6V449.6z" />
                            <path d="M401.05,0h-227c-21.3,0-38.6,17.3-38.6,38.6c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5c0-6.4,5.2-11.6,11.6-11.6h227
			c6.4,0,11.6,5.2,11.6,11.6v325.7c0,6.4-5.2,11.6-11.6,11.6c-7.5,0-13.5,6-13.5,13.5s6,13.5,13.5,13.5c21.3,0,38.6-17.3,38.6-38.6
			V38.6C439.65,17.3,422.35,0,401.05,0z" />
                        </g>
                    </g>
                </svg>
            </button>


        </div>
    </div>




</body>

</html>