<?php
include('../connexion_bdd.php');
session_start();

if(isset($_GET["user"]) && isset($_SESSION["amis"])){
    $user = (String) trim($_GET["user"]);
    $sql = $conn->prepare('SELECT * 
    FROM user 
    WHERE pseudo 
    LIKE ?
    LIMIT 10');
    $sql->execute(array("$user%"));
    $req = $sql->fetchALL();
    foreach($req as $r){
        ?>
            <div>
            
                <?php
                if (!in_array($r['pseudo'], $_SESSION["amis"])) {
                    echo $r['pseudo'] . "<a href='bdd/amis/ajout_amis.php?action=add&pseudo=".$r['pseudo']."'> Ajouter</a>";
                }
                ?>
            </div>
        <?php
    }
}


?>