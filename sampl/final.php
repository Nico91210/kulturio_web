<?php
session_start();
include 'db.php';
include("../bdd/connexion_bdd.php");
$today = date("Y-m-d");
if (isset($_SESSION['score'])) {
	$sql = $conn->prepare('INSERT INTO score_user_sampl(score, id_user, date, timer) 
    VALUES (:score, :id_user, :date, :timer)
    ');
	$sql->execute([
		"score" => $_SESSION['score'],
		"id_user" => $_SESSION['user']['pseudo'],
		"date" => $today,
		"timer" => "X",
	]);


	if ($_SESSION['mauvais'] !== 'a:0:{}') {
		$mauvais = unserialize($_SESSION['mauvais']);
		$rep_mauvais = array();
		$ques_mauvais = array();
		$n = 0;
		foreach ($mauvais as $cle) {
			$query = "SELECT question_number, coption FROM options WHERE id = $cle";
			$result = mysqli_query($connection, $query);
			$rep_m = mysqli_fetch_assoc($result);
			$rep_mauvais[$n] = $rep_m['coption'];
			$ques_mauvais[$n] = $rep_m['question_number'];
			$n++;
		}
		$n = 0;
		foreach ($ques_mauvais as $cle) {
			$query = "SELECT * FROM questions WHERE question_number = $cle";
			$result = mysqli_query($connection, $query);
			$ques_m = mysqli_fetch_assoc($result);
			$ques_mauv[$n] = $ques_m["question_text"];
			$n++;
		}
	}
} else {
	header('location:../index.php');
}
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

	<div class="flexbox-faq">
    <div class="flexbox-div-faq">
			<h1>Votre Résultat</h1>
			<h2>Félicitations, Vous avez fini Sampl'Quizz.</h2>
			<h2>Votre Score est de <?php echo $_SESSION['score']; ?> sur 20 </h2>

			<?php if ($_SESSION['mauvais'] !== 'a:0:{}') {
				echo '<h2>Vous vous êtes trompé sur</h2>
				<div class="flexbox-div-finalbg">';
				array_map(function ($ques_mauv, $rep_mauvais) {
					echo 	'
					<hr/>
					<h3>' . $ques_mauv . '</h3>
					<h4>' . $rep_mauvais . '</h4>
					';
				}, $ques_mauv, $rep_mauvais); ?></div>
			<?php } else {
				echo '<h3>félicitations, vous avez tout juste</h3>';
			} ?>

		</div>
	</div>




	<?php unset($_SESSION['score']);
	unset($_SESSION['tabquest']);
	unset($_SESSION['i']);
	unset($_SESSION['mauvais']);
	unset($_SESSION['m']); ?>


</body>

</html>