<?php 
session_start();
include("../bdd/connexion_bdd.php");
if (empty($_SESSION)) {
	header('location:../index.php');
}

$id = $_SESSION['user']['id'];
$token = uniqid();
$req = $conn->prepare("UPDATE user SET kulturio_token = :kulturio_token WHERE id = $id");
                $req->bindParam(':kulturio_token', $token, PDO::PARAM_STR);
                $req->execute();

header('location: room.php?t='.$token.'');

?>