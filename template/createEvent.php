<?php include_once 'php/loadEvent.php';
?>

<section class="" >

	<script type="text/javascript" src="./js/editEventBtn.js"></script>

	<div>
		<h2> Cria aqui o teu evento! </h2>

	</div>
	<br>
	<div>
		<form action="php/action_create_event.php" method="post" enctype="multipart/form-data" name="create_event_form" class="event-form">
			<label>
				<span>Title :</span>
				<input type="text" name="title"><br>
			</label>

			<label>
			<span>Date :</span>
				<input type="date" id="datepicker" name="date" max="3000-12-31" min="2014-01-01">
			</label>
			<label>
				<span>Description :</span>
				<input type="text" name="description"><br>
			</label>

			<label>
				<span>Local :</span>
				<input type="text" name="local"><br>
			</label>

			<label>
				<span>Category :</span>
				<div class="styled-select">
					<select id="event_type-edit"  name="type" >
						<?php

							for($i=0; $i < count($types); ++$i)
							{
								echo '<option value="'.$i.'">'.$types[$i]['name'].'</option>';
							}
						?>
				</select>
			</div>
		</label>
		<label>
			<span>Tags :</span>
			<input type="text" name="tags"><br>
		</label>

		<label>
			<span>Image :</span>
			<div class="fileUpload btn btn-primary" name="image">
				<input id="file" type="file" class="fileUpload" name="file"/>
			</div>
		</label>

			<br/><br/>
		  <div class="onoffswitch" >
		    <input type="checkbox" name="estado" class="onoffswitch-checkbox" id="myonoffswitch">
		    <label class="onoffswitch-label" for="myonoffswitch">
		      <div class="onoffswitch-inner"></div>
		      <div class="onoffswitch-switch"></div>
		    </label>
		  </div>
		  <br/><br/>

			<input type="submit" value="Submit">
		</form>
	</div>
</section><!-- services End -->
