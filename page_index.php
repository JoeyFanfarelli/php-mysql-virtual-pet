<?php
	session_start();

	//Lets user see pet stats. From here, they can choose to train their pet or log out.

	if(!isset($_SESSION['logged_in'])) {
		print "You must login to view this page.  Click here to login: <a href=\"login.php\">login.php";
	} else if ($_SESSION['logged_in'] == true){
		?>
		<html>
			<p>Name: <?php print $_SESSION['petname']; ?><br>
			   Health: <?php print $_SESSION['pethealth']; ?><br>
			   Attack: <?php print $_SESSION['petattack']; ?><br>
			   Speed: <?php print $_SESSION['petspeed']; ?><br>
			   Intelligence: <?php print $_SESSION['petintelligence']; ?><br><br>
			   <a href="train.php">Train your pet!</a><br><br>
			   Click here to <a href="logout.php">logout</a></p>
		</html>
		<?php
	}
?>
