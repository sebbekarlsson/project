<?php

	include("../modules/API.php");
	$email = $_POST['login_email'];
	$password = $_POST['login_password'];

	$sql = "SELECT * FROM users WHERE userEmail='$email'";
	$result = mysql_query($sql);

	while(($data = mysql_fetch_array($result)) != false){
		$userID = $data['userID'];
		$realpass = $data['userPassword'];
	}

	if($password != $realpass){
		unset($_SESSION['userID']);
		$_SESSION['userID'] = null;
		echo "<p>Wrong password!</p>";
	}else{
		$_SESSION['userID'] = $userID;
		echo "<script type='text/javascript'>";
			echo "window.location.href='index.php';";
		echo "</script>";
	}


?>