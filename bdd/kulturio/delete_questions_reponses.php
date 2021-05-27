<?php
include('../connexion_bdd.php');

$sql =  'DELETE FROM questions_reponses WHERE id = '.$_GET['id']; 
$nbligne=$conn->exec($sql);
if($nbligne == 1) {
       
    echo '<script>document.location.href = "../../kulturio/questions_reponses.php";</script>' ;
  
}else {
    $erreur = implode("','",$conn->errorInfo());
    echo '<script> alert("'.$erreur.'"); </script>' ;}
    

?>