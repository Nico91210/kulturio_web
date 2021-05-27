<?php
include('../connexion_bdd.php');

if ($_GET['action'] == "accept") {
    $sql =  'UPDATE amis SET is_pending = 0 WHERE id = '.$_GET['id'];
    $nbligne=$conn->exec($sql);
    if ($nbligne == 1) {
        echo '<script>document.location.href = "../../amis.php";</script>' ;
    } else {
        $erreur = implode("','", $conn->errorInfo());
        echo '<script> alert("'.$erreur.'"); </script>' ;
    }
}
?>