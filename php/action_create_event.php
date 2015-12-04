<?php

	print_r($_POST);
	
	include_once 'db_connection.php';
	include_once 'db_utilities_event.php';

	echo 'create_event';

	//$types = getEventTypes();
	//$tags = getTags();
	
	function new_event(){

		session_start();
	}

	header("Location: http://www.google.com/");


	?>