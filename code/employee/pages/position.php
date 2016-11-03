<?php
include '../css.php';
include "../db.php";
include "../session.php";
$dynamicList = "";
$sql = mysql_query("SELECT * FROM positions WHERE username='$employee'");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $role = $row["role"];
   $workstation = $row["workstation"];
   $target_gross = $row["target_gross"];
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
  <div data-role="page" id="position" data-theme="b">
    <div data-role="header">
      <a href="../index.php" data-transition="slidefade" data-direction="reverse" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
      <h1>Position</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h3>Hello, <?php echo $employee?></h3>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div data-role="main" class="ui-content">
      <div  align="center">
      <h2>Hello, <?php echo $employee?></h2>
      <img src="../assets/images/role.png"> 
    </div>
    </br>
    <div align="center">
    <h3>Today's role: <h4 style="color:blue;"><?php echo $role?><h4></h3>
  </br>
  <h3>Today's workstation: <h4 style="color:blue;"><?php echo $workstation?><h4><h3>
  </br>
  <h3>Today's target average gross: <h4 style="color:blue;"><?php echo $target_gross?> PPH(Picks Per Hour)<h4><h3>
  </div>
    <br>
  </div>
</br>
</br>
</body>
</html>