<?php
 include_once('../connexion_bdd.php');


if(isset($_POST['email'])&&isset($_POST['mdp'])) {
$sql =  'SELECT * from user where email="'.$_POST['email'].'"';

$resul = $conn->query($sql);
$user = $resul->fetch(PDO::FETCH_ASSOC);
    if ( !empty($user)){


        if (password_verify($_POST['mdp'], $user['mdp'])) {
            session_start();
            $_SESSION['user'] =$user ;
            if($_SESSION['user']['actif'] === '0'){
                session_unset();
                session_destroy ();
                echo '<script> alert("Merci de vérifier votre compte sur le lien envoyé par email");
        document.location.href= "../../compte/connexion_compte.php";
        </script>' ;
            }else{
                header("Location:../../index.php");
            } 
        } else {
            echo '<script> alert("Votre mot de passe est incorrect");
        document.location.href= "../../compte/connexion_compte.php";
        </script>' ;
        }
                    


    } else {
        echo '<script> alert("Votre email est incorrect");
    document.location.href= "../../compte/connexion_compte.php";
    </script>' ;
    }
    
          //REDIRECTion 
 } else {
     
     echo '<script> alert("Votre email et/ou mot de passe est invalide");
     document.location.href= "../../compte/connexion_compte.php";
     </script>' ;
}
  
?>