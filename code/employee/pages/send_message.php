<?php
include '../css.php';
include "../db.php";
include "../session.php";
?>

<?php

$manager_list="";
$pnumber_list="";
$sql=mysql_query("SELECT*FROM managers ORDER BY id ASC");

$manager_count=mysql_num_rows($sql);
if ($manager_count > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id_m = $row["id"];
   $username_m = $row["username"];
   $pnumber = $row["pnumber"];
   $manager_list.="<option value='$username_m'>$username_m</option>";
   $pnumber_list.="<option value='$pnumber'>$username_m</option>";
 }
}

?>

<?php
$confirm="";
$urgent="";
$urgent2="";
if (isset($_POST['username'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $from_username = mysql_real_escape_string($_POST['from_username']);
  $message = mysql_real_escape_string($_POST['message']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $sql = mysql_query("INSERT INTO mail_to_manager (from_username, username, message, pnumber, date_added) 
    VALUES('$from_username', '$username','$message', '$pnumber', now())") or die (mysql_error());
  $pid = mysql_insert_id();
  $urgent.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" 
               href="sms:'.$pnumber.'&body=WT: NEW MESSAGE">Urgent (iOS)</a>';
  $urgent2.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" 
               href="sms:'.$pnumber.'?body=WT: NEW MESSAGE">Urgent (Android)</a>';
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
      <a href="messages.php" data-transition="flip" data-direction="reverse" class="ui-btn ui-icon-back ui-btn-icon-left">Go Back</a>
      <h1>Send a new Message</h1>
    </div>
  </br>
  <div data-role="main" class="ui-content">
    <form action="send_message.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post"> 
      From:<br />
      <input name="from_username" type="text" id="from_username" value="<?php echo $employee?>"></input>
      <br />
      Send to:<br /> 
      <fieldset class="ui-field-contain" id="username">
        <select name="username" id="username">
          <?php echo $manager_list ?>
        </select>
      </fieldset>
    </br>

    Notify:<br /> 
    <fieldset class="ui-field-contain" id="pnumber">
      <select name="pnumber" id="pnumber">
        <?php echo $pnumber_list ?>
      </select>
    </fieldset>
  </br>

  Message:<br />
  <textarea name="message" type="text" id="message"></textarea>
  <br />
  <input class="ui-btn ui-icon-power ui-btn-icon-left" type="submit" Value="Send Message"/>
</form>
<div align='center'>
  <?php echo $confirm ?>
  <?php echo $urgent ?>
  <?php echo $urgent2 ?>
</div>
</div>

</br>
</br>

</body>
</html>