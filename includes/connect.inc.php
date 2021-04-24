<?php
	$myUserName = "root";
	$myPassword = "my_secret_password";
	$myRemoteDB = "127.0.0.1";
	$port ="6033";
	$myDB = "app_db";
	$conn = mysqli_connect($myRemoteDB, $myUserName, $myPassword, $myDB, $port);
	if (!$conn) {
		die("Connection failed: ");
	} 
	// else{
	// 	echo("Connected!");
	// }
?>