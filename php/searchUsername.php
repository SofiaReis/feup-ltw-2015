<?php

include_once 'db_utilities_users.php';

function search() {
	$pattern="'%" . $_GET['usersearch'] . "%'";
	$send="";
	$result=getUsernameByPattern($pattern,$_GET['id']);
	if($result==-1){
		$send="";
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
