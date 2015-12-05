	<?php include_once 'php/fetchEvents.php'; ?>

	<div  class="event-form">

		<?php 
			for($i=0; $i < count($events); ++$i)
			{?>
				<h4>Nome:</h4>
				<? echo $events[$i]['name']; ?>
				<br>
				<h4>Descrição:</h4>
				<? echo $events[$i]['description']; ?>
				<br>
				<h4>Preço:</h4>
    			<? echo $events[$i]['price']; ?>
    			<br>
    			<h4>IdUser:</h4>
    			<? echo $events[$i]['idUser']; ?>
    			<br>
    			<h4>User:</h4>
    			<? $u_id = "idUser";
				 echo getCreator($events[$i][$u_id]);
			}
		?>

	  <section>
	   <img src="http://indiabright.com/wp-content/uploads/2015/10/cute.jpg" alt="event image" >

	   <br /> <br />
	 </section>


	</div>