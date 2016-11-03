<?php 
session_start();
if (isset($_SESSION["manager"])) {
  header("location: index.php"); 
  session_destroy();
  exit();
}
if(isset($GET['logout'])){
  session_unset();
  session_destroy();
}
?>
<?php 
$error="";
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

    $manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "db.php"; 
    $sql = mysql_query("SELECT id FROM managers WHERE username='$manager' AND password='$password' LIMIT 1"); // query the person
    // MAKE SURE PERSON EXISTS IN DATABASE 
    $existCount = mysql_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
     while($row = mysql_fetch_array($sql)){ 
       $id = $row["id"];
     }
     $_SESSION["id"] = $id;
     $_SESSION["manager"] = $manager;
     $_SESSION["password"] = $password;
     header("location: index.php");
     exit();
   } else {
    $error.= '<p align="center" style="color:red;">That information is incorrect, please try again</p>';
  } 
}

?>

<style>
[data-role=page]{height: 100% !important; position:relative !important;}
[data-role=footer]{bottom:0; position:absolute !important; top: auto !important; width:100%;} 
</style>

<!DOCTYPE html> 
<html> 
<head> 
  <title>Warehouse Tracker</title> 
  
  <?php
  include 'css.php';
  ?>

</head> 
<body>
  <div data-role="page" id="login" data-theme="b">
    <div data-role="header">
      <h2>Please Login</h2>
    </div>
  </br>
</br>
</br>
<div align="center">
  <img src="assets/images/user.png">
</br>
</br>

<form id ="form1" name="form1" method="post" action="login.php">
  <label>Manager Username:</label>
  <input type="text" name="username" id="username" placeholder="Username" data-clear-btn="true"/>
  <br>
  <label>Password:</label>
  <input type="password" name="password" id="password" placeholder="Password" data-clear-btn="true"/>
  <br>
  <input type="submit" name="button" id="button" value="Log In" />
</div>
<?php echo $error ?>

</form>
</br>
</br>
</body>

<div data-role="footer" data-theme="b">
    <h1>Warehouse Tracker</h1>
  </div>
</html>