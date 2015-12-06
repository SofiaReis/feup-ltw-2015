<?php
	
	include_once 'db_connection.php';
	include_once 'db_utilities_event.php';

	session_start();

	if (! isset ( $_SESSION ['user_id'] )) {
		echo 'Need to Login.';
		return false;
	}

	$userID = $_SESSION['user_id'];

	if (! isset ( $_POST ['title'])) {
		echo 'Title empty';
		return false;
	}
	if (! isset ( $_POST ['description'])) {
		echo 'Description empty';
		return false;
	}
	if (isset($_POST ['estado'])) {
		$private = 0;
	} else {
		$private = 1;
	}
	if (!isset ($_POST ['type'])) {
		echo 'Category empty';
		return false;
	}

	if (!isset ($_POST ['date'])) {
		echo 'Date empty';
		return false;
	}

	if (!isset ($_POST ['local'])) {
		echo 'Local empty';
		return false;
	}

	if(!isset($_FILES["file"])){
		echo 'No file Uploaded!';
		return false;
	}

	/* IMAGES UPLOAD */

	$uploadOk = 1;

	$images_dir = "../images/";
	
	if(!file_exists($images_dir))
	{
		mkdir($images_dir);
	}

	$name = $_FILES["file"]["name"];
	$type = $_FILES["file"]["type"];
	$size = $_FILES["file"]["size"];
	
    $check = getimagesize($_FILES["file"]["tmp_name"]);

	/* INSERT */
	
	$stmt = $db->prepare ('INSERT INTO Event (name,description,idType, date, idUser, public, local) VALUES (?,?,?,?,?,?,?)');
	$stmt->execute(array(htmlentities($_POST['title'],ENT_QUOTES),
			htmlentities($_POST['description'],ENT_QUOTES),
			$_POST['type'],
			htmlentities($_POST['date'],ENT_QUOTES),
			htmlentities($userID,ENT_QUOTES),
			htmlentities($private,ENT_QUOTES),
			htmlentities($_POST['local'],ENT_QUOTES)));

	$lastID = getEventLastID();
	$event_dir= $images_dir.$lastID.'/';
	if(!file_exists($event_dir))
	{
		mkdir($event_dir);
	}
	$event_Image_dir = $event_dir.basename($_FILES["file"]["name"]);

	$path = "./images/".$lastID.'/'.basename($_FILES["file"]["name"]);
	$imageFileType = pathinfo($event_Image_dir,PATHINFO_EXTENSION);
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    return false;
}

	/*if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    return false;
	}*/
	
	$stmt = $db->prepare ('INSERT INTO Image (path,idEvent) VALUES (?,?)');
	$stmt->execute(array(
			htmlentities($path,ENT_QUOTES),
			$lastID));

	

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $event_Image_dir)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }



    header("Location: ../?pagina=showEvent&id=".$lastID);

	?>