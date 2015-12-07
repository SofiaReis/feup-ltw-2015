<? include_once 'php/loadEvent.php';

$isAttendant=false;
$hasAccess=false;
if(isset($_SESSION['user_id']))
{
	foreach($attendants as $attendant){
		if($attendant['idUser']==$_SESSION['user_id']){
			$isAttendant=true;
		}
	}
	if($event['public']==0)
	{
		foreach($invitedUsers as $invited){
			if($invited['idUser']==$_SESSION['user_id']){
				$hasAccess=true;
			}
		}
		if($_SESSION['user_id']==$author['idUser']){
			$hasAccess=true;
		}
	}
	else {
		$hasAccess=true;
	}
	if(!$hasAccess){
		$_SESSION['errors']=" <script type=\"text/javascript\">
		swal({
			title: \"Error!\",
			text: \"You have no permission to access this page.\",
			type: \"error\",
			confirmButtonText: \"OK\"
		});
</script>";
header('Location: ./');
}
}
else {
	if($event['public']==0){
		$_SESSION['errors']=" <script type=\"text/javascript\">
		swal({
			title: \"Error!\",
			text: \"You have no permission to access this page.\",
			type: \"error\",
			confirmButtonText: \"OK\"
		});
</script>";
header('Location: ./');
}
}

?>

<script type="text/javascript" src="./js/showEvent.js"></script>

<div class="event-form event-show">
	<div class="title_event">
		<h1><? echo $event['name']; ?></h1>
		<p><span>created by </span><? echo getAuthorInfo($event['idEvent'])['username']; ?></p>
		<div class="date" id="show">
			<? $date = $event['date'];
			list($y, $m, $d) = explode("-", $date);
			?>
			<div class="date_wrapper">
				<div id="dayy"><? echo $d; ?></div>
				<hr>
				<div id="monthh"><? echo date('M', strtotime($date)); ?></div>
			</div>
		</div>
		<div class="fb-share">
			<div class="fb-share-button" data-href="<?php echo $actual_link; ?>" data-layout="button"></div>
		</div>
	</div>
	<div class="info_event" >
		<h2>Description:</h2>
		<p><? echo $event["description"]; ?></p> <br>
		<br>
		<h2>Tipo:</h2>
		<?
		$boll_pub = $event["public"];
		if ($boll_pub) {
			?><p> <?echo "Público";?> </p>
			<?
		} else {
			?> <p> <?echo "Privado";?> </p>
			<?} ?>
			<br><br>
			<h2>Local:</h2>
			<p><? echo $event["local"]; ?></p>
			<br><br>
			<h2>Imagens:</h2>
			<br><br>
		</div>

		<div class="picture_event">
			<div style="float:left;"><img src='<?php echo $image['path'];?>'></div>
			<div style="float:right;"><img src='<?php echo $image['path'];?>'></div>
		</div>

		<div class="show_attendants">
			<button type="button" class="button" id="showAtt">Show attendants</button>
			<div class="attendancies" id="attendancies" style="display:none;">
				<ul>

					<? foreach ($attendants as $atten){ ?>
					<li><label><? echo $atten['username']; ?> is going </label></li>
					<?	} ?>

					<label>
					</ul>
				</div>
			</div>

			<div class="goingornot">
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
			</div>

			<br>
			<? if ($isAttendant){ ?>
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

		<div class="info_event comments" > <?php
		for($i=0; $i < count($comments); ++$i)
		{
			$user = getCommentAuthor($comments[$i]['idUser']);
			echo '<h2>'.$user['firstname'].' '.$user['lastname'].' ('.$comments[$i]['date'].')<br><span>@'.$user['username'].'</span><br></h2>
			<p>'.$comments[$i]['description'].'</p>';
		}

		?>  </div>

		<? } ?>

		<div class="delete_event">
			<? if ($_SESSION['user_id']==$author['idUser']){  ?>
			<form action="./php/action_remove_event.php" method="post" enctype="multipart/form-data" class="event-form">
				<label>
					<input type="hidden" name="idEvent" value="<? echo $_GET['id']; ?>" >
					<input type="submit" class="button" value="Delete event" />
				</label>
			</form>
			<? } ?>
		</div>


	</div>
