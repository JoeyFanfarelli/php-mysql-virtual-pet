<?php
	session_start();
	include("db_connect.php");

	//Compares user-entered information to database records. If uname/password are correct, pulls all relevant account information.

	if((isset($_POST['submit'])) && (!isset($_SESSION['logged_in']))) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM virtualpet WHERE username='".$username."' AND password='".$password."' LIMIT 1";
		$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_row($result);
			$_SESSION['logged_in'] = true;
			$_SESSION['logged_in_user'] = $username;
			$_SESSION['petname'] = $row[3];
			$_SESSION['pethealth'] = $row[4];
			$_SESSION['petattack'] = $row[5];
			$_SESSION['petspeed'] = $row[6];
			$_SESSION['petintelligence'] = $row[7];

			echo "You are now logged in " . $_SESSION['logged_in_user'] . ". You will be redirected to the homepage.";
		}else{
			echo "Invalid username and password";
		}
	} else {

	}

	//If the user successfully logs in, redirects after a brief pause.
	if (isset($_SESSION['logged_in'])) {
		header("Refresh: 5; url=page_index.php");
	}
?>

<html>
    <body>
    	<form method="post" action="">
            <label for="username">Username</label>
            <input name="username" id="username" type="text" /><br />
			<label for="password">Password</label>
			<input name="password" id="password" type="password" /><br />
			<input name="submit" id="submit" type="submit" value="Login" /><br />
			<p>Don't have an account? <a href="accountcreate.php">Create one!</a></p>
    </body>
</html>
