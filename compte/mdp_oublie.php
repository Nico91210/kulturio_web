<?php
    include('../bdd/connexion_bdd.php');
    if(isset($_GET['token']) && $_GET['token'] != ''){
        $sql = $conn->prepare('SELECT email FROM user WHERE token = ?');
                $sql->execute([$_GET['token']]);
                $email = $sql->fetchColumn();
        if($email){
            ?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../style.css" media="screen and (min-width: 640px)"/>
    <link rel="stylesheet" href="../mobile.css" media="screen and (max-width: 640px)"/>
                <title>Récupération MDP</title>
            </head>
            <body>
            <div class="flexbox-mdp">
        <div class="flexbox-div-mdp">
        <br/><br/>
            <form method="post">
                &nbsp;<input class="design" type="password" name="new_mdp" placeholder="Nouveau Mot de passe" required />&nbsp;<br/><br/>
                &nbsp;<input class="btndesign" class="design" type="submit" value="Valider">
            </form>
            <br/><br/>
</div>
            </div>
            </body>
            </html>
            <?php
            if(isset($_POST['new_mdp'])){
                $mdpHash = password_hash($_POST['new_mdp'], PASSWORD_DEFAULT);
                $sql =  'UPDATE user SET mdp = ?, token = NULL WHERE email = ?';
                $resul = $conn->prepare($sql);
                $resul->execute([$mdpHash, $email]);
                echo '<script> alert("Mot de passe modifié avec Succès");  document.location.href= "connexion_compte.php";</script>';
            }
        }else{
            header('location:../index.php');
        }
    }else{
        header('location:../index.php');
    }