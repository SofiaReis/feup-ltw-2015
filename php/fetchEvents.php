<?php
include 'db_connection.php';
runDB();

function getAllEvents(){
  $stmt = $GLOBALS['db']->prepare('SELECT * FROM Event');
  $stmt->execute();
  return $stmt->fetchAll();
}

function getCreator($idU){
  $stmt = $GLOBALS['db']->prepare('SELECT username FROM User
    WHERE idUser=:idU');
  $stmt->bindValue(':idU',$idU);
  $stmt->execute();
  $r=$stmt->fetch();
  return $r['username'];
}

?>