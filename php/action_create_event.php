<?php

	print_r($_POST);
	
	include_once 'db_connection.php';
	include_once 'db_utilities_event.php';

	session_start();

	//$types = getEventTypes();
	//$tags = getTags();
	
	if (! isset ( $_SESSION ['user_id'] )) {
		echo 'Need to Login.';
		return false;
	}

	$userID = $_SESSION['user_id'];
	print_r($userID);

	
	

	function new_event(){

		
	}

	


	?>