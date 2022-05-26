<?php

	//Logs the user out of the database and sends them back to the login form.
	session_start();
	session_unset();

	header("Location: login.php");
?>
