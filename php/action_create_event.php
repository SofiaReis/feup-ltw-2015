<?php

	include_once 'db_connection.php';
	include_once 'db_utilities_event.php';

	session_start();


	if (! isset ( $_SESSION ['user_id'] )) {
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"You need to login.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return false;
	}

	$userID = $_SESSION['user_id'];

	if (! isset ( $_POST ['title'])) {
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please specify a title.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return false;
	}
	if (! isset ( $_POST ['description'])) {
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please specify a description.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return false;
	}
	if (isset($_POST ['estado'])) {
		$public = 1;
	} else {
		$public = 0;
	}
	if (!isset ($_POST ['type'])) {
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please specify a category.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return false;
	}

	if (!isset ($_POST ['date'])) {
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please specify a date.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return false;
	}

	if (!isset ($_POST ['local'])) {
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please specify a location.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return false;
	}

	if(!isset($_FILES["file"])){
		$_SESSION['errors']=" <script type=\"text/javascript\">
      swal({
            title: \"Error!\",
            text: \"Please upload an image for the event.\",
            type: \"error\",
            confirmButtonText: \"OK\"
      });
        </script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return false;
	}

	/* IMAGES UPLOAD */
	$uploadOk = 1;

	$nFiles=sizeof($_FILES["file"]["name"]);
for($i=0;$i<$nFiles;$i++){


		$images_dir = "../images/";

		if(!file_exists($images_dir))
		{
			mkdir($images_dir);
		}

		$name[] = $file["name"];
		$type[] = $file["type"];
		$size[] = $file["size"];

		$check[] = getimagesize($file["tmp_name"]);
	}

	/* INSERT */

	$stmt = $db->prepare ('INSERT INTO Event (name,description,idType, date, idUser, public, local) VALUES (?,?,?,?,?,?,?)');
	$stmt->execute(array(htmlentities($_POST['title'],ENT_QUOTES),
			htmlentities($_POST['description'],ENT_QUOTES),
			$_POST['type'],
			htmlentities($_POST['date'],ENT_QUOTES),
			htmlentities($userID,ENT_QUOTES),
			htmlentities($public,ENT_QUOTES),
			htmlentities($_POST['local'],ENT_QUOTES)));

	$lastID = getEventLastID();
	$event_dir= $images_dir.$lastID.'/';
	if(!file_exists($event_dir))
	{
		mkdir($event_dir);
	}

	$nFiles=sizeof($_FILES["file"]["name"]);
	for($i=0;$i<$nFiles;$i=$i+1){
		if($_FILES["file"]["name"][$i]!==""){
			echo "iterador: ".$i;
			$event_Image_dir = $event_dir.basename($_FILES["file"]["name"][$i]);

			$path = "./images/".$lastID.'/'.basename($_FILES["file"]["name"][$i]);
			$imageFileType = pathinfo($event_Image_dir,PATHINFO_EXTENSION);
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				$_SESSION['errors']=" <script type=\"text/javascript\">
		      swal({
		            title: \"Error!\",
		            text: \"Sorry, only JPG, JPEG, PNG & GIF files are allowed.\",
		            type: \"error\",
		            confirmButtonText: \"OK\"
		      });
		        </script>";
				header('Location: ' . $_SERVER['HTTP_REFERER']);



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



			if (!(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $event_Image_dir))) {
				$_SESSION['errors']=" <script type=\"text/javascript\">
					swal({
								title: \"Error!\",
								text: \"Sorry, There was an error uploading the event image.\",
								type: \"error\",
								confirmButtonText: \"OK\"
					});
						</script>";
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				return false;
			}


		}else{
			header("Location: ../?pagina=showEvent&id=".$lastID);
		}
	}

  header("Location: ../?pagina=showEvent&id=".$lastID);

	?>
