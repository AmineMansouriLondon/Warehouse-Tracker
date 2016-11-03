<?php
include "../db.php";

$confirm = "";
$list = "";
$sql = mysql_query("SELECT * FROM positions INNER JOIN users");
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
                      <td><h4 id='id' align='center'>$id</td>
                      <td><h4 align='center'>$fname</td>
                      <td><h4 align='center'>$lname</td>
                      <form action='test.php' method='post' enctype='multipart/form-data'>
                      <td><h4 align='center'><input id='workstation' name='workstation' value='$workstation'></input></td>
                      <td><h4 align='center'><input id='role' name='role' value='$role'></input></td>
                      <td><h4 align='center'><button id='submit' class='ui-btn' type='submit'>Change Now</button></td>
                      </form>
                    </tr>";
       }
     } else {
        echo "Error.";
     }

         if (isset($_POST['workstation'])) {
  $workstation = mysql_real_escape_string($_POST['workstation']);
  $role = mysql_real_escape_string($_POST['role']);
  $sql = mysql_query("UPDATE positions SET workstation='$workstation', role='$role' WHERE id='$id'");
  header("location: manage.php");
  $confirm.="<p align='center' style='color:blue'>Information Successfully Changed.</p>";
}
?>