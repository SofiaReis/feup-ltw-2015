<?

include 'db_connection.php';

function performMinimumRequirementsCheck(){
	if (version_compare(PHP_VERSION, '5.3.7', '<')) {
         echo "Sorry, Univento does not run on a PHP version older than 5.3.7 !";
    } elseif (version_compare(PHP_VERSION, '5.5.0', '<')) {
	    require_once("../libraries/password_compatibility_library.php");
	    return true;
    } elseif (version_compare(PHP_VERSION, '5.5.0', '>=')) {
    	return true;
    }
    // default return
    return false;
}

function checkData() {
	if ((empty($_POST['fullname']) || !(strlen($_POST['fullname']) <=64) || !(strlen($_POST['fullname']) >=2))){
		$_SESSION['errors']="invalid name";
		return false;

	}
	if (!(strlen($_POST['username']) <=64) || !(strlen($_POST['username']) >=2) || !(preg_match('/^[a-z\d]{2,64}$/i', $_POST['username']))){
		$_SESSION['errors']='invalid username';
		return false;
	}
	if (empty($_POST['email'])){
		$_SESSION['errors']='email empty';
		return false;
	}
	if (empty($_POST['email']) || !(strlen($_POST['email']) <=64) || !(strlen($_POST['email']) >=2)){
		$_SESSION['errors']='invalid email';
		return false;
	}

	if (empty($_POST['password'])){
		$_SESSION['errors']='password not defined';
		return false;

	}
	if (empty($_POST['cpassword'])){
		$_SESSION['errors']='Please confirm your password';
		return false;
	}
	if($_POST['cpassword']!==$_POST['password']){
		$_SESSION['errors']='Passwords do not match';
		return false;
	}

	if (! preg_match ( "/(?=^.{8,}$)((?=.*[0-9])|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST ['password'] )) {
		$_SESSION['errors']='Invalid password';
		return false;
	}
	return true;
}

performMinimumRequirementsCheck();

	if (checkData()) {
		$stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
		$stmt->execute ( array (
				$_POST ['username'] 
		) );
		$result_row = $stmt->fetchObject ();
		if ($result_row) {
			$_SESSION['errors']='This username is alredy taken, sorry.';
			header ( 'Location: ../' );
			return false;
		}
		$stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
		$stmt->execute ( array (
				$_POST ['email'] 
		) );
		$result_row = $stmt->fetchObject ();
		if ($result_row) {
			$_SESSION['errors']='This email is alredy linked to an accoun.';
			header ( 'Location: ../' );
			return false;
		}

		$password = $_POST ['password'];
		$hash = password_hash( $password, PASSWORD_DEFAULT);
		
		$query = $db->prepare ( 'INSERT INTO user (name,username,pass_hash,email) VALUES(?,?,?,?)' );
		$query->execute ( array (
				htmlentities ( $_POST ['fullname'], ENT_QUOTES ),
				htmlentities ( $_POST ['username'], ENT_QUOTES ),
				$hash,
				htmlentities ( $_POST ['email'], ENT_QUOTES ) 
		) );
		header ( 'Location: ../' );
	}
	else header('Location: ' . $_SERVER['HTTP_REFERER']);


?>
