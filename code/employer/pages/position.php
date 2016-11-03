<?php
include '../css.php';
include "../db.php";
include "../session.php";
$dynamicList = "";
$sql = mysql_query("SELECT * FROM managers WHERE username='$manager'");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $role = $row["role"];
 }
} else {
  echo "Error.";
}
mysql_close();
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
      <h1>Position</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h3>Hello, <?php echo $manager?></h3>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div align ="center" data-role="main" class="ui-content">
      <h2>Hello, <?php echo $manager?></h2> 
    </br>
    <h3>Today you are in: <h4 style="color:blue;"><?php echo $role?><h4></h3>
  </br>
  <h3> Manage Employees: <h3>
    <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="flip" href='manage.php'>Click Here</a>
  </div>

  <div data-role="footer">
    <h1>Footer Text</h1>
  </div>
</div> 

</body>
</html>