<?php

	include_once 'db_connection.php';
	session_start();



	
		$id = 4;
		$stmt=$db->prepare('SELECT * FROM Event WHERE idEvent= ?');
		$stmt->execute(array($id));

		$event=$stmt->fetchObject();
		print_r($event);

		$userID = $_SESSION['user_id'];

		print_r($userID);

		//verificar se é o criador... Caso contrário, não pode!

		$stmt=$db->prepare('DELETE FROM Comment WHERE idEvent=?');
		$stmt->execute(array($id));

		$stmt=$db->prepare('DELETE FROM EventGo WHERE idEvent=?');
		$stmt->execute(array($id));

		$stmt=$db->prepare('DELETE FROM Tagged WHERE idEvent=?');
		$stmt->execute(array($id));

		$stmt=$db->prepare('DELETE FROM Event WHERE idEvent=?');
		$stmt->execute(array($id));

?>