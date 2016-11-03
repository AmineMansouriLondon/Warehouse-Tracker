<?php
include '../css.php';
include "../db.php";
include "../session.php";
?>

<?

if (isset($_GET['deleteMessage'])) {
  // delete from database
  $message_to_delete = $_GET['deleteMessage'];
  $sql = mysql_query("DELETE FROM mail_to_employer WHERE id='$message_to_delete' LIMIT 1") or die (mysql_error());
  header("location: messages.php");
}
?>

<?php
include 'recieve_message.php';
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
      <h1>Messages</h1>
      <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
    </div>

    <div data-role="panel" id="myPanel" data-position="right"> 
      <h2>Hello, <?php echo $employer?></h2>
      <p>
        <a class="ui-btn ui-icon-user ui-btn-icon-left" data-transition="slidefade" href='profile.php'>Go To My Profile</a>
        <a class="ui-btn ui-icon-power ui-btn-icon-left" href='login.php?logout=1'>Logout</a>
      </p>
    </div>


    <div data-role="main" class="ui-content">
      <h2 align="center">Hello, <?php echo $employer?>.<h2> 
        <a type="button" class="ui-btn ui-icon-refresh ui-btn-icon-left" data-transition="none" href="javascript:window.location.reload()">Check For Messages</a>

        <h3 align="center">Messages:</h3>
        <h4><?php echo $message_list?></h4>
        <div id="msg"><span class="msg"></span></div>
      </br>

      <a class="ui-btn ui-icon-mail ui-btn-icon-left" data-transition="flip" href='send_message.php'>Message Employee</a>
      <a class="ui-btn ui-icon-mail ui-btn-icon-left" data-transition="flip" href='send_message_m.php'>Message Manager</a>
    </br>
  </br>
</div>
</body>
</html>