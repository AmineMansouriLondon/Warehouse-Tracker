<?php
include '../css.php';
include "../db.php";
include "../session.php";

$confirm="";

if (isset($_POST['fname'])) {
  $role = mysql_real_escape_string($_POST['role']);
  $fname = mysql_real_escape_string($_POST['fname']);
  $lname = mysql_real_escape_string($_POST['lname']);
  $email = mysql_real_escape_string($_POST['email']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $address = mysql_real_escape_string($_POST['address']);
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  $photo_path = mysql_real_escape_string($_POST['photo_path']);
  $rota = mysql_real_escape_string($_POST['rota_path']);
  $shift = mysql_real_escape_string($_POST['shift']);
  $break = mysql_real_escape_string($_POST['breaktimes']);


  $sql = mysql_query("INSERT INTO managers (fname, lname, email, pnumber, address, username, password, photo_path, rota_path) 
    VALUES('$fname', '$lname','$email', '$pnumber', '$address', '$username', '$password', '$photo_path', '$rota')") or die (mysql_error());
  $pid = mysql_insert_id();
  $confirm.="<p align='center' style='color:blue'>User has been added successfully.</p>";

}

?>

<style>
[data-role=page]{height: 100% !important; position:relative !important;}
[data-role=footer]{bottom:0; position:absolute !important; top: auto !important; width:100%;} 
</style>

<!DOCTYPE html> 
<html> 
<head> 
  <title>WAREHOUSE TRACKER</title> 
</head>
<body>
  <div data-role="page" id="position" data-theme="b">
    <div data-role="header">
      <a href="../index.php" data-transition="slidefade" data-direction="reverse" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
      <h1>Add A User</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h3>Hello, <?php echo $employer?></h3>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div data-role="main" align="center" class="ui-content">
      <div align="center">
        <h2>Hello, <?php echo $employer?></h2> 
      </div>
    </br>
    <h3 align='center'> Add A New User </h3>
  </br>
  <?php echo $confirm ?>

  <a href="add_employee.php" data-transition="flip" class="ui-btn ui-corner-all ui-icon-plus ui-btn-icon-left">Add A New Employee</a>
</br>
<a href="add_manager.php" data-transition="flip" class="ui-btn ui-corner-all ui-icon-plus ui-btn-icon-left">Add A New Manager</a>

</div>
</br>
</br>
</br>
</body>
</html>