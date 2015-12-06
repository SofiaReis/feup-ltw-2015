<?php

	include_once 'db_connection.php';


	$stmt = $db->prepare ('INSERT INTO Comment (idUser,idEvent,description, date) VALUES (?,?,?,?)');
	$stmt->execute(array($_GET['idUser'],
			$_GET['idEvent'],
			htmlentities($_POST['message'],ENT_QUOTES),
			htmlentities($_GET['date'],ENT_QUOTES)));

	header("Location: ../?pagina=showEvent&id=".$_GET['idEvent']);

?>