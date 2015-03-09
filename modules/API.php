<?php
	
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "project";

	$ok = mysql_connect($dbhost, $dbusername, $dbpassword);
	mysql_select_db($dbname);

	session_start();

	$loggedin = (isset($_SESSION['userID']));

	if($loggedin){
		$USER = new User($_SESSION['userID']);
	}

	class User{
		var $userID;
		var $userEmail;
		var $userPassword;
		var $userLastname;
		var $userFirstname;
		var $userBirthyear;
		var $userBio;
		var $userPicture;
		var $userProfession;

		function __construct($userID){
			$this->userID = $userID;
			$sql = "SELECT * FROM users WHERE userID=$userID";
			$result = mysql_query($sql);
			while(($data = mysql_fetch_array($result)) != false){
				$this->userEmail = $data['userEmail'];
				$this->userPassword = $data['userPassword'];
				$this->userLastname = $data['userLastname'];
				$this->userFirstname = $data['userFirstname'];
				$this->userBirthyear = $data['userBirthyear'];
				$this->userBio = $data['userBio'];
				$this->userPicture = $data['userPicture'];
				$this->userProfession = $data['userProfession'];
			}
		}
	}

	function uploadImage($file,$dir,$output){
		if(!file_exists($dir)){
			mkdir($dir);
		}
		$target_dir = "$dir/";
		$target_file = $target_dir . $output;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($file["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($file["tmp_name"], $target_file)) {
		        echo "The file ". basename( $file["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

	}

	function randomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}


?>