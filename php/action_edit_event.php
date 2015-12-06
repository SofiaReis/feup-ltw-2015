<?

print_r($_POST);

include_once 'db_utilities_event.php';
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
  if (isset($_POST ['estado']))
  {
    updateState(1,$_POST["event_id"]);
  }else {
    updateState(0,$_POST["event_id"]);
  }
  if (isset($_POST["date"]))
  {
    updateDate($_POST["date"],$_POST["event_id"]);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>
