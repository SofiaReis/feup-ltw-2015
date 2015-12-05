<?php

	print_r($_POST);	
	include_once 'db_connection.php';
	include_once 'db_utilities_event.php';

	session_start();

	if (! isset ( $_SESSION ['user_id'] )) {
		echo 'Need to Login.';
		return false;
	}

	$count = getEventLastID();

	$name = $_FILES["file"]["name"];
	$type = $_FILES["file"]["type"];
	$size = $_FILES["file"]["size"];

	$userID = $_SESSION['user_id'];

	//print_r(basename($_FILES["file"]["name"]));

	if(file_exists($images_dir)) echo 'crlh';

	$images_dir = "../images/";

	if (! isset ( $_POST ['title'])) {
		echo 'Title empty';
		return false;
	}
	if (! isset ( $_POST ['description'])) {
		echo 'Description empty';
		return false;
	}
	if (isset($_POST ['estado'])) {
		$private = 0;
	} else {
		$private = 1;
	}
	if (! isset ( $_POST ['type'])) {
		echo 'Category empty';
		return false;
	}

	if (! isset ( $_POST ['date'])) {
		echo 'Date empty';
		return false;
	}

	if (! isset ( $_POST ['local'])) {
		echo 'Local empty';
		return false;
	}

	if(!isset($_FILES["file"])){
		echo 'No file Uploaded!';
		return false;
	}
	
	$stmt = $db->prepare ('INSERT INTO Event (name,description,idImage,idType, date, idUser, public, local) VALUES (?,?,?,?,?,?,?,?)');
	$stmt->execute(array(htmlentities($_POST['title'],ENT_QUOTES),
			htmlentities($_POST['description'],ENT_QUOTES),
			'0',
			$_POST['type'],
			htmlentities($_POST['date'],ENT_QUOTES),
			htmlentities($userID,ENT_QUOTES),
			htmlentities($private,ENT_QUOTES),
			htmlentities($_POST['local'],ENT_QUOTES)));

	






	?>