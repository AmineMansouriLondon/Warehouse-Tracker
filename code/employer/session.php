<?php
session_start();
if (!isset($_SESSION["employer"])) {
    header("location: login.php"); 
}

if(isset($GET['logout'])){
  session_unset();
  session_destroy();
}

$employerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$employer = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["employer"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters

// Connect to the MySQL database  
include "db.php"; 
$sql = mysql_query("SELECT * FROM employers WHERE id='$employerID' AND username='$employer' AND password='$password' LIMIT 1"); // query the person

// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysql_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
   echo "Your login session data is not on record in the database.";
     exit();
}
?>