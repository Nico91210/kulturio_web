<?php   session_start();

include('../connexion_bdd.php');


if (isset($_POST['questions'])&&isset($_POST['reponses'])) {
    $sql = 'INSERT INTO questions_reponses (`questions`, `reponses`) VALUES ("'.$_POST['questions'].'","'.$_POST['reponses'].'");';
 
    $nbligne=$conn->exec($sql);
    if ($nbligne == 1) {
        echo '<script>document.location.href = "../../kulturio/questions_reponses.php";</script>' ;
    } else {
        echo '<script> alert("Erreur");  document.location.href= "../../index.php";</script>' ;
    }
} else {
    echo '<script> alert("Remplir les champs");  document.location.href= "../../index.php";</script>' ;
}
   



?>