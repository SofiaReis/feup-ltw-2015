<?php

try {

  $db = new PDO('sqlite:./db/dboltw.db');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


function getAllEvents(){
  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM Event");
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


function getCreator($idU){
  $stmt = $db->prepare('SELECT username FROM User
    WHERE idUser=:idU');
  $stmt->bindValue(':idU',$idU);
  $stmt->execute();
  $r=$stmt->fetch();
  return $r['username'];
}

$events=getAllEvents();

?>