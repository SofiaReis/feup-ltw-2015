<?php include_once 'php/db_utilities_event.php';
?>

<section class="" >

	
	<div>
		<h2> Cria aqui o teu evento! </h2>

	</div>
	<br>
	<div>
		<form action="php/action_create_event.php" method="post" enctype="multipart/form-data" name="create_event_form">
			Title: <input type="text" name="title"><br>
			Description: <input type="text" name="description"><br>
			Category:<br>
			<?php
				
				for($i=0; $i < count($types); ++$i)
				{
					echo '<input type="radio" name="'.$types[$i]['name'].'">'.$types[$i]['name'].'<br>';
				}
			?>

			Tags: <input type="text" name="tags"><br>

			Image:
			<div class="fileUpload btn btn-primary" name="image">
				<input id="file" type="file" class="fileUpload" name="file"/>
			</div>

			
			
			State:<br>
			<input type="radio" name="estado" value="private" id="private">Private <br>
			<input type="radio" name="estado" value="public" id="public">Público<br>
			<input type="submit" value="Submit">
		</form>
	</div>
</section><!-- services End -->
