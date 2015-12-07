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

function getUsernameByPattern($pattern,$id){
  try{
    global $db;
    $stmt=$db->prepare("SELECT DISTINCT User.idUser,username,firstname,lastname,email FROM User,EventInvite WHERE username LIKE ".$pattern." AND NOT EXISTS( SELECT * FROM
EventInvite WHERE User.idUser=EventInvite.idUser AND EventInvite.idEvent= :id )" );
    $stmt->bindValue(':id',$id);
 
    $found=$stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
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

?>
