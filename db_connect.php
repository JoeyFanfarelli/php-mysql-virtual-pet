<?php

	//Code to connect to the database. Used by most other pages.
	$username = "username";
	$password = "password";
	$database = "dbname";

	$connection = mysqli_connect("localhost" , "$username" , "$password", "$database") or die(mysql_error());  //(host,username,password,) Connects to mysql server. Throws error if it cannot connect.
?>
