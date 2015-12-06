<? include_once 'php/loadEvent.php'; ?>

<section class="billboard-body-userpage">
<h1><span><i class="fa fa-calendar-check-o"></i> Attending Events </span></h1>
<div>

<?php

		for($i=0; $i < count($eventsGo); ++$i)
		{
				$event = getEventInfo($eventsGo[$i]['idEvent']);
				echo '<span><b>'.$event['name'].'</b></span><br><p>'.$event['description'].'</p>';
		}
		
?>

</div>


<br>

<h1><span><i class="fa fa-calendar-plus-o"></i></i> My Events </span></h1>

<div>

<?php

		for($i=0; $i < count($userEvents); ++$i)
		{
				$event = getEventInfo($userEvents[$i]['idEvent']);
				echo '<span><b>'.$event['name'].'</b></span><br><p>'.$event['description'].'</p>';
		}
		
?>

</div>


</section>

