<?php

include("../bdd/connexion_bdd.php");

$sql = 'SELECT * from questions_reponses'; 
$resul = $conn->query($sql);
$tabQuestRepons = $resul->fetchALL(PDO::FETCH_ASSOC);


?>