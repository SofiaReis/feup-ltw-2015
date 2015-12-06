<?


include_once 'db_utilities_event.php';
include_once 'db_utilities_users.php';

if (isset($_POST["event_id"])){
  if (isset($_POST["name"]))
  {
    updateTitle($_POST["name"],$_POST["event_id"]);
  }
  if (isset($_POST["description"]))
  {
    updateDescription($_POST["description"],$_POST["event_id"]);
  }
  if (isset($_POST["local"]))
  {
    updateLocal($_POST["local"],$_POST["event_id"]);
  }
  if (isset($_POST["type"]))
  {
    updateType($_POST["type"]+1,$_POST["event_id"]);
  }
  if (isset($_POST['onoff'])){
    if (isset($_POST ['estado']))
    {
      updateState(1,$_POST["event_id"]);
    }else {
      updateState(0,$_POST["event_id"]);
    }
  }
  if (isset($_POST["date"]))
  {
    updateDate($_POST["date"],$_POST["event_id"]);
  }
  if (isset($_POST["invite"]))
  {
    print_r($_POST["invite"]);
    foreach($_POST["invite"] as $invitedUsername)
    {
      $userId=getUserInfoByUsername($invitedUsername)['idUser'];
      inviteUser($userId,$_POST["event_id"]);
    }
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);

}


?>
