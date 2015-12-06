<?php

include_once 'db_utilities_event.php';

function search() {
	$pattern="'%" . $_GET['eventsearch'] . "%'";
	$send="";
	$result=getEventByPattern($pattern);
	if($result==-1){
		$send="No matches were found";
	}
	else
  {
		$res=array();
		foreach($result as $row)
    {
			$temp=array();
			foreach ($row as $col)
      {
				$temp[]=$col;
			}
			$res[]=$temp;
		}
	  $send = json_encode($result);
	}

	echo $send;
}
search ();
?>
