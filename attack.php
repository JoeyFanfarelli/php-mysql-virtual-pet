<?php
session_start();
include("db_connect.php");

//Increases stat by 1-3 points (randomly generated)
//statgain session var will allow train.php to notify user of stat gain.
$_SESSION['statgain'] = rand(1,3);
$_SESSION['petattack'] = $_SESSION['petattack'] + $_SESSION['statgain'];
$_SESSION['statgain'] = $_SESSION['statgain']. " attack!";

$petattack = $_SESSION['petattack'];
$username = $_SESSION['logged_in_user'];

//Updates the database wit the new stat and redirects to the training page.
$sql = "UPDATE virtualpet SET Attack = '$petattack' WHERE username = '$username'";
mysqli_query($connection, $sql);
header('location:train.php');

?>
