<? include_once 'php/loadEvent.php';

?>

<script type="text/javascript" src="./js/showEvent.js"></script>

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
		<br>

		<a href=""><span></span></a><a href=""><span></span></a>
	</div>

	<button type="button" class="button" id="showAtt">Show attendants</button>

	<? if (isset($_SESSION['user_id'])){ ?>
	<form action="./php/action_attend.php" method="post" enctype="multipart/form-data" class="event-form">
		<? if ($isAttendant){ ?>
			<input type="hidden" value="<? echo $_GET['id'];  ?>" name="remove">
			<input type="submit" name="submit" class="button" value="Not going" />

			<? } else {?>
				<input type="hidden" value="<? echo $_GET['id'];  ?>" name="add">
				<input type="submit" name="submit" class="button" value="Attend" />
			<? } ?>
	</form>
	<? } ?>
	<div class="attendancies" style="display:none;">
			 <ul>

		 			<? foreach ($attendants as $atten){ ?>
		 				<li><label><? echo $atten['username']; ?> is going </label></li>
		 		<?	} ?>

		 			<label>
		 		</ul>
	</div>






<br>
	<div>
		<form id="comment" action="./php/action_add_comment.php?idEvent=<?php echo $_GET['id'];?>&idUser=<?php echo $_SESSION['user_id'];?>&date=<?php echo date("Y-m-d h:i:sa");?>" method="post" class="STYLE-NAME">

			<label>
				<span>@<?php echo $_SESSION['username'];?></span>
				<textarea id="message" name="message" placeholder="You can comment here."></textarea>
				<!--<label class="error" for="message" id="message_error">This field is required.</label>-->
			</label>
		</label>
		<label>
			<span>&nbsp;</span>
			<input type="submit" name="submit" class="button" value="Send" />
		</label>
	</form>


</div>

<div>  <?php
		for($i=0; $i < count($comments); ++$i)
		{
			$user = getCommentAuthor($comments[$i]['idUser']);
			echo '<p>'.$user['firstname'].' '.$user['lastname'].'<br><span>@'.$user['username'].'</span></p><br>
			<p>'.$comments[$i]['description'].'</p><br><span>'.$comments[$i]['date'].'</span><br>';
		}

?>  </div>



</div>
