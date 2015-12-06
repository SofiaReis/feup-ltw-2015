<?

include_once 'db_connection.php';

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

function getTags(){
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM Tags");
    $query = $stmt->execute();
    $result= $stmt->fetchAll();
    print_r($result);
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

function getEventLastID(){
  try{
    echo 'merda';
    global $db;

    $result = $db->lastInsertId("idEvent");

    print_r($result);
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

$types = getEventTypes();

function updateTitle($newTitle,$id){
  try{
    global $db;
    $stmt=$db->prepare("UPDATE Event SET name = :name WHERE idEvent = :id");
    $stmt->bindValue(':name',$newTitle,PDO::PARAM_STR);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);
    $query = $stmt->execute();
    return $query;
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

function updateDescription($newDescription,$id){
  try{
    global $db;
    $stmt=$db->prepare("UPDATE Event SET description = :description WHERE idEvent = :id");
    $stmt->bindValue(':description',$newDescription,PDO::PARAM_STR);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);
    $query = $stmt->execute();
    return $query;
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

function updateState($newState,$id){
  try{
    global $db;
    $stmt=$db->prepare("UPDATE Event SET public = :public WHERE idEvent = :id");
    $stmt->bindValue(':public',$newState,PDO::PARAM_STR);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);
    $query = $stmt->execute();
    return $query;
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

function updateDate($newDate,$id){
  try{
    global $db;
    $stmt=$db->prepare("UPDATE Event SET date = :date WHERE idEvent = :id");
    $stmt->bindValue(':date',$newDate,PDO::PARAM_STR);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);
    $query = $stmt->execute();
    return $query;
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

function updateLocal($newLocal,$id){
  try{
    global $db;
    $stmt=$db->prepare("UPDATE Event SET local = :local WHERE idEvent = :id");
    $stmt->bindValue(':local',$newLocal,PDO::PARAM_STR);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);
    $query = $stmt->execute();
    return $query;
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



function updateType($newType,$id){
  try{
    global $db;
    $stmt=$db->prepare("UPDATE Event SET idType = :type WHERE idEvent = :id");
    $stmt->bindValue(':type',$newType);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);
    $query = $stmt->execute();
    return $query;
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


function getEventByPattern($pattern){
  try{
    global $db;
    $stmt=$db->prepare("SELECT Event.idEvent, Event.name, Event.local, Event.description, Image.path,Event.date,User.username,User.idUser
FROM Event
LEFT OUTER JOIN User ON Event.idUser = User.idUser
LEFT OUTER JOIN Image ON Event.idEvent = Image.idEvent
WHERE public=1 AND ( name LIKE ".$pattern." OR local LIKE ".$pattern.") " );
    $found=$stmt->execute();
    $result = $stmt->fetchAll();
  }catch(PDOException $e){
    if(isset($_SESSION['user_id'])){
      $log=$e->getMessage()." ___Date=".date("Y-m-d")." ___ idUser=".$_SESSION['user_id'].PHP_EOL;
    }else{
      $log=$e->getMessage()." ___Date= ".date("Y-m-d")."\n";
    }
    error_log($log,3,"../error.log");
    return -1;
  }
  if(!empty($result))
   return $result;
  else return -1;
}

function removeAttendancie($iduser,$idEvent){
  try{
    global $db;
    $stmt=$db->prepare("DELETE FROM EventGo WHERE idEvent =  :idEvent AND idUser = :idUser");
    $stmt->bindValue(':idEvent',$idEvent);
    $stmt->bindValue(':idUser',$iduser);
    $sucess=$stmt->execute();
    return $sucess;
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

function addAttendancie($iduser,$idEvent){
  try{
    global $db;
    $stmt=$db->prepare("INSERT INTO EventGo(idEvent,idUser) VALUES (:idEvent, :idUser)");
    $stmt->bindValue(':idEvent',$idEvent);
    $stmt->bindValue(':idUser',$iduser);
    $sucess=$stmt->execute();
    return $sucess;
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










?>
