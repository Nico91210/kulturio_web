<!doctype html>
<html lang="fr">
<?php session_start(); ?>
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
            <a href="../index.php">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 336.054 336.054" style="enable-background:new 0 0 336.054 336.054;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M328.797,156.976v-0.04l-143.24-143.24c-9.69-9.641-25.35-9.641-35.04,0L7.277,156.936
			                c-9.687,9.665-9.705,25.353-0.04,35.04s25.353,9.705,35.04,0.04l125.76-125.8l125.72,125.8c9.676,9.676,25.364,9.676,35.04,0
			                S338.473,166.652,328.797,156.976z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M167.957,82.216l-115.92,116v115.32c0.432,9.218,8.219,16.362,17.44,16h47.52c2.209,0,4-1.791,4-4v-77.88
			c0.003-25.979,21.066-47.037,47.046-47.034c25.975,0.003,47.031,21.059,47.034,47.034v77.92c0,2.209,1.791,4,4,4h47.44
			c9.221,0.362,17.008-6.782,17.44-16v-115.36L167.957,82.216z" />
                            </g>
                        </g>
                    </svg>
            </a>
        </li>
        <?php if(!empty($_SESSION))  {?>
        <li class="list-nav">
            <a href="../amis.php">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40" height="40" viewBox="0 0 80.13 80.13" style="enable-background:new 0 0 80.13 80.13;" xml:space="preserve">
                            <g>
                                <path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112
		                                    c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984
		                                    c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984
		                                    z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263
		                                    c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833
		                                    C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088
		                                    c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699
		                                    C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276
		                                    c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752
		                                    C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032
		                                    c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265
		                                    c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z" />
                            </g>
                        </svg>
            </a>
        </li>
        <?php }?>
        <li class="list-nav">
            <a href="../faq.php">
            <svg height="40" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 405.332031c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031 21.332031 9.554687 21.332031 21.332031-9.554687 21.332031-21.332031 21.332031zm33.769531-135.636719c-7.550781 3.476563-12.4375 11.09375-12.4375 19.394532v9.578125c0 11.773437-9.535156 21.332031-21.332031 21.332031s-21.332031-9.558594-21.332031-21.332031v-9.578125c0-24.898438 14.632812-47.722656 37.226562-58.15625 21.738281-10.003906 37.4375-36.566406 37.4375-49.601563 0-29.394531-23.914062-53.332031-53.332031-53.332031s-53.332031 23.9375-53.332031 53.332031c0 11.777344-9.539063 21.335938-21.335938 21.335938s-21.332031-9.558594-21.332031-21.335938c0-52.925781 43.070312-96 96-96s96 43.074219 96 96c0 28.824219-25.003906 71.191407-62.230469 88.363281zm0 0"/>
            </svg>
            </a>
        </li>
        <div class="ordi">
                <li class="list-nav">
                    <div class="dropdown">
                        <a class="dropbtn">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40" height="40" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                                <g>
                                    <g id="account-circle">
                                        <path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
			                        c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
			                        c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <div class="dropdown-content">
                            <?php if (empty($_SESSION)) { ?>
                                <a href="connexion_compte.php">Connexion</a>
                                <a href="inscription.php">Inscription</a>
                            <?php } else { ?>
                                <a href="parametres.php">Paramètres</a>
                                <a href="deconnexion.php">Déconnexion</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            </div>
            <div class="tel">
                <?php if (empty($_SESSION)) { ?>
                    <li class="list-nav">
                        <a href="connexion_compte.php">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40" height="40" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                                <g>
                                    <g id="account-circle">
                                        <path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
			                        c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
			                        c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
            </div>
            <div class="tel">
                <li class="list-nav">
                    <a href="inscription.php">
                        <svg id="bold" enable-background="new 0 0 24 24" height="40" viewBox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg">
                            <path d="m12.25 2h-1.1c-.33-1.15-1.39-2-2.65-2s-2.32.85-2.65 2h-1.1c-.41 0-.75.34-.75.75v1.5c0 .96.79 1.75 1.75 1.75h5.5c.96 0 1.75-.79 1.75-1.75v-1.5c0-.41-.34-.75-.75-.75z" />
                            <path d="m14.25 3h-.25v1.25c0 1.52-1.23 2.75-2.75 2.75h-5.5c-1.52 0-2.75-1.23-2.75-2.75v-1.25h-.25c-1.52 0-2.75 1.23-2.75 2.75v12.5c0 1.52 1.23 2.75 2.75 2.75h7.38l.22-1.23c.1-.56.36-1.06.76-1.47l.8-.8h-8.16c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h9.5c.05 0 .09 0 .14.02h.01l3.6-3.6v-6.67c0-1.52-1.23-2.75-2.75-2.75zm-1 11.25h-9.5c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h9.5c.41 0 .75.34.75.75s-.34.75-.75.75zm0-3.25h-9.5c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h9.5c.41 0 .75.34.75.75s-.34.75-.75.75z" />
                            <path d="m12.527 24c-.197 0-.389-.078-.53-.22-.173-.173-.251-.419-.208-.661l.53-3.005c.026-.151.1-.291.208-.4l7.425-7.424c.912-.914 1.808-.667 2.298-.177l1.237 1.237c.683.682.683 1.792 0 2.475l-7.425 7.425c-.108.109-.248.182-.4.208l-3.005.53c-.043.008-.087.012-.13.012zm3.005-1.28h.01z" />
                        </svg>
                    </a>

                </li>
            <?php } else { ?>
                <li class="list-nav">
                    <a href="parametres.php">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40" height="40" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                            <g>
                                <g id="account-circle">
                                    <path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
			                        c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
			                        c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z" />
                                </g>
                            </g>
                        </svg>
                    </a>
                </li>
            <?php } ?>
            </div>

    </ul>
</div>

<div class="flexbox-connexion">
        <div class="flexbox-div-connexion">
        <br/>
        <h1 style="color: white;">Connexion</h1>
        <br/>
        <?php if(isset($_GET['verif'])){ 
            if($_GET['verif'] === '1'){?>
            <p>Merci de confirmer votre compte par mail</p>
            <?php }} ?>
    <form action="../bdd/compte/verification_compte.php" method="post">
    &nbsp;<input class="design_connexion" type="email" name="email" placeholder="Email"required />&nbsp;<br/><br/>
    &nbsp;<input class="design_connexion" type="password" name="mdp" placeholder="Mot de passe" required />&nbsp;<br/><br/>
    &nbsp;<input class="btndesign_connexion" type="submit" value="Valider">
    </form>
    <br/><br/>
    <a style="color: black;" href="inscription.php">Pas de compte ?</a>
    <br/><br/>
<a style="color: black;" id="btn_mdp_oublie" href="#">Mot de passe oublié ?</a>
<br/><br/>

    <form id="mdp_oublie" method="post">
    &nbsp;<input class="design_connexion" type="email" name="email_recup" placeholder="Email" required />&nbsp;<br/><br/>
    &nbsp;<input class="btndesign_connexion" class="design" type="submit" value="Valider">
    </form>

    <?php
        if(isset($_POST['email_recup'])){
            include('../bdd/connexion_bdd.php');
            $sql =  'SELECT email from user where email="'.$_POST['email_recup'].'"';
            $recup = $conn->query($sql);
            $recup = $recup->fetch(PDO::FETCH_ASSOC);
            if(!empty($recup)){
                $token = uniqid();
                $url_token = "https://www.kulturio.fr/compte/mdp_oublie.php?token=$token";
                $sql =  'UPDATE user SET token = ? WHERE email = ?';
                $resul = $conn->prepare($sql);
                $resul->execute([$token, $_POST['email_recup']]);

                $email = utf8_decode($_POST['email_recup']);
                $objet = utf8_decode("Récupération de Mot de passe");
                $msg = utf8_decode("Bonjour, Merci de modifié votre mot de passe : $url_token");
        
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                $from = "support@kulturio.fr";
                $to ="$email";
                $subject = "$objet";
                $message = "$msg";
                $headers = "From:" . $from;
                mail($to, $subject, $message, $headers);

                echo "Un E-mail vous a été envoyé, regarder dans vos Spams<br/><br/>";
            }else{
                echo "E-mail incorrect";
            }
            
        }
    ?>

</div>
</div>
