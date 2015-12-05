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


$event=getEventInfo($_GET['id']);
$types = getEventTypes();
$type= getEventType($_GET['id']);


?>
