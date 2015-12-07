<? include_once 'php/loadEvent.php'; ?>

<section class="billboard-body-userpage">


<h1 id="userpageTitle"><span><i class="fa fa-calendar-check-o"></i> Attending Events </span></h1>
<div id="userEvents">

<?php
	

if(!empty($eventsGo)){
		for($i=0; $i < count($eventsGo); ++$i)
		{
				$event = getEventInfo($eventsGo[$i]['idEvent']);
				
					echo '<a href="./?pagina=showEvent&id='.$event['idEvent'].'""><span><b>'.$event['name'].'</b></span></a> - '.$event['description'].'<br><span>Date:&nbsp;'.$event['date'].'</span>&nbsp;'.$event['local'].'<br><br>';
		}
	}
	else{

	echo 'No events to attend.';
	}
		
?>

</div>

<br>

<h1 id="userpageTitle"><span><i class="fa fa-calendar-plus-o"></i></i> Invited Events </span></h1>

<div id="userEvents">

<?php
if(!empty($invitedEvents)){
		for($i=0; $i < count($invitedEvents); ++$i)
		{
				$event = getEventInfo($invitedEvents[$i]['idEvent']);
				
					echo '<a href="./?pagina=showEvent&id='.$event['idEvent'].'""><span><b>'.$event['name'].'</b></span></a> - '.$event['description'].'
				 <br><span>Date:&nbsp;'.$event['date'].'</span>&nbsp;'.$event['local'].'<br><br>';
				
		}
	}
	else{

				echo 'You don\'t have invites for other events.';
				}
		
?>

</div>



<br>

<h1 id="userpageTitle"><span><i class="fa fa-calendar"></i></i> My Events </span></h1>

<div id="userEvents">

<?php
if(!empty($userEvents)){
		for($i=0; $i < count($userEvents); ++$i)
		{
				$event = getEventInfo($userEvents[$i]['idEvent']);
				//if(empty($event)){
					echo '<a href="./?pagina=showEvent&id='.$event['idEvent'].'""><span><b>'.$event['name'].'</b></span></a> - '.$event['description'].'
				  <a href="./?pagina=editEvent&id='.$event['idEvent'].'"><i class="fa fa-pencil"></i></a><br><span>Date:&nbsp;'.$event['date'].'</span>&nbsp;'.$event['local'].'<br><br>';
				
		}
	}
else{

					echo '<a href="./?pagina=createEvent">You don\'t have any event yet. Please, create one now.</a>';
				}
		
?>

</div>


</section>

