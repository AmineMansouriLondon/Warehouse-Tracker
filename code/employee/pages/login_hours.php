<?php
include '../css.php';
include "../db.php";
include "../session.php";
$list = "";
$break_list = "";
$sql = mysql_query("SELECT * FROM positions WHERE username='$employee'");
$productCount = mysql_num_rows($sql); 
if ($productCount > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $shift = $row["shift"];
   $breaks = $row["breaktimes"];
 }
} else {
  echo "You are not working today.";
}

if($shift == "Early"){
  $list.="<h4 style='color:red' align='center'> 6:00am - 14:00pm</h4>";
} elseif($shift == "Middle"){
  $list.="<h4 style='color:red' align='center'> 14:00pm - 22:00pm</h4>";
} elseif($shift == "Late"){
  $list.="<h4 style='color:red' align='center'> 22:00pm - 6:00am</h4>";
} else {
  $list.="<h4 align='center'> There was a problem retrieving the times.</h4>";
}

if($breaks == "Covering"){
  $break_list.="<h4 align='center'> First Break: </h4>
  <h4 style='color:blue' align='center'> 10:00am - 10:30am</h4>
  <h4 align='center'> Second Break: </h4>
  <h4 style='color:blue' align='center'> 12:20pm - 12:40pm</h4>";
} elseif($breaks == "Normal"){
  $break_list.="<h3 align='center'> First Break: </h3>
  <h4 style='color:blue' align='center'> 9:30am - 10:00am</h4>
  <h3 align='center'> Second Break: </h3>
  <h4 style='color:blue' align='center'> 12:00pm - 12:20pm</h4>";
} else {
  $break_list.="<h4 align='center'> There was a problem retrieving the times.</h4>";
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
      <a href="../index.php" data-transition="slidefade" data-direction="reverse" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
      <h1>Login Hours</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h3>Hello, <?php echo $employee?></h3>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div data-role="main" align="center" class="ui-content">
      <div align="center">
        <h2>Hello, <?php echo $employee?></h2> 
        <img src="../assets/images/clock.png">
      </div>
    </br>
    <h3 align='center'> Your Working Hours Are: </h3>
    <div><?php echo $list?></div>
  </br>
</br>
<h3 align='center'> Your Breaktimes Are: </h3>
<div><?php echo $break_list?></div>
</br>
</br>
</body>
</html>