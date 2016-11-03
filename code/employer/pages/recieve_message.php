<?php
$message_list="";
$sql=mysql_query("SELECT*FROM mail_to_employer WHERE username='$employer' ORDER BY date_added DESC");
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
   <h4>Message From: $username_f </h4> <h4>Time Sent:</h4> <em>$date_added</em> <br/> <h4>Message:</h4> $message </br> <a href='#delete_message' data-rel='popup' data-position-to='window' data-transition='fade' class='ui-btn ui-corner-all ui-shadow ui-btn-inline'>Delete?</a>
   <div data-role='popup' id='delete_message'>
   <h5>Are you sure?</h5>
   <a href='messages.php?deleteMessage=$id' class='ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-check ui-btn-icon-left'>Yes</a>
   <a href='#' data-rel='back' class='ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left'>No</a>
   </div></div>";
 };
} else {
 $message_list.= "<div align='center'> No messages. </div>";
}
?>