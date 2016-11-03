<?php
include '../css.php';
include "../db.php";
include "../session.php";
?>

<?php

$manager_list="";
$pnumber_list="";
$sql=mysql_query("SELECT*FROM managers ORDER BY id ASC");
// count the output amount
$manager_count=mysql_num_rows($sql);
if ($manager_count > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $pnumber = $row["pnumber"];
   $manager_list.="<option value='$username'>$username</option>";
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
  $from_username = mysql_real_escape_string($_POST['from_username']);
  $message = mysql_real_escape_string($_POST['message']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $sql = mysql_query("INSERT INTO mail_to_manager (from_username, username, message, pnumber, date_added) 
    VALUES('$from_username', '$username','$message', '$pnumber', now())") or die (mysql_error());
  $pid = mysql_insert_id();
  $confirm.="<p align='center' style='color:blue'>Message Sent.</p>";
  $urgent.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" href="sms:'.$pnumber.'&body=WT: NEW MESSAGE">Urgent (iOS)</a>';
  $urgent2.='<a type="button" class="ui-btn ui-btn-inline ui-icon-alert ui-btn-icon-right" style="color:red;" href="sms:'.$pnumber.'?body=WT: NEW MESSAGE">Urgent (Android)</a>';

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

    <form action="send_message_m.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post"> 
      From:<br />
      <input name="from_username" type="text" id="from_username" value="<?php echo $employer?>"></input>
      <br />
      Send to:<br /> 
      <fieldset class="ui-field-contain" id="username">
        <select name="username" id="username">
          <?php echo $manager_list ?>
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
<?php echo $urgent ?>
<?php echo $urgent2 ?>
</div>
<?php echo $confirm ?>
</br>
</br>

</body>
</html>