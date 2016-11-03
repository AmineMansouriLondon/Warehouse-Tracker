<?php
include '../css.php';
include "../db.php";
include "../session.php";
$list = "";
$sql = mysql_query("SELECT * FROM users INNER JOIN positions");
$count = mysql_num_rows($sql); 
if ($count > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $fname = $row["fname"];
   $lname = $row["lname"];
   $role = $row["role"];
   $workstation = $row["workstation"];
   $username = $row["username"];
   $list.="<tr>
   <td>$id</td>
   <td>$fname</td>
   <td>$lname</td>
   <td>$role</td>
   <td>$workstation</td>
   </tr>";
 }
} else {
  echo "Error.";
}

if (isset($_POST['product_name'])) {
  $confirm="";
  $pid = mysql_real_escape_string($_POST['id']);
  $workstation = mysql_real_escape_string($_POST['workstation']);
  $role = mysql_real_escape_string($_POST['role']);
  $sql = mysql_query("UPDATE positions SET workstation='$workstation', role='$role' WHERE id='$pid'");
  $confirm.="<p align='center' style='color:blue'>Message Sent.</p>";
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


    <div data-role="main" align="center" class="ui-content">
      <div align="center">
        <h2>Hello, <?php echo $manager?></h2> 
      </div>
    </br>
    <h3 align='center'> Employees: </h3>
    <div>
      <table data-role='table' class='ui-responsive'>
        <thead>
          <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Role</th>
            <th>Workstation</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $list ?>
        </tbody>
      </table>
    </div>
  </br>

  <div data-role="footer">
    <h1>Footer Text</h1>
  </div>
</div> 

</body>
</html>