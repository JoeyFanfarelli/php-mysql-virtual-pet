<?php
session_start();
include("db_connect.php");

//Increases stat by 1-3 points (randomly generated)
//statgain session var will allow train.php to notify user of stat gain.
$_SESSION['statgain'] = rand(1,3);
$_SESSION['petintelligence'] = $_SESSION['petintelligence'] + $_SESSION['statgain'];
$_SESSION['statgain'] = $_SESSION['statgain']. " intelligence!";

$petintelligence = $_SESSION['petintelligence'];
$username = $_SESSION['logged_in_user'];

//Updates the database wit the new stat and redirects to the training page.
$sql = "UPDATE virtualpet SET Intelligence = '$petintelligence' WHERE username = '$username'";
mysqli_query($connection, $sql);
header('location:train.php');

?>
