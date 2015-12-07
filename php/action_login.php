<?

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


if(isset($_POST['username']) && isset($_POST['password']))
{
	$username=$_POST['username'];
	$hashed_pass = hash('sha256',$_POST['password'],false);
	$user=getUserInfoByUsername($username);
	if($user!==-1)
	{
		if (!(isset($user['username'])))
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
			$_SESSION['firstname'] = $user['firstname'];
			$_SESSION['lastname'] = $user['lastname'];

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
	else
	{
		$_SESSION['errors']=" <script type=\"text/javascript\">
		swal({
			title: \"Error!\",
			text: \"There was an internal error in our website, sorry.\",
			type: \"error\",
			confirmButtonText: \"OK\"
		});
		</script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
	}
}
else
{
	$_SESSION['errors']=" <script type=\"text/javascript\">
	swal({
		title: \"Error!\",
		text: \"Input a valid username and password.\",
		type: \"error\",
		confirmButtonText: \"OK\"
	});
	</script>";
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}



?>
