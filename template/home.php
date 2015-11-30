
<div>

	<?php 
		include 'php/db_connection.php';

		$result = $db->prepare('SELECT * FROM User');
		$result->execute();
		
		print_r($result->fetchAll());

	
?>
</div>