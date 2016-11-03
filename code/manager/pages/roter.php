<?php
include '../css.php';
include "../db.php";
include "../session.php";
$dynamicList = "";
$sql = mysql_query("SELECT * FROM rotas WHERE username='$manager'");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $rota_path = $row["rota_path"];
 }
} else {
  echo "Not available.";
}
mysql_close();
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
      <h1>Rota</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h2>Hello, <?php echo $manager?></h2>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div data-role="main" class="ui-content">
      <h3 align="center">Hello <?php echo $manager?>, this is your rota for the next two weeks:</h3>
      <div style='text-align:center'><?php echo file_get_contents("$rota_path");?></div>
    </div>
  </br>
</br>

</body>
</html>