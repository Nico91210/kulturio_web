<?php
include('../connexion_bdd.php');

if ($_GET['action'] == "delete") {
    $sql =  'DELETE FROM amis WHERE id = '.$_GET['id'];
    $nbligne=$conn->exec($sql);
    if ($nbligne == 1) {
        echo '<script>document.location.href = "../../amis.php";</script>' ;
    } else {
        $erreur = implode("','", $conn->errorInfo());
        echo '<script> alert("'.$erreur.'"); </script>' ;
    }
}
?>