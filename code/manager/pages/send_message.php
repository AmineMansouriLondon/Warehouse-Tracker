<?php
include '../css.php';
include "../db.php";
include "../session.php";
?>

<?php

$employee_list="";
$pnumber_list="";
$sql=mysql_query("SELECT*FROM users ORDER BY id ASC");
// count the output amount
$manager_count=mysql_num_rows($sql);
if ($manager_count > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $pnumber = $row["pnumber"];
   $employee_list.="<option value='$username'>$username</option>";
   $pnumber_list.="<option value='$pnumber'>$username</option>";
 } 
}

?>

<?php
$confirm="";
$urgent="";
$urgent2="";
if (isset($_POST['username'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $username_from = mysql_real_escape_string($_POST['username_from']);
  $message = mysql_real_escape_string($_POST['message']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $sql = mysql_query("INSERT INTO mail (username_from, username, message, pnumber, date_added) 
    VALUES('$username_from', '$username','$message', '$pnumber', now())") or die (mysql_error());
  $pid = mysql_insert_id();
  $urgent.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" href="sms:'.$pnumber.'&body=WT: NEW MESSAGE">Urgent (iOS)</a>';
  $urgent2.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" href="sms:'.$pnumber.'?body=WT: NEW MESSAGE">Urgent (Android)</a>';
  $confirm.="<p align='center' style='color:blue'>Message Sent.</p>";

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
      <a href="messages_r.php" data-transition="flip" data-direction="reverse" class="ui-btn ui-icon-back ui-btn-icon-left">Go Back</a>
      <h1>Send a new Message</h1>
    </div>
  </br>
  <div data-role="main" class="ui-content">

    <form action="send_message.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post"> 
      From:<br />
      <input name="username_from" type="text" id="username_from" value="<?php echo $manager?>"></input>
      <br />
      Send to:<br /> 
      <fieldset class="ui-field-contain" id="username">
        <select name="username" id="username">
          <?php echo $employee_list ?>
        </select>
      </fieldset>
    </br>
    SMS to:<br /> 
    <fieldset class="ui-field-contain" id="pnumber">
      <select name="pnumber" id="pnumber">
        <?php echo $pnumber_list ?>
      </select>
    </fieldset>
  </br>
  Message:<br />
  <textarea name="message" type="text" id="message"></textarea>
  <br />
  <button id="submit" class="ui-btn" type="submit">Send Message</button>
</form>
<div align="center">
  <?php echo $urgent ?>
  <?php echo $urgent2 ?>
</div>
</div>
<?php echo $confirm ?>
</br>
</br>

</body>
</html>