<?php
include('../connexion_bdd.php');
session_start();

if(isset($_GET["question"])){
    $question = (String) trim($_GET["question"]);
    $sql = $conn->prepare('SELECT * 
    FROM questions 
    WHERE artiste
    LIKE ?
    LIMIT 10');
    $sql->execute(array("%$question%"));
    $req = $sql->fetchALL();
    foreach($req as $r){
        ?>
            <div>
            
                <?php
                
                    echo $r['question_text'];
                
                ?>
            </div>
        <?php
    }
}


?>