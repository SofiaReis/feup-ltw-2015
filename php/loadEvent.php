<?



try {

  $db = new PDO('sqlite:./db/dboltw.db');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function getEventInfo($id){
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM Event WHERE idEvent=:event_id");
    $stmt->bindValue(':event_id',$id,PDO::PARAM_STR);
    $found=$stmt->execute();
    $columns=$stmt->fetch();
    return $columns;
  }catch(PDOException $e){
    $_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: ". $stmt->errorInfo() .",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
      </script>";
    return -1;
  }
}

function getEventTypes(){
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM Type");
    $query = $stmt->execute();
    $result= $stmt->fetchAll();
    return $result;
  }
  catch(PDOException $e){
    $_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: ". $stmt->errorInfo() .",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
      </script>";
    return -1;
  }
}



function getImage($id)
{
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM Image WHERE idEvent=:event_id");
    $stmt->bindValue(':event_id',$id,PDO::PARAM_STR);
    $found=$stmt->execute();
    $columns=$stmt->fetch();
    return $columns;
  }catch(PDOException $e){
    $_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: ". $stmt->errorInfo() .",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
      </script>";
    return -1;
  }

}

$event=getEventInfo($_GET['id']);
$types = getEventTypes();
$image = getImage($_GET['id']);


function getEventType($id){
  try{
    global $db;
    $stmt=$db->prepare("SELECT name FROM Type WHERE idType=:id");
    $stmt->bindValue(':id',getEventInfo($id)['idType']);
    $query = $stmt->execute();
    $result= $stmt->fetch();
    return $result['name'];
  }
  catch(PDOException $e){
    if(isset($_SESSION['user_id'])){
			$log=$e->getMessage()." ___Date=".date("Y-m-d")." ___ idUser=".$_SESSION['user_id'].PHP_EOL;
		}else{
			$log=$e->getMessage()." ___Date= ".date("Y-m-d")."\n";
		}
		error_log($log,3,"../error.log");
    return -1;
  }
}

function getAuthorInfo($eventId)
{
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM User WHERE idUser=:id");
    $stmt->bindValue(':id',getEventInfo($eventId)['idUser']);
    $query = $stmt->execute();
    $result= $stmt->fetch();
    return $result;
  }
  catch(PDOException $e){
    if(isset($_SESSION['user_id'])){
      $log=$e->getMessage()." ___Date=".date("Y-m-d")." ___ idUser=".$_SESSION['user_id'].PHP_EOL;
    }else{
      $log=$e->getMessage()." ___Date= ".date("Y-m-d")."\n";
    }
    error_log($log,3,"../error.log");
    return -1;
  }
}

function getEventComments($id){
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM Comment WHERE idEvent=:id ORDER BY date DESC");
    $stmt->bindValue(':id',$id);
    $query = $stmt->execute();
    $result= $stmt->fetchAll();
    //print_r($result);
    return $result;
  }
  catch(PDOException $e){
    if(isset($_SESSION['user_id'])){
      $log=$e->getMessage()." ___Date=".date("Y-m-d")." ___ idUser=".$_SESSION['user_id'].PHP_EOL;
    }else{
      $log=$e->getMessage()." ___Date= ".date("Y-m-d")."\n";
    }
    error_log($log,3,"../error.log");
    return -1;
  }
}

function getCommentAuthor($id){
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM User WHERE idUser=:id");
    $stmt->bindValue(':id',$id);
    $query = $stmt->execute();
    $result= $stmt->fetch();
    //print_r($result);
    return $result;
  }
  catch(PDOException $e){
    if(isset($_SESSION['user_id'])){
      $log=$e->getMessage()." ___Date=".date("Y-m-d")." ___ idUser=".$_SESSION['user_id'].PHP_EOL;
    }else{
      $log=$e->getMessage()." ___Date= ".date("Y-m-d")."\n";
    }
    error_log($log,3,"../error.log");
    return -1;
  }
}

function getEventAttendants($idEvent){
  try{
    global $db;
    $stmt=$db->prepare("SELECT EventGo.idEvent, EventGo.idUser, User.username, User.firstname, User.lastname,User.email
FROM EventGo
LEFT OUTER JOIN User ON EventGo.idUser = User.idUser
WHERE idEvent=:id");
    $stmt->bindValue(':id',$idEvent);
    $found=$stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
  }
  catch(PDOException $e){
    if(isset($_SESSION['user_id'])){
      $log=$e->getMessage()." ___Date=".date("Y-m-d")." ___ idUser=".$_SESSION['user_id'].PHP_EOL;
    }else{
      $log=$e->getMessage()." ___Date= ".date("Y-m-d")."\n";
    }
    error_log($log,3,"../error.log");
    return -1;
  }
}

function getEventInvited($idEvent){
  try{
    global $db;
    $stmt=$db->prepare("SELECT EventInvite.idEvent, EventInvite.idUser, User.username, User.firstname, User.lastname,User.email
FROM EventInvite
LEFT OUTER JOIN User ON EventInvite.idUser = User.idUser
WHERE idEvent=:id");
    $stmt->bindValue(':id',$idEvent);
    $found=$stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
  }
  catch(PDOException $e){
    if(isset($_SESSION['user_id'])){
      $log=$e->getMessage()." ___Date=".date("Y-m-d")." ___ idUser=".$_SESSION['user_id'].PHP_EOL;
    }else{
      $log=$e->getMessage()." ___Date= ".date("Y-m-d")."\n";
    }
    error_log($log,3,"../error.log");
    return -1;
  }
}




$event=getEventInfo($_GET['id']);
$types = getEventTypes();
$type= getEventType($_GET['id']);
$author=getAuthorInfo($_GET['id']);
$authorUsername=$author['username'];
$comments = getEventComments($_GET['id']);
$attendants=getEventAttendants($_GET['id']);
$invitedUsers=getEventInvited($_GET['id']);
if ($event['public']==0){
  $state="Private";
}else{
  $state="Public";
}


?>
