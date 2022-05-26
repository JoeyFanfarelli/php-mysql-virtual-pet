<?php
	session_start();

	//The user can choose which stat to train from this page.

	//Checks to ensure user is logged in.
	//If user just gained stats from training, this will show the training gains for that stat.
	if($_SESSION['logged_in'] == false) {
		print "You must login to view this page.  Click here to login: <a href=\"login.php\">login.php";
	} else if ($_SESSION['logged_in'] == true){
		if (isset($_SESSION['statgain'])){
			print "You gained ".$_SESSION['statgain'];
			unset($_SESSION['statgain']);
		}
		?>

		<html>
			<p>Name: <?php print $_SESSION['petname']; ?><br>
			   Health: <?php print $_SESSION['pethealth']; ?><br>
			   Attack: <?php print $_SESSION['petattack']; ?><br>
			   Speed: <?php print $_SESSION['petspeed']; ?><br>
			   Intelligence: <?php print $_SESSION['petintelligence']; ?><br><br>

				 <!--Allows user to select which stat to train, and calls relevant file.-->
			   Which do you want to do?<br>
			   <a href="<?php echo "health.php";?>">Eat Kale (Health)</a><br>
			   <a href="<?php echo "attack.php";?>">Lift Weights (Attack)</a><br>
			   <a href="<?php echo "speed.php";?>">Run Sprints (Speed)</a><br>
			   <a href="<?php echo "intelligence.php";?>">Read a Book (Intelligence)</a><br><br>


			   Click here to logout: <a href="logout.php">logout.php</a></p>
		</html>

		<?php
	}
?>
