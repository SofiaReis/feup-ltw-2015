<? include_once 'php/loadEvent.php'; 
?>

<script type="text/javascript " src="./js/addComment.js"></script>

<div  class="event-form">
	<div>
		<h1> <? echo $event["name"];?></h1>
	</div>
	<div>Description:
		<span><? echo $event["description"]; ?></span> <br>
		Date:
		<span><? echo $event["date"]; ?></span> 
		<br>
		<span><? echo $event["public"]; ?></span>
		<br>
		<span><? echo $event["local"]; ?></span>
	</div>

	<div>

		<img src=<?php echo $image['path'];?>>

	</div>
<br>
	<div>
		<form id="comment" method="post" class="STYLE-NAME">
			
			<label>
				<span>@<?php echo $_SESSION['username'];?></span>
				<textarea id="message" name="message" placeholder="You can comment here."></textarea>
			</label> 
		</label>    
		<label>
			<span>&nbsp;</span> 
			<input type="button" class="button" value="Send" /> 
		</label>    
	</form>
</div>







</div>
