<?php /*ORDER BY rand() LIMIT 5*/
session_start();
if(empty($_SESSION)){
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


	<div class="flexbox-home_kulturio">
        <div class="flexbox-div-home_kulturio">
		<h1>Kulturio</h1>
			<img src="../data/images/storytelling.png" width="20%" />
            <br/><br/>
        

<div class="flexbox-div-home_kulturiobg">
	<br/>
	<h2><a href="create_room.php"><b>Créer une salle</b></a></h2>
			<hr/>
			<h2><b>Rejoindre une salle</b></h2>
			<?php
				if(isset($_GET['Erreur'])){
					if($_GET['Erreur'] === 'champs'){
						echo'<h3>Champs non rempli</h3>';
					}
					if($_GET['Erreur'] === 'room'){
						echo'<h3>Le code n\'existe pas</h3>';
					}
				}
			?>
			<form action="join_room.php" method="post">
    &nbsp;<input class="design_connexion" type="text" name="room" placeholder="Code de la salle"required />&nbsp;<br/><br/>
    &nbsp;<input class="btndesign_connexion" type="submit" value="Valider">
    </form>
			<br/><br/>
			<?php if(!empty($_SESSION)){
            if ($_SESSION['user']['role'] === "admin"){?>
		<a href="questions_reponses.php"><b>Ajouter une Question</b></a>
		<?php }} ?>
		
		</div>
		</div>
</body>

</html>