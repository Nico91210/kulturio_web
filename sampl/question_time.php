<?php
include 'db.php';
session_start();
if(empty($_SESSION)){
    header('location:../index.php');
}

//Set Question Number
$number = $_GET['n'];
if (!empty($_SESSION['i'])) {
	$i = $_SESSION['i'];
}
$nomb = 1;
if(!empty($i)){
	$nomb = $nomb + $i;
}
//Query for the Question
$query = "SELECT * FROM questions WHERE question_number = $number";

// Get the question
$result = mysqli_query($connection, $query);
$question = mysqli_fetch_assoc($result);

//Get Choices
$query = "SELECT * FROM options WHERE question_number = $number";
$choices = mysqli_query($connection, $query);
$id_q = 1;
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kulturio</title>
	<link rel="stylesheet" href="../style.css" media="screen and (min-width: 640px)"/>
    <link rel="stylesheet" href="../mobile.css" media="screen and (max-width: 640px)"/>
	<script src="../jquery-3.1.1.js"></script>
	<script src="../script.js"></script>
	<script>
		function chargement()
{
    secondes=30;
    setTimeout(redirect,secondes*1000);
    change_valeur();
    timer=setInterval(change_valeur, 1000);
 
}
 
function redirect()
{
    formulaire.go.click();
}
 
function change_valeur()
{
    if(secondes>1)
    {
        document.getElementById('compteur').innerHTML=secondes + ' secondes';
    }
     
    else if(secondes>=0)
    {
        document.getElementById('compteur').innerHTML=secondes + ' seconde';   
    }
     
    else
    {
        clearTimeout(timer);   
    }
    secondes--;
}
	</script>
</head>

<body onload="chargement();">

<div class="flexbox-question">
    <div class="flexbox-div-question">
			<h2>Sampl'Quizz</h2>
				<h2>Question <?php echo $nomb; ?> sur 20</h2>
			<h3>Temps restants : <span id="compteur"></span></h3>
				<p class="question"><?php echo $question['question_text']; ?> </p>
			<?php
			if($question['audio'] !== NULL){	?>
				<audio controls controlsList="nodownload">
				<source src="../data/musiques/<?=$question['audio']?>">
			  </audio>
			  <?php } ?>	
			  <div class="flexbox-div-questionbg">	
			  <br/>
				<form id="formulaire" method="POST" action="process_time.php" onsubmit="desactiver_time()">
				
						<?php while ($row = mysqli_fetch_assoc($choices)) { ?>
							&nbsp;<input id="q<?=$id_q?>" type="radio" name="choice" value="<?php echo $row['id']; ?>">
							<label for="q<?=$id_q?>" class="label-question">&nbsp;<?php echo $row['coption']; ?>&nbsp;</label>&nbsp;
							<br/>
							<br/>
						<?php $id_q++;
					} ?>
					<br/>


					
					<?php if(!empty($_SESSION['i'])){ ?>
					<input type="hidden" name="i" value="<?php echo $i; ?>">
					<?php } ?>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					</div>
					<br/>
					<input id="go" class="btn-flex-question" type="submit" name="submit" value="Valider">
				</form>
				<br/>
</div>
</div>




</body>

</html>