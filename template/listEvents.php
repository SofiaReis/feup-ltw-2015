	<?php include_once 'php/fetchEvents.php'; ?>

	<div  class="event-form">

		<?php 
			for($i=0; $i < count($events); ++$i)
			{
				echo $events[$i]['name'];
			}
		?>
	    <h2>Description:</h2>

	  <section>
	   <img src="http://indiabright.com/wp-content/uploads/2015/10/cute.jpg" alt="event image" >

	   <br /> <br />
	 </section>


	</div>