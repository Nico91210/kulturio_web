<?php
include("../bdd/connexion_bdd.php");
$sql = 'SELECT * FROM score_user_sampl WHERE id_user = "'.$_SESSION['user']['pseudo'].'" ORDER BY date DESC'; 
$resul = $conn->query($sql);
$score = $resul->fetchALL(PDO::FETCH_ASSOC);
?>