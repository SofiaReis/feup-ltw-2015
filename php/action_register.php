<?

include_once 'db_connection.php';
include_once 'db_utilities_users.php';

print_r($_POST);


function checkData() {

	if ((empty($_POST['firstname']) || !(strlen($_POST['firstname']) <=64) || !(strlen($_POST['firstname']) >=2))){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"The firstname you entered is invalid\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		return false;

	}
	if ((empty($_POST['lastname']) || !(strlen($_POST['lastname']) <=64) || !(strlen($_POST['lastname']) >=2))){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"The lastname you entered is invalid\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		return false;

	}

	if (!(strlen($_POST['username']) <=64) || !(strlen($_POST['username']) >=2) || !(preg_match('/^[a-z\d]{2,64}$/i', $_POST['username']))){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"The username you entered is invalid\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		return false;
	}
	if (empty($_POST['email']) || !(strlen($_POST['email']) <=64) || !(strlen($_POST['email']) >=2)){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please input a valid e-mail.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		return false;
	}

	if (empty($_POST['password'])){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Password not defined.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		return false;

	}
	if (empty($_POST['cpassword'])){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please confirm your password.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		return false;
	}
	if($_POST['cpassword']!==$_POST['password']){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Passwords do not match.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		return false;
	}


	return true;
}



	if (checkData()) {
		$stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
		$stmt->execute ( array (
				$_POST ['username']
		) );
		$result_row = $stmt->fetchObject ();
		if ($result_row) {
			$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Username already taken, sorry.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
			header ( 'Location: ../' );
			return false;
		}

		$stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
		$stmt->execute ( array (
				$_POST ['email']
		) );
		$result_row = $stmt->fetchObject ();
		if ($result_row) {
			$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"This email is already linked to an account, sorry.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
			header ( 'Location: ../' );
			return false;
		}

		$password = $_POST ['password'];
		$hash = hash('sha256',$password,false);
		$query = $db->prepare('INSERT INTO user (username,pass_hash,email,firstname,lastname) VALUES (?,?,?,?,?)');
		$query->execute (array(
				htmlentities ($_POST ['username'], ENT_QUOTES ),
				$hash,
				htmlentities ($_POST['email'], ENT_QUOTES ),
				htmlentities ($_POST['firstname'], ENT_QUOTES ),
				htmlentities ($_POST['lastname'], ENT_QUOTES )));
		$user=getUserInfoByUsername($_POST ['username']);
		$_SESSION['username']=$_POST ['username'];
    	$_SESSION['user_id']= $user['idUser'];
    	$_SESSION['firstname'] = $_POST ['firstname'];
    	$_SESSION['lastname'] = $_POST ['lastname'];
		header ( 'Location: ../' );
	}

	else header('Location: ' . $_SERVER['HTTP_REFERER']);


?>
