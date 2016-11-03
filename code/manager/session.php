<?php
session_start();
if (!isset($_SESSION["manager"])) {
	header("location: login.php"); 
}

if(isset($GET['logout'])){
	session_unset();
	session_destroy();
}

$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters

include "db.php"; 
$sql = mysql_query("SELECT * FROM managers WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); // query the person


$existCount = mysql_num_rows($sql);
if ($existCount == 0) { 
	echo "Your login session data is not on record in the database.";
	exit();
}
?>