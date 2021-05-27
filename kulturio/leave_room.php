<?php
session_start();
include("../bdd/connexion_bdd.php");
if (empty($_SESSION)) {
	header('location:../index.php');
}

$id = $_SESSION['user']['id'];
$req = $conn->prepare("UPDATE user SET kulturio_token = NULL WHERE id = $id");
                $req->execute();
header('location: home_kulturio.php');
?>