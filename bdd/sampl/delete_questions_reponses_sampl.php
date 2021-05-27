<?php
include('../connexion_bdd.php');

$sql =  'DELETE FROM options WHERE question_number = '.$_GET['num'];
    $resul = $conn->query($sql);
$sql =  'DELETE FROM questions WHERE question_number = '.$_GET['num'];
    $resul = $conn->query($sql);


    

?>