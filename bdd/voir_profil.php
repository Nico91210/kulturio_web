<?php

include("bdd/connexion_bdd.php");
$sql = 'SELECT pseudo, date_creation, victoire, avatar FROM user WHERE pseudo = "'.$pseudo.'"'; 
$resul = $conn->query($sql);
$profil = $resul->fetch();

$sql = 'SELECT * FROM score_user_sampl WHERE id_user = "'.$pseudo.'" ORDER BY date DESC'; 
$resul = $conn->query($sql);
$score = $resul->fetchALL(PDO::FETCH_ASSOC);

?>