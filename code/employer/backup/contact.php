<?php
include '../css.php';
include "../db.php";
include "../session.php";
?>

<?php

$employer_list="";
$sql=mysql_query("SELECT*FROM employers ORDER BY id ASC");
// count the output amount
$manager_count=mysql_num_rows($sql);
if ($manager_count > 0) {
  while($row = mysql_fetch_array($sql)){ 
             $id_m = $row["id"];
       $username_m = $row["username"];
       $pnumber = $row["pnumber"];
       $employer_list.="<option value='$username_m'>$username_m</option>";
   }
 }

?>

<?php
$confirm="";
// Parse the form data and add message to the database.
if (isset($_POST['username'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $from_username = mysql_real_escape_string($_POST['from_username']);
  $message = mysql_real_escape_string($_POST['message']);
  // Add this product into the database now
  $sql = mysql_query("INSERT INTO mail_to_employer (from_username, username, message, date_added) 
        VALUES('$from_username', '$username','$message',now())") or die (mysql_error());
     $pid = mysql_insert_id();
     $confirm.="
                <div data-role='header'>
                <p align='center' style='color:blue'>Message Sent.</p>
                </div>";
} else {
     $confirm.="";
}
?>

<?php
$message_list="";
$sql=mysql_query("SELECT*FROM mail_to_employer WHERE from_username='$employee'");
$mail_count=mysql_num_rows($sql);
if ($mail_count > 0) {
  while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
       $username = $row["username"];
       $message = $row["message"];
       $date_added = strftime("%d %b, %Y, %T", strtotime($row["date_added"]));
       $message_list .= "<h4>Message To:</h4> $username </br> <h4>Time Sent:</h4> <em>$date_added</em> <br/> <p>Message:</p> $message </br> <a href='#delete_message' data-rel='popup' data-position-to='window' data-transition='fade' class='ui-btn ui-corner-all ui-shadow ui-btn-inline'>Delete?</a>
                         <div data-role='popup' id='delete_message'>
                         <h5>Are you sure?</h5>
                         <a href='contact.php?deleteMessage=$id' class='ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-check ui-btn-icon-left'>Yes</a>
                         <a href='#' data-rel='back' class='ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left'>No</a>
                         </div>";
    };
} else {
   $message_list.= "<div align='center'> No messages. </div>";
}
?>

<?

if (isset($_GET['deleteMessage'])) {
  // delete from database
  $message_to_delete = $_GET['deleteMessage'];
  $sql = mysql_query("DELETE FROM mail_to_employer WHERE id='$message_to_delete' LIMIT 1") or die (mysql_error());
  header("location: contact.php");
}
?>

<style>
[data-role=page]{height: 100% !important; position:relative !important;}
[data-role=footer]{bottom:0; position:absolute !important; top: auto !important; width:100%;} 
</style>

<!DOCTYPE html> 
<html> 
    <head> 
    <title>Warehouse Tracker</title> 
</head>
<body>
<div data-role="page" id="roter" data-theme="b">
  <div data-role="header">
    <a href="../index.php" data-transition="slidefade" data-direction="reverse" class="ui-btn ui-icon-back ui-btn-icon-left">Go Back</a>
    <h1>Contact Employer</h1>
  </div>
</br>
 <div data-role="main" class="ui-content">
    <form action="contact.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post"> 
    From:<br />
       <input name="from_username" type="text" id="from_username" value="<?php echo $manager?>"></input>
       <br />
       Send to:<br /> 
       <fieldset class="ui-field-contain" id="username">
    <select name="username" id="username">
      <?php echo $employer_list ?>
    </select>
  </fieldset>

       Message:<br />
       <textarea name="message" type="text" id="message"></textarea>
       <br />
       <input class="ui-btn ui-icon-power ui-btn-icon-left" type="submit" Value="Send Message"/>
       <a type='button' class='ui-btn ui-icon-alert ui-btn-icon-left' style='color:red;' href='sms:<?php echo $pnumber?> &body=WT: NEW MESSAGE'>Urgent</a>
        <?php echo $confirm ?>
      </form>
    </div>

    <div>
      <h4 align="center"> Sent Messages: </h4>
        <?php echo $message_list ?>
      </div>
    </br>

  <div data-role="footer">
    <h1>Footer Text</h1>
  </div>
</div> 

</body>
</html>