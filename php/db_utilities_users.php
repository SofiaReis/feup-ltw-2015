<?

include_once 'db_connection.php';

function getUserInfoByUsername($username){

  try{
    global $db;
    $stmt=$db->prepare("SELECT * FROM User WHERE username=:uname");
    $stmt->bindValue(':uname',$username,PDO::PARAM_STR);
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

?>
