<?php
include '../css.php';
include "../db.php";
include "../session.php";

$list = "";
$list2 = "";
$confirm = "";

$sql = mysql_query("SELECT * FROM users");
while($row = mysql_fetch_array($sql)){ 
 $id = $row["id"];
 $username = $row["username"];
 $fname = $row["fname"];
 $lname = $row["lname"];
 $email = $row["email"];
 $address = $row["address"];
 $pnumber = $row["pnumber"];
 $rota_path = $row["rota_path"];
 $list.="
 <form action='manage_employees.php' method='post' enctype='multipart/form-data'>
 <div data-role='collapsible'>
 <h4>$id</h4>
 <h4><input type='hidden' id='id' name='id' value='$id'><h4></h3>
 <h4><input id='username' name='username' value='$username'><h4></h3>
 <h4><input id='fname' name='fname' value='$fname'><h4>
 <h4><input id='lname' name='lname' value='$lname'><h4>
 <h4><input id='pnumber' name='pnumber' value='$pnumber'><h4>
 <h4><input id='email'name='email' value='$email'><h4>
 <h4><input id='rota_path' name='rota_path' value='$rota_path'><h4>
 <h4><textarea id='address' name='address'>$address</textarea></h4>
 <button id='submit' class='ui-btn ui-btn-inline' type='submit'>Change Now</button></br></div></form>";

} 

$sql2 = mysql_query("SELECT * FROM managers");
while($row = mysql_fetch_array($sql2)){ 
 $id2 = $row["id"];
 $username2 = $row["username"];
 $fname2 = $row["fname"];
 $lname2 = $row["lname"];
 $email2 = $row["email"];
 $address2 = $row["address"];
 $pnumber2 = $row["pnumber"];
 $rota_path2 = $row["rota_path"];
 $list2.="
 <form action='manage_employees.php' name='form2' id='form2' method='post' enctype='multipart/form-data'>
 <div data-role='collapsible'>
 <h4>$id2</h4>
 <h4><input type='hidden' id='thisID' name='thisID' value='$id2'><h4></h3>
 <h4><input id='username2' name='username2' value='$username2'><h4></h3>
 <h4><input id='fname2' name='fname2' value='$fname2'><h4>
 <h4><input id='lname2' name='lname2' value='$lname2'><h4>
 <h4><input id='pnumber2' name='pnumber2' value='$pnumber2'><h4>
 <h4><input id='email2' name='email2' value='$email2'><h4>
 <h4><input id='rota_path2' name='rota_path2' value='$rota_path2'><h4>
 <h4><textarea id='address2' name='address2'>$address2</textarea></h4>
 <button id='submit' class='ui-btn ui-btn-inline' type='submit'>Change Now</button></br></div></form>";

} 


if (isset($_POST['id'])) {
  $id = mysql_real_escape_string($_POST['id']);
  $username = mysql_real_escape_string($_POST['username']);
  $fname = mysql_real_escape_string($_POST['fname']);
  $lname = mysql_real_escape_string($_POST['lname']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $email = mysql_real_escape_string($_POST['email']);
  $rota_path = mysql_real_escape_string($_POST['rota_path']);
  $address = mysql_real_escape_string($_POST['address']);

  $sql = mysql_query("UPDATE users SET fname='$fname', lname='$lname', email='$email', username='$username', pnumber='$pnumber', rota_path='$rota_path', address='$address' WHERE id='$id'");
  $confirm.="<p align='center' style='color:blue'>Information Successfully Changed.</p>";
}

if (isset($_POST['thisID'])) {
  $id2 = mysql_real_escape_string($_POST['thisID']);
  $username2 = mysql_real_escape_string($_POST['username2']);
  $fname2 = mysql_real_escape_string($_POST['fname2']);
  $lname2 = mysql_real_escape_string($_POST['lname2']);
  $pnumber2 = mysql_real_escape_string($_POST['pnumber2']);
  $email2 = mysql_real_escape_string($_POST['email2']);
  $rota_path2 = mysql_real_escape_string($_POST['rota_path2']);
  $address2 = mysql_real_escape_string($_POST['address2']);

  $sql2 = mysql_query("UPDATE managers SET fname='$fname2', lname='$lname2', email='$email2', username='$username2', pnumber='$pnumber2', rota_path='$rota_path2', address='$address2' WHERE id='$id2'");
  $confirm.="<p align='center' style='color:blue'>Information Successfully Changed.</p>";
}

?>

<!DOCTYPE html> 
<html> 
<head> 
  <title>Warehouse Tracker</title> 
</head>
<body>
  <div data-role="page" id="roter" data-theme="b">
    <div data-role="header">
      <a href="../index.php" data-transition="slidefade" data-direction="reverse" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
      <h1>User Management</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h2>Hello, <?php echo $employer?></h2>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div data-role="main" class="ui-content">
      <h3 align="center">Edit user information:</h3>
      <h4>User ID:</h4>
      <?php echo $confirm ?>

      <?php echo $list ?>
      <?php echo $list2 ?>
    </div>
  </br>
</br>

</body>
</html>