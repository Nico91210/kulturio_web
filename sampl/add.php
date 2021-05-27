<!doctype html>
<html lang="fr">
<?php
session_start();
if (!empty($_SESSION)) {
	if ($_SESSION['user']['role'] === "joueur") {
		header('location:../index.php');
	}
}
if (empty($_SESSION)) {
	header('location:../index.php');
}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kulturio</title>
	<link rel="stylesheet" href="../style.css" media="screen and (min-width: 640px)"/>
    <link rel="stylesheet" href="../mobile.css" media="screen and (max-width: 640px)"/>
	<script src="../jquery-3.1.1.js"></script>
	<script src="../script.js"></script>

	<?php 
	include("../bdd/connexion_bdd.php");
	if (isset($_POST['submit'])) {
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		$artiste = $_POST['artiste'];

		$audio = basename( $_FILES['fileToUpload']['name']);
		$target_path = "../data/musiques/";
		$target_path = $target_path . basename( $_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path);


	
		// Choice Array
		$choice = array();
		$choice[1] = $_POST['choice1'];
		$choice[2] = $_POST['choice2'];
		$choice[3] = $_POST['choice3'];
		$choice[4] = $_POST['choice4'];
		$choice[5] = $_POST['choice5'];

		// First Query for Questions Table


if ($_FILES['fileToUpload']['name'] !== '') {
    $sql = 'INSERT INTO questions (`question_number`, `question_text`, `artiste`, `audio`) 
				VALUES (:question_number,:question_text,:artiste,:audio);';
    $stm=$conn->prepare($sql);
    $valeur=array(':question_number'=>$question_number,':question_text'=>$question_text,':artiste'=>$artiste,':audio'=>$audio) ;
    $ques_ins = $stm->execute($valeur);
}else{
	$sql = 'INSERT INTO questions (`question_number`, `question_text`, `artiste`, `audio`) 
	VALUES (:question_number,:question_text,:artiste,NULL);';
$stm=$conn->prepare($sql);
$valeur=array(':question_number'=>$question_number,':question_text'=>$question_text,':artiste'=>$artiste);
$ques_ins = $stm->execute($valeur);
}

		//Validate First Query
		if ($ques_ins) {
			foreach ($choice as $option => $value) {
				if ($value != "") {
					if ($correct_choice == $option) {
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}


					$sql = 'INSERT INTO options (`question_number`, `is_correct`, `coption`) 
							VALUES (:question_number,:is_correct,:coption);';
							$stm=$conn->prepare($sql);
    						$valeur=array(':question_number'=>$question_number,':is_correct'=>$is_correct,':coption'=>$value) ;
    				$opt_ins = $stm->execute($valeur);
					// Validate Insertion of Choices

					if ($opt_ins) {
						continue;
					} else {
						die("2nd Query for Choices could not be executed" . $sql);
					}
				}
			}
			$message = "La Question a été ajouté";
		}
	}

	$sql = "SELECT * FROM questions";
	$resulq = $conn->query($sql);
	$total = count($resulq->fetchAll());
	$next = $total + 1;

	$sql = 'SELECT * FROM questions'; 
	$resul = $conn->query($sql);
	$tabQuestRepons_sampl = $resul->fetchALL(PDO::FETCH_ASSOC);


	?>
</head>

<body>

	<div id="navbar">
		<ul id="ul-nav">
			<li class="list-nav">
				<a href="../index.php"><svg width="63" height="37" viewBox="0 0 63 37" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1.228 16.7322C0.251692 17.7085 0.251692 19.2915 1.228 20.2678L17.1379 36.1777C18.1142 37.154 19.6971 37.154 20.6734 36.1777C21.6497 35.2014 21.6497 33.6184 20.6734 32.6421L6.5313 18.5L20.6734 4.35786C21.6497 3.38155 21.6497 1.79864 20.6734 0.82233C19.6971 -0.15398 18.1142 -0.15398 17.1379 0.82233L1.228 16.7322ZM62.0042 16L2.99577 16V21L62.0042 21V16Z" fill="white" />
					</svg>
				</a>
			</li>
		</ul>
	</div>


<div class="flexbox-add">
        <div class="flexbox-div-add">
			<label>Artiste :</label>
			<input id="search_question" type="text" name="question_s" value="" placeholder="Artiste" required />
			<div id="resultat_question"></div>
			<h2>Ajouter une question</h2>
			<?php if (isset($message)) {
				echo "<h4>" . $message . "</h4>";
			} ?>

			<form method="POST" action="add.php" enctype="multipart/form-data">
				<p>
					<label>Numéro Question :</label>
					<input type="number" name="question_number" value="<?php echo $next;  ?>">
				</p>
				<p>
					<label>Question :</label>
					<input type="text" name="question_text" required>
				</p>
				<p>
					<label>Audio <br/> (10s max environ et renommer l'audio avec le titre) : <br/></label>
					<input type="file" name="fileToUpload" id="fileToUpload">
				</p>
				<p>
					<label>Choix 1 :</label>
					<input type="text" name="choice1">
				</p>
				<p>
					<label>Choix 2 :</label>
					<input type="text" name="choice2">
				</p>
				<p>
					<label>Choix 3 :</label>
					<input type="text" name="choice3">
				</p>
				<p>
					<label>Choix 4 :</label>
					<input type="text" name="choice4">
				</p>
				<p>
					<label>Choix 5 :</label>
					<input type="text" name="choice5">
				</p>
				<p>
					<label>Artiste :</label>
					<input type="text" name="artiste" required>
				</p>
				<p>
					<label>Numéro de la Réponse</label>
					<input type="number" name="correct_choice">
				</p>
				<input type="submit" name="submit" value="Valider">


			</form>
		</div>
	</div>
	
<div class="flexbox-addtb">
        <div class="flexbox-div-addtb">
	<table>
		<tr>
			<th>Numéro</th>
			<th>Questions</th>
			<th>Artistes</th>
			<th>Audio</th>
		</tr>
		<?php
		if (!empty($tabQuestRepons_sampl)) {
			foreach ($tabQuestRepons_sampl as $qs) {
				$num = $qs['question_number'];
				$questions = $qs['question_text'];
				$artiste = $qs['artiste'];
				$audio = $qs['audio'];
				echo "<tr>";
				echo "<td>$num</td>";
				echo "<td>$questions</td>";
				echo "<td>$artiste</td>";
				echo "<td>$audio</td>";
				echo '<td><a href="#" onclick="deletqr_sampl(' . $num . ')" >Supprimer </a></tr>';
				echo "</tr>";
			}
			echo "</table></div></div>";
		} else {
			echo "Table Vide";
		} ?>

</body>

</html>