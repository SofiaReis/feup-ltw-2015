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

		<div class="fb-share-button" data-href="<?php echo $actual_link; ?>" data-layout="button"></div>
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
	<div class="attendancies" id="attendancies" style="display:none;">
			 <ul>

		 			<? foreach ($attendants as $atten){ ?>
		 				<li><label><? echo $atten['username']; ?> is going </label></li>
		 		<?	} ?>

		 			<label>
		 		</ul>
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

<div>  <?php
		for($i=0; $i < count($comments); ++$i)
		{
			$user = getCommentAuthor($comments[$i]['idUser']);
			echo '<p>'.$user['firstname'].' '.$user['lastname'].'<br><span>@'.$user['username'].'</span></p><br>
			<p>'.$comments[$i]['description'].'</p><br><span>'.$comments[$i]['date'].'</span><br>';
		}

?>  </div>

<? } ?>
<? if ($_SESSION['user_id']==$author['idUser']){  ?>
  <form action="./php/action_remove_event.php" method="post" enctype="multipart/form-data" class="event-form">
    <label>
      <input type="hidden" name="idEvent" value="<? echo $_GET['id']; ?>" >
      <span>&nbsp;</span>
      <input type="submit" class="button" value="Delete event" />
    </label>
  </form>
<? } ?>


</div>
