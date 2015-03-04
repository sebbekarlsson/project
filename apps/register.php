<?php

	include("../modules/database.php");

	$email = $_POST['reg_email'];
	$firstname = $_POST['reg_firstname'];
	$lastname = $_POST['reg_lastname'];
	$password1 = $_POST['reg_password1'];
	$password2 = $_POST['reg_password2'];
	$birth = $_POST['reg_birth'];

	$sql = "SELECT * FROM users WHERE userEmail='$email'";
	$result = mysql_query($sql);
	$count = 0;
	while(($data = mysql_fetch_array($result)) != false){
		$count++;
	}
	if($count > 0){
		echo "<p>This user is already registered!</p>";
		return;
	}

	if(strlen($email) < 3){
		echo "<p>Email too short!</p>";
	}
	else if(strlen($firstname) < 3){
		echo "<p>Firstname too short!</p>";
	}
	else if(strlen($lastname) < 3){
		echo "<p>Lastname too short!</p>";
	}
	else if($password1 != $password2){
		echo "<p>The passwords does not match!</p>";
	}
	else if(strlen($password1) < 3){
		echo "<p>Password too short!</p>";
	}
	else if($birth == "#"){
		echo "<p>You must enter a birth!</p>";
	}else{
		mysql_query("INSERT INTO users (userEmail, userFirstname, userLastname, userPassword, userBirthyear) VALUES(
			'$email', '$firstname', '$lastname', '$password1', $birth
		) ");
		echo "Welcome!, you have registered!";
	}

?>