<?php
	$dbhost	= "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "kulturio";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	$connection -> set_charset("utf8");
	if(mysqli_connect_errno()){ 
		die("Database Connection Failed" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
	}

?>