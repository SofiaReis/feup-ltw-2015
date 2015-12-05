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


?>
