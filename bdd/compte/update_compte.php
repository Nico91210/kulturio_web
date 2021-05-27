<?php   session_start();

include('../connexion_bdd.php');

$id = $_SESSION['user']['id'];
$animal1 = "deer.jpg";
$animal2 = "dolphin.jpg";
$animal3 = "lion.jpg";
$animal4 = "penguin.jpg";
$animal5 = "zebra.jpg";
$rap1 = "ninho.jpg";
$rap2 = "nepal.jpg";
$rap3 = "nekfeu.jpg";
$rap4 = "freeze.jpg";
if(isset($_POST['deer'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $animal1, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['dolphin'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $animal2, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['lion'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $animal3, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['penguin'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $animal4, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['zebra'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $animal5, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['ninho'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $rap1, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['nepal'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $rap2, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['nekfeu'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $rap3, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}elseif(isset($_POST['freeze'])){
  $req = $conn->prepare("UPDATE user SET avatar = :avatar WHERE id = $id");
                $req->bindParam(':avatar', $rap4, PDO::PARAM_STR);
                $req->execute();
    echo '<script>document.location.href = "../../compte/parametres.php";</script>';
}



$sql =  'SELECT * from user where email="'.$_SESSION['user']['email'].'"AND mdp="'.$_SESSION['user']['mdp'].'"';

$resul = $conn->query($sql);
$user = $resul->fetch(PDO::FETCH_ASSOC);
if ( !empty($user)){
    session_start();
    $_SESSION['user'] =$user ;
                               


}
          //REDIRECTion 
          echo '<script>document.location.href = "../../index.php";</script>';

?>