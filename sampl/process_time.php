<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php if(empty($_SESSION)){
    header('location:../index.php');
}
	//For first question, score will not be there.
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
		$tabquest = unserialize($_SESSION['tabquest']);
		$_SESSION['i'] = $_POST['i'];
		$m = 0;
		$_SESSION['m'] = $m;
		$mauvais = array();
		$_SESSION['mauvais'] = serialize($mauvais);
	}
 if($_POST){
	 if (isset($_POST['i'])){
		  $i = $_POST['i'];
	 }
	$tabquest = unserialize($_SESSION['tabquest']);
	//We need total question in process file too
 	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
	
	//We need to capture the question number from where form was submitted
 	$number = $_POST['number'];
	
	//Here we are storing the selected option by user
 	$selected_choice = $_POST['choice'];
	
	//What will be the next question number
    if ($i <= 19) {
		$i++;
        $next = $tabquest["$i"];
        $_SESSION['i'] = $i;
    }
        //Determine the correct choice for current question
        $query = "SELECT * FROM options WHERE question_number = $number AND is_correct = 1";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
	
 	 $correct_choice = $row['id'];

	//Increase the score if selected cohice is correct
     if ($selected_choice == $correct_choice) {
		$_SESSION['score']++;
	 }
	 if ($selected_choice !== $correct_choice){
		$mauvais = unserialize($_SESSION['mauvais']);
		$m = $_SESSION['m'];
		$mauvais[$m] = $row['id'];
		$m++;
		$_SESSION['m'] = $m;
		$_SESSION['mauvais'] = serialize($mauvais);
	 }
		//Redirect to next question or final score page. 
 	 if($i == 20){
		
 	 	header("LOCATION: final_time.php");
 	 }else{
 	 	header("LOCATION: question_time.php?n=". $next);
 	 }

 }



?>