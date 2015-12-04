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

$event=getEventInfo($_GET['id']);


?>
