<?php
include '../css.php';
include "../db.php";
include "../session.php";

error_reporting(E_ALL);
ini_set('display_errors', '1');

$dynamicList = "";
$confirm = "";
$sql = mysql_query("SELECT * FROM employers WHERE username='$employer'");
$count = mysql_num_rows($sql); 
if ($count > 0) {
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
   <h3>Username: <h4><input id='username' name='username' value='$username'><h4></h3>
   <h3>First Name: <h4><input id='fname' name='fname' value='$fname'><h4><h3>
   <h3>Last Name: <h4><input id='lname' name='lname' value='$lname'><h4><h3>
   <h3>Current Phone Number: <h4><input id='pnumber' name='pnumber' value='$pnumber'><h4><h3>
   <h3>Current Email Address: <h4><input id='email'name='email' value='$email'><h4><h3>
   <h3>Photo File Path: <h4><input id='photo_path' name='photo_path' value='$photo_path'><h4><h3>
   <h3>Current Home Address: <h4><textarea id='address' name='address'>$address</textarea></br>";
 } 
 echo "Error occured.";
}

if (isset($_POST['username'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $fname = mysql_real_escape_string($_POST['fname']);
  $lname = mysql_real_escape_string($_POST['lname']);
  $email = mysql_real_escape_string($_POST['email']);
  $address = mysql_real_escape_string($_POST['address']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $photo_path = mysql_real_escape_string($_POST['photo_path']);
  $sql = mysql_query("UPDATE employers SET username='$username', fname='$fname', lname='$lname', email='$email', address='$address', pnumber='$pnumber' WHERE id='$id'");
  $confirm.="<p align='center' style='color:blue'>Information Successfully Changed.</p>
  <meta http-equiv='refresh' content='2;url=profile.php'> ";
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
      <a href="profile.php" data-transition="flip" data-direction="reverse" class="ui-btn ui-icon-back ui-btn-icon-left">Go Back</a>
      <h1>Edit Profile Information</h1>
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
      <?php echo $confirm ?>
      <h3>ID photo:<h3>
        <img src="<?php echo $photo_path?>">
      </br>

      <form action='profile_edit.php' method='post'>
        <?php echo $dynamicList ?>
        <button id='submit' type='submit' class='ui-btn'>Change Now</button>
      </form>

    </br>
    <div data-role="popup" id="myPopup" class="ui-content">
    </div>
  </div>
</div>
</br>
</br>
</body>
</html>