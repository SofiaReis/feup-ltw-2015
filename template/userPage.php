<? include_once 'php/loadEvent.php'; ?>

<section class="billboard-body-userpage">


<h1 id="userpageTitle"><span><i class="fa fa-calendar-check-o"></i> Attending Events </span></h1>
<div id="userEvents">

<?php

		for($i=0; $i < count($eventsGo); ++$i)
		{
				$event = getEventInfo($eventsGo[$i]['idEvent']);
				
				echo '<a href="./?pagina=showEvent&id='.$event['idEvent'].'""><span><b>'.$event['name'].'</b></span></a> - '.$event['description'].'<br><span>Date:'.$event['date'].'&nbsp;</span>'.$event['local'];
		}
		
?>

</div>




<br>

<h1 id="userpageTitle"><span><i class="fa fa-calendar-plus-o"></i></i> My Events </span></h1>

<div id="userEvents">

<?php

		for($i=0; $i < count($userEvents); ++$i)
		{
				$event = getEventInfo($userEvents[$i]['idEvent']);
				echo '<a href="./?pagina=showEvent&id='.$event['idEvent'].'""><span><b>'.$event['name'].'</b></span></a> - '.$event['description'].'
				  <a href="./?pagina=editEvent&id='.$event['idEvent'].'"><i class="fa fa-pencil"></i></a><br>';
		}
		
?>

</div>


</section>

