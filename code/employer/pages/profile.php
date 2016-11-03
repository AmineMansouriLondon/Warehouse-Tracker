<?php
include '../css.php';
include "../db.php";
include "../session.php";

error_reporting(E_ALL);
ini_set('display_errors', '1');

$dynamicList = "";
$sql = mysql_query("SELECT * FROM employers WHERE username='$employer'");
$productCount = mysql_num_rows($sql); 
if ($productCount > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $fname = $row["fname"];
   $lname = $row["lname"];
   $email = $row["email"];
   $address = $row["address"];
   $pnumber = $row["pnumber"];
   $photo_path = $row["photo_path"];
   $dynamicList.="
   <h3>Username: <h4>$username<h4></h3>
   <h3>First Name: <h4>$fname<h4><h3>
   <h3>Last Name: <h4>$lname<h4><h3>
   <h3>Current Phone Number: <h4>$pnumber<h4><h3>
   <h3>Current Email Address: <h4>$email<h4><h3>
   <h3>Current Home Address: <h4>$address<h4><h3>";
 }
}
?>

<!DOCTYPE html> 
<html> 
<head> 
  <title>WAREHOUSE TRACKER</title> 
</head>
<body>
  <div data-role="page" id="roter" data-theme="b">
    <div data-role="header">
      <a href="../index.php" data-transition="slidefade" data-direction="reverse" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
      <h1>My Profile</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h2>Hello, <?php echo $employer?></h2>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div align="center" data-role="main" class="ui-content">
      <h2 align="center">Hello, <?php echo $employer?>.</h2>
      <h3>ID photo:<h3>
        <img src="<?php echo $photo_path?>">
      </br>
      <?php echo $dynamicList ?>
    </br>
    <a type='button' href='profile_edit.php' data-transition='flip' class='ui-btn ui-icon-edit ui-btn-icon-left'>Edit Profile</a>
  </br>
</div>

</br>
</br>
</body>
</html>