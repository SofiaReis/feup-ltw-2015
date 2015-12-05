<?php
	
	include_once 'db_connection.php';
	include_once 'db_utilities_event.php';

	session_start();

	/*if (! isset ( $_SESSION ['user_id'] )) {
		echo 'Need to Login.';
		return false;
	}*/

	$count = getEventLastID();

	

	$name = $_FILES["file"]["name"];
	$type = $_FILES["file"]["type"];
	$size = $_FILES["file"]["size"];

	$userID = $_SESSION['user_id'];
	print_r($userID);

	//print_r(basename($_FILES["file"]["name"]));

	if(file_exists($images_dir)) echo 'crlh';

	$images_dir = "../images/";

	if (! isset ( $_POST ['title'])) {
		echo 'Title empty';
		return false;
	}
	if (! isset ( $_POST ['description'])) {
		echo 'Title empty';
		return false;
	}
	if ($_POST ['estado'] == 'public') {
		$private = 0;
	} else {
		$private = 1;
	}

	if(!isset($_FILES["file"])){
		echo 'No file Uploaded!';
		return false;
	}
	

	echo ' CHEGUEI AQUI';
	

	
	

	function new_event(){

		
	}

	


	?>