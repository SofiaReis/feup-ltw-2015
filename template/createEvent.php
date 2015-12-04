
<script src="upload.js"></script>

<section class="" >
	<div>
		<h2> Cria aqui o teu evento! </h2>

	</div>
	<div>
		<form action="/php/action_create_event.php" method="post" enctype="multipart/form-data" name="create_event_form">
			Título: <input type="text" name="title"><br>
			Description: <input type="text" name="description"><br>
			Type: <input type="text" name="type"><br>

			Tags: <input type="text" name="type"><br>

			<div class="fileUpload btn btn-primary" name="image">
				<span>Upload</span>
				<input id="uploadBtn" type="file" class="upload" name="image"/>
			</div>

			<input type="radio" name="estado" value="private" id="private">Private
			<input type="radio" name="estado" value="public" id="public">Público
			<input type="submit" value="Submit">
		</form>
	</div>
</section><!-- services End -->
