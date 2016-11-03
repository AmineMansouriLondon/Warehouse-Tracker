<?php
include '../css.php';
include "../db.php";
include "../session.php";
?>

<?
if (isset($_GET['deleteMessage'])) {
  // delete from database
  $message_to_delete = $_GET['deleteMessage'];
  $sql = mysql_query("DELETE FROM mail_to_manager WHERE id='$message_to_delete' LIMIT 1") or die (mysql_error());
  header("Location='messages_r.php'");
}


$message_list="";
$sql=mysql_query("SELECT*FROM mail_to_manager WHERE username='$manager'");
// count the output amount
$mail_count=mysql_num_rows($sql);
if ($mail_count > 0) {
  while($row = mysql_fetch_array($sql)){ 
   $id = $row["id"];
   $username = $row["username"];
   $username_f = $row["from_username"];
   $message = $row["message"];
   $date_added = strftime("%d %b, %Y, %T", strtotime($row["date_added"]));
   $message_list .= "<div data-role='collapsible'>
   <h4>Message From: $username_f</h4><h4>Time Sent:</h4> <em>$date_added</em> <br/> <h4>Message:</h4> $message </br>
   <a href='messages_r.php?deleteMessage=$id' class='ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-delete ui-btn-icon-left'>Delete</a>
   </div>";
 };
} else {
 $message_list.= "<div align='center'> No messages. </div>";
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
      <a href="../index.php" data-transition="slide" data-direction="reverse" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
      <h1>Messages</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h2>Hello, <?php echo $manager?></h2>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='login.php?logout=1'>Logout</a>
      </p>
    </div>

    <div data-role="main" class="ui-content">
      <h2 align="center">Hello, <?php echo $manager?>.<h2> 
        <a type="button" class="ui-btn ui-icon-refresh ui-btn-icon-left" data-transition="none" href="javascript:window.location.reload()">Check For Messages</a>
        <h3 align="center">Messages:</h3>
        <h4><?php echo $message_list?></h4>
        <div id="msg"><span class="msg"></span></div>
      </br>

      <a class="ui-btn ui-icon-mail ui-btn-icon-left" data-transition="flip" href='send_message.php'>Compile New Message</a>
    </br>
  </br>
</br>
</br>
</br>

</body>
</html>