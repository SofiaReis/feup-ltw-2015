<?

try {
  $db = new PDO('sqlite:./db/dboltw.db');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'merda';
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
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

?>