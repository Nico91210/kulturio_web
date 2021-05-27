<?php

include("bdd/connexion_bdd.php");

$sql = 'SELECT * FROM amis WHERE id_user_1 = "'.$_SESSION['user']['pseudo'].'" OR id_user_2 = "'.$_SESSION['user']['pseudo'].'"'; 
$resul = $conn->query($sql);
$amis = $resul->fetchALL(PDO::FETCH_ASSOC);

?>