<?php

	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "project";

	$ok = mysql_connect($dbhost, $dbusername, $dbpassword);
	mysql_select_db($dbname);

	session_start();

?>