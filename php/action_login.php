<?


print_r($_POST);
include_once 'db_connection.php';
include_once 'db_utilities_users.php';


if (isset($_SESSION['user_id']))
{
	$_SESSION['errors']=" <script type=\"text/javascript\">
	swal({
		title: \"Error!\",
		text: \"You are already logged in.\",
		type: \"error\",
		confirmButtonText: \"OK\"
	});
	</script>";
	header("Location: ../");
	exit;
}

$hashed_pass = hash('sha256',$_POST['password'],false);

if(isset($_POST['username']))
{
	$username=$_POST['username'];
	$user=getUserInfoByUsername($username);
	if(isset($user))
	{
		if ($user==-1)
		{
			$_SESSION['errors']=" <script type=\"text/javascript\">
			swal({
				title: \"Error!\",
				text: \"Username not found.\",
				type: \"error\",
				confirmButtonText: \"OK\"
			});
			</script>";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
		if($hashed_pass==$user['pass_hash'])
		{
			$_SESSION['success_messages']='Login successful.';
			$_SESSION['username']=$user['username'];
			$_SESSION['user_id']=$user['idUser'];
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;

		}
		else
		{
			$_SESSION['errors']=" <script type=\"text/javascript\">
			swal({
				title: \"Error!\",
				text: \"Wrong password.\",
				type: \"error\",
				confirmButtonText: \"OK\"
			});
			</script>";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}

}
else
{
	$_SESSION['errors']=" <script type=\"text/javascript\">
	swal({
		title: \"Error!\",
		text: \"Username not found.\",
		type: \"error\",
		confirmButtonText: \"OK\"
	});
	</script>";
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}



?>
