<!DOCTYPE html> 
<html> 
<head> 
  <title>Warehouse Tracker</title> 
  
  <?php
  include 'css.php';
  include 'session.php';
  ?>

  <head>
    <div data-role="page" id="pageone" data-theme="b">
      <div data-role="header" data-position="right">
        <a href="index.php" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
      </br>
    </br>
    <center><h3 style="color:blue;">EMPLOYER<h3><h1>WAREHOUSE <div style="color:red;">TRACKER <img src="assets/images/warehouse.png"></div><h1></center>
  </br>
</head>
<body>
  <a href="#myPanel" class="ui-btn ui-icon-bars ui-btn-icon-left">Options</a>
</div>
<div data-role="panel" id="myPanel" data-position="right"> 
  <h3>Hello, <?php echo $employer?></h3>
  <p>
    <a class="ui-btn ui-icon-comment ui-btn-icon-left" data-transition="slidefade" href='pages/messages.php'>Messages</a>
    <a class="ui-btn ui-icon-power ui-btn-icon-left" href='login.php?logout=1'>Logout</a>
  </p>
</div>
<div data-role="main" class="ui-content">
  <a data-role="button" data-transition="slidefade" href="pages/profile.php" class="ui-btn ui-icon-user ui-btn-icon-left">My Profile</a>
  <br>
  <a data-role="button" data-transition="slidefade" href="pages/messages.php" class="ui-btn ui-icon-mail ui-btn-icon-left">Messages</a>
  <br>
  <a data-role="button" data-transition="slidefade" href="pages/manage_employees.php" class="ui-btn ui-icon-gear ui-btn-icon-left">User Management</a>
  <br>
  <a data-role="button" data-transition="slidefade" href="pages/add_user.php" class="ui-btn ui-icon-gear ui-btn-icon-left">Add A User</a>
  <br>
</div>
</body>
</br>
</br>
</html>