<?php 
session_start();
include("../bdd/connexion_bdd.php");
if (empty($_SESSION)) {
	header('location:../index.php');
}

if (isset($_POST['room'])) {
    $sql = 'SELECT COUNT(*) FROM user WHERE kulturio_token="'.$_POST['room'].'";';
    $resul = $conn->query($sql);
    $num_row = $resul->fetchColumn();

    if ($num_row == 0) {
        header('location: home_kulturio.php?Erreur=room');
    } else {
        $id = $_SESSION['user']['id'];
        $token = $_POST['room'];
        $req = $conn->prepare("UPDATE user SET kulturio_token = :kulturio_token WHERE id = $id");
        $req->bindParam(':kulturio_token', $token, PDO::PARAM_STR);
        $req->execute();

        header('location: room.php?t='.$token.'');
    }
}else{
    header('location: home_kulturio.php?Erreur=champs');
}
?>