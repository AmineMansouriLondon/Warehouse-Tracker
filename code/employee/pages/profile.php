]<?php
include '../css.php';
include "../db.php";
include "../session.php";
$dynamicList = "";
$sql = mysql_query("SELECT * FROM users WHERE username='$employee'");
$productCount = mysql_num_rows($sql); // count the output amount
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
 }
} else {
  echo "Error.";
}
mysql_close();
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
      <h2>Hello, <?php echo $employee?></h2>
      <p>
        <a class="ui-btn ui-icon-comment ui-btn-icon-left" data-transition="slidefade" href='pages/contact.php'>Contact Employer</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div align="center" data-role="main" class="ui-content">
      <h2 align="center">Hello, <?php echo $employee?>.</h2>
      <h3>ID photo:<h3>
        <img src="<?php echo $photo_path?>">
      </br>
      <h3>Username: <h4><?php echo $username?><h4></h3>
      <h3>First Name: <h4><?php echo $fname?><h4><h3>
        <h3>Last Name: <h4><?php echo $lname?><h4><h3>
          <h3>Current Phone Number: <h4><?php echo $pnumber?><h4><h3>
            <h3>Current Email Address: <h4><?php echo $email?><h4><h3>
              <h3>Current Home Address: <h4><?php echo $address?><h4><h3>
                <a href="#myPopup" data-rel="popup" class="ui-btn ui-icon-info ui-btn-icon-left" data-transition="slideup">Info</a>

                <div data-role="popup" id="myPopup" class="ui-content">
                  <p>Remember, if any of the above information is wrong or out-dated, please contact your employer:</p>
                  <a class="ui-btn ui-icon-comment ui-btn-icon-left" href='contact.php'>Contact Employer</a>
                </div>
              </div>
            </div>

          </body>
          </html>