<?php

$sql = 'SELECT * FROM amis WHERE id_user_2 = "'.$_SESSION['user']['pseudo'].'" AND is_pending = 1'; 
$resul = $conn->query($sql);
$notifs = $resul->fetchALL(PDO::FETCH_ASSOC);

if(!empty($notifs)){
    $notifs_alert = 1;
}else{
    $notifs_alert = 0;
}

?>