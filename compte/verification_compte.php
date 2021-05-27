<?php
    include('../bdd/connexion_bdd.php');
    if(isset($_GET['token']) && $_GET['token'] != ''){
        $sql = $conn->prepare('SELECT email FROM user WHERE actif_token = ?');
                $sql->execute([$_GET['token']]);
                $email = $sql->fetchColumn();
        if($email){
            ?>
            <?php
            $actif = '1';
                $sql =  'UPDATE user SET actif_token = NULL, actif = ? WHERE email = ?';
                $resul = $conn->prepare($sql);
                $resul->execute([$actif, $email]);
                echo '<script> document.location.href= "connexion_compte.php";</script>';
        }else{
            header('location:../index.php');
        }
    }else{
        header('location:../index.php');
    }