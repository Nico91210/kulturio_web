<?php 
include('nav.php');
include('bdd/amis/select_amis.php');
if(empty($_SESSION)){
    header('location:index.php');
}
$user_check[] = $_SESSION["user"]["pseudo"];
?>

<div class="flexbox-amis">
        <div class="flexbox-div-amis">
            <br/>
        <form>
            <label for="code_ami">Ajouter des amis :</label>
            <input id="search_user" class="pseudo_in" type="text" name="pseudo_ami" value="" placeholder="Pseudo" required />
            <div id="resultat"></div>
        </form>
            <h2>Liste d'Amis :</h2>
            <?php for ($i = 0; $i < sizeof($amis); $i++) {
                if ($amis[$i]['id_user_1'] == $_SESSION['user']['pseudo']) {
                    echo $amis[$i]['id_user_2'] . " <a href='bdd/amis/delete_amis.php?action=delete&id=".$amis[$i]['id']."'>Supprimer</a> <a href='profil.php?pseudo=".$amis[$i]['id_user_2']."'>Profil</a>";
                    $user_check[] = $amis[$i]['id_user_2'];
                    if ($amis[$i]['is_pending'] == true) {
                        echo " (demande en attente)";
                    }
                } else {
                    if ($amis[$i]['is_pending'] == false) {
                        echo $amis[$i]['id_user_1'] . " <a href='bdd/amis/delete_amis.php?action=delete&id=".$amis[$i]['id']."'>Supprimer</a> <a href='profil.php?pseudo=".$amis[$i]['id_user_1']."'>Profil</a>";
                        $user_check[] = $amis[$i]['id_user_1'];
                    }
                }
                echo "<br/>";
            } ?>


            <h2>Demande d'Amis :</h2>
            <?php for ($i = 0; $i < sizeof($amis); $i++) {
                if ($amis[$i]['is_pending'] == true && $amis[$i]['id_user_2'] == $_SESSION['user']['pseudo']) {
                    echo $amis[$i]['id_user_1'] . " <a href='bdd/amis/accept_amis.php?action=accept&id=".$amis[$i]['id']."'>Accepter</a>" . " <a href='bdd/amis/delete_amis.php?action=delete&id=".$amis[$i]['id']."'>Supprimer</a>";;
                    $user_check[] = $amis[$i]['id_user_1'];
                }
            }
            $_SESSION["amis"] = $user_check; ?>
    </div>
</div>