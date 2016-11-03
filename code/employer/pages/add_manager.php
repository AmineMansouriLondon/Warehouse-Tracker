<?php
include '../css.php';
include "../db.php";
include "../session.php";

$confirm="";

if (isset($_POST['fname'])) {
  $id = mysql_real_escape_string($_POST['id']);
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
  $role = mysql_real_escape_string($_POST['role']);

  $sql = mysql_query("INSERT INTO managers (id, fname, lname, email, pnumber, address, username, password, photo_path, rota_path, role) 
    VALUES('$id', '$fname', '$lname','$email', '$pnumber', '$address', '$username', '$password', '$photo_path', '$rota', '$role')") or die (mysql_error());
  $pid = mysql_insert_id();
  $confirm.="<p align='center' style='color:blue'>Manager has been added successfully.</p>
              <meta http-equiv='refresh' content='2;url=add_user.php'>";

} 

?>

<!DOCTYPE html> 
<html> 
<head> 
  <title>WAREHOUSE TRACKER</title> 
</head>
<body>
  <div data-role="page" id="position" data-theme="b">
    <div data-role="header">
      <a href="add_user.php" data-transition="flip" data-direction="reverse" class="ui-btn ui-icon-back ui-btn-icon-left">Go Back</a>
      <h1>Add A User</h1>
    </div>


    <div data-role="main" align="center" class="ui-content">
    </br>
    <h3 align='center'> Add A New Manager </h3>
    <?php echo $confirm ?>

    <form method="post" action="add_user.php">
      <div>
        <div align="center">
          <label class="ui-hidden-accessible">Manager ID:</label>
          <input type="text" name="id" id="id" placeholder="Manager ID">
          <label class="ui-hidden-accessible">First Name:</label>
          <input type="text" name="fname" id="fname" placeholder="First Name">
          <label class="ui-hidden-accessible">Last Name:</label>
          <input type="text" name="lname" id="lname" placeholder="Last Name">
          <label class="ui-hidden-accessible">Email:</label>
          <input type="text" name="email" id="email" placeholder="Email">
          <label class="ui-hidden-accessible">Phone Number:</label>
          <input type="text" name="pnumber" id="pnumber" placeholder="Phone Number">
          <label class="ui-hidden-accessible">Address:</label>
          <textarea type="text" name="address" id="address" placeholder="Address"></textarea>
          <label class="ui-hidden-accessible">Username:</label>
          <input type="text" name="username" id="username" placeholder="Username">
          <label class="ui-hidden-accessible">Password:</label>
          <input type="text" name="password" id="password" placeholder="Password">
          <label class="ui-hidden-accessible">Path for Display Picture:</label>
          <input type="text" name="photo_path" id="photo_path" placeholder="Photo Path">
          <label class="ui-hidden-accessible">Path for Rota:</label>
          <input type="text" name="rota_path" id="rota_path" placeholder="Rota Path">
          <label class="ui-accessible">Role:</label>
          <select name="role" id="role">
            <option value="Normal">DPS</option>
            <option value="Covering">EPS</option>
            <option value="Covering">Outbound</option>
            <option value="Covering">Inbound</option>
          </select>
          <button type="submit" data-inline="true" value="Add Now">Add Now</button></div>
        </form>
      </div>


    </div>
  </br>
</br>
</body>
</html>