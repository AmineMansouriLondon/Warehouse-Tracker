<?php
include '../css.php';
include "../db.php";
include "../session.php";


$confirm="";
$list="";
$urgent="";
$urgent2="";

$sql = mysql_query("SELECT * FROM positions ORDER BY workstation ASC");
$count = mysql_num_rows($sql); 
if ($count > 0) {

  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $role = $row["role"];
   $pnumber = $row["pnumber"];
   $workstation = $row["workstation"];
   $target_gross = $row["target_gross"];
   $shift = $row["shift"];
   $breaktimes = $row["breaktimes"];
   $list.=" <div><form action='manage.php' method='post'>
   <div data-role='collapsible'>
   <h4>$workstation - $username</h4>
   <input type='hidden' id='thisID' name='thisID' value='$id'>
   <h5>Workstation:</h5>
   <input id='workstation' name='workstation' value='$workstation'></input>
   <h5>Role:</h5>
   <input id='role' name='role' value='$role'></input>
   <h5>Target Gross:</h5>
   <input id='target_gross' name='target_gross' value='$target_gross'></input>
   <h5>Shift:</h5>
   <input id='shift' name='shift' value='$shift'></input>
   <h5>Breaktime:</h5>
   <input id='breaktimes' name='breaktimes' value='$breaktimes'></input>
   <input type='hidden' name='pnumber' id='pnumber' value='$pnumber'>
   <button id='submit' class='ui-btn ui-btn-inline' type='submit'>Change Now</button></div></form></div>";
 }
} else {
  echo "Error.";
}

if (isset($_POST['workstation'])) {
  $pid = mysql_real_escape_string($_POST['thisID']);
  $workstation = mysql_real_escape_string($_POST['workstation']);
  $role = mysql_real_escape_string($_POST['role']);
  $target_gross = mysql_real_escape_string($_POST['target_gross']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $shift = mysql_real_escape_string($_POST['shift']);
  $breaktimes = mysql_real_escape_string($_POST['breaktimes']);
  $sql = mysql_query("UPDATE positions SET workstation='$workstation', role='$role', pnumber='$pnumber', target_gross='$target_gross', shift='$shift', breaktimes='$breaktimes'  WHERE id='$pid'");

  $urgent.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" href="sms:'.$pnumber.'&body=WT: NEW POSITION">Urgent (iOS)</a>';
  $urgent2.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" href="sms:'.$pnumber.'?body=WT: NEW POSITION">Urgent (Android)</a>';
  $confirm.="<p align='center' style='color:blue'>Information Successfully Changed.</p> ";
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
      <h1>Manage</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h3>Hello, <?php echo $manager?></h3>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='../login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div data-role="main" align="center" class="ui-content">
      <div align="center">
        <h2>Hello, <?php echo $manager?></h2> 
      </div>
    </br>
    <h3 align='center'> Employees (ordered by workstation): </h3>
    <?php echo $confirm ?>
    <?php echo $urgent ?>
    <?php echo $urgent2 ?>
    
    <?php echo $list ?>

  </br>
</br>

</body>
</html>