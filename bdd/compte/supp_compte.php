<?php session_start();

include_once('../connexion_bdd.php');


if (!empty($_SESSION['user'])) {
    unlink("../../data/avatars/".$_SESSION['user']['avatar']);
    $id = $_SESSION['user']['id'];
    $sql =  'DELETE FROM user where id = "'.$id.'"';

    $resul = $conn->query($sql);
        echo '<script>
        document.location.href= "../../compte/deconnexion.php";
          </script>' ;

    } else {
        echo '<script> alert("Erreur");
     document.location.href= "../../index.php";
     </script>' ;
    }
    
?>