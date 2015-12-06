<?
include_once 'db_utilities_event.php';

if(isset($_POST['remove']))
{
  $removed=removeAttendancie($_SESSION['user_id'],$_POST['remove']);
  if($removed)
  {
    $_SESSION['errors']=" <script type=\"text/javascript\">
    swal({
      title: \"Success!\",
      text: \"You are not attending this event anymore.\",
      type: \"success\",
      confirmButtonText: \"OK\"
    });
    </script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
  else
  {
    $_SESSION['errors']=" <script type=\"text/javascript\">
    swal({
      title: \"Error!\",
      text: \"There was an error on our website, sorry.\",
      type: \"error\",
      confirmButtonText: \"OK\"
    });
    </script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

}
else if(isset($_POST['add'])){
  $added=addAttendancie($_SESSION['user_id'],$_POST['add']);
  if($added)
  {
    $_SESSION['errors']=" <script type=\"text/javascript\">
    swal({
      title: \"Success!\",
      text: \"You are attending this event and can comment on it.\",
      type: \"success\",
      confirmButtonText: \"OK\"
    });
    </script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
  else
  {
    $_SESSION['errors']=" <script type=\"text/javascript\">
    swal({
      title: \"Error!\",
      text: \"There was an error on our website, sorry.\",
      type: \"error\",
      confirmButtonText: \"OK\"
    });
    </script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
}




?>
