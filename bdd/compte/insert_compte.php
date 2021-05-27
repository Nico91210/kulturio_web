<?php 

include('../connexion_bdd.php');


if(isset($_POST['pseudo'])&&isset($_POST['email'])&&isset($_POST['mdp'])){  
    $mdpHash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $today = date("Y-m-d H:i:s");
    $role = "joueur";
    $avatar = "dolphin.jpg";

    $sql = 'SELECT COUNT(*) FROM user WHERE pseudo="'.$_POST['pseudo'].'";';
    $resul = $conn->query($sql);
    $num_row = $resul->fetchColumn();
    if($num_row == 1) {
       
        echo '<script> document.location.href= "../../compte/inscription.php?Erreur=Pseudo";</script>' ;
      
    }else {
        $sql = 'SELECT COUNT(*) FROM user WHERE email="'.$_POST['email'].'";';
        $resul = $conn->query($sql);
        $num_row = $resul->fetchColumn();
        $actif = '0';
        $actif_token = uniqid();
        if ($num_row == 1) {
            echo '<script> document.location.href= "../../compte/inscription.php?Erreur=Email";</script>' ;
        } else {
            $sql = 'INSERT INTO user (`pseudo`, `email`, `mdp`, `role`, `date_creation`, `avatar`, `actif`, `actif_token`) VALUES (:pseudo,:email,:mdp,"'.$role.'","'.$today.'",:avatar,"'.$actif.'","'.$actif_token.'");';
 
            $stm=$conn->prepare($sql);
    
            $valeur=array(':pseudo'=>$_POST['pseudo'],':email'=>$_POST['email'],':mdp'=>$mdpHash,':avatar'=>$avatar) ;
    
            $nbligne = $stm->execute($valeur);
    
    
            if ($nbligne == 1) {
                $url_token = "https://www.kulturio.fr/compte/verification_compte.php?token=$actif_token";

                $email = utf8_decode($_POST['email']);
                $objet = utf8_decode("Confirmation de compte");
                $msg = utf8_decode("Bonjour, Merci de confirmer votre compte : $url_token");
        
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                $from = "support@kulturio.fr";
                $to ="$email";
                $subject = "$objet";
                $message = "$msg";
                $headers = "From:" . $from;
                mail($to, $subject, $message, $headers);
                echo '<script>document.location.href = "../../compte/connexion_compte.php?verif=1";</script>' ;
            } else {
                echo '<script> alert("Erreur");  document.location.href= "../../compte/inscription.php";</script>';
            }
        }
    }
}
