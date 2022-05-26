<?php
	session_start();
	include("db_connect.php");

	//Checks to see if account name already exists. If not, uses a prepared statement to store account info into the database.

	//Uses prepared statements to improve security.
	$stmt = mysqli_prepare($connection, "INSERT INTO virtualpet (username,password,petname,health,attack,speed,intelligence) VALUES(?,?,?,?,?,?,?)"); //Prepares the statement


	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$petname = $_POST['petname'];

		//Randomizes base stats for the virtual pet.
		$health = rand(8,12);
		$attack = rand(8,12);
		$speed = rand(8,12);
		$intelligence = rand(8,12);

		//Checking to see if account name is already in database.
		$sql = "SELECT * FROM virtualpet WHERE username='".$username."' LIMIT 1";
		$result = mysqli_query($connection, $sql);

		if (mysqli_num_rows($result) == 1){
			echo "Account already exists. Please try a new username.";

		//Adding account info to database.
		}else{
			if ($stmt){

				mysqli_stmt_bind_param($stmt,"sssiiii", $username, $password, $petname, $health, $attack, $speed, $intelligence);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);

			}

			//Redirect to login page.
			echo "Account successfully created. Log in to get started! You will be redirected to the login page in 5 seconds.";
			header("Refresh: 3; url=login.php");
		}



	} else {
		// do nothing
	}


?>

<html>
    <body>
    	<form method="post" action="">
            <label for="username">Username</label>
            <input name="username" id="username" type="text" /><br />

			<label for="password">Password</label>
			<input name="password" id="password" type="password" /><br />

			<label for "petname">Pet's Name</label>
			<input name="petname" id="petname" type="text" /><br />

			<input name="submit" id="submit" type="submit" value="Create Account!" /><br />

			<p>Don't have an account? <a href="accountcreate.php">Create one!</a></p>
    </body>
</html>
