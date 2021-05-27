<?php
include('../connexion_bdd.php');
session_start();

if ($_GET['action'] == "add") {
    $sql = $conn->prepare('INSERT INTO amis(id_user_1, id_user_2, is_pending) 
    VALUES (:id_user_1, :id_user_2, :is_pending)
    ');
    $sql->execute([
        "id_user_1" => $_SESSION['user']['pseudo'],
        "id_user_2" => $_GET['pseudo'],
        "is_pending" => 1
    ]);
    
        echo '<script>document.location.href = "../../amis.php";</script>' ;
    
}
?>