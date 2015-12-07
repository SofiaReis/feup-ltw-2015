<?php include_once 'php/loadEvent.php';


if (!(isset($_SESSION['user_id']))){
	$_SESSION['errors']=" <script type=\"text/javascript\">
	swal({
		title: \"Error!\",
		text: \"You don't have permissions to access this resource. Login.\",
		type: \"error\",
		confirmButtonText: \"OK\"
	});
	</script>";
	header('Location: ./');
	exit;
}
?>

<script type="text/javascript" src="./js/createEvent.js"></script>
<script type="text/javascript" src="./js/new_event_vale.js"></script>



<section>

	<div>
		<form action="php/action_create_event.php" method="post" enctype="multipart/form-data" name="create_event_form" class="event-form event_create">
			<label>
				<span>Title :</span>
				<input type="text" name="title" id="title"><br>
			</label>

			<label>
			<span>Date :</span>
				<input type="date" id="datepicker" name="date" max="3000-12-31" min="2014-01-01">
			</label>
			<label>
				<span>Description :</span>
				<input type="text" name="description" id="description"><br>
			</label>

			<label>
				<span>Local :</span>
				<input type="text" name="local" id="local"><br>
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

		<!--
		<label>
			<span>Tags :</span>
			<input type="text" name="tags" id="tags"><br>
		</label>
	-->

	<label>
		<span>Image 1 :</span>
		<div class="fileUpload btn btn-primary" name="image">
			<input id="file" type="file" class="fileUpload" name="file[]"/>
		</div>
		<button type="button" id="add_image_input">
			<i class="fa fa-plus"> Add image</i>
		</button>
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
			<input type="submit" value="Submit" class="button" onClick="return validateCreate();">
		</form>
	</div>
</section><!-- services End -->
