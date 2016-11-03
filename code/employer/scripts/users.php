<?php
// Connect to the MySQL database  
require "config.php";  

$sqlCommand = "CREATE TABLE users (
		 		 id int(11) NOT NULL auto_increment,
				 fname varchar(120) NOT NULL,
		 		 lname varchar(120) NOT NULL,
				 email varchar(120) NOT NULL,
				 pnumber varchar(120) NOT NULL,
				 address varchar(120) NOT NULL,
		 		 username varchar(120) NOT NULL,
		 		 password varchar(120) NOT NULL,
		 		 rota_path varchar(120) NOT NULL,
		 		 role varchar(120) NOT NULL,
		 		 workstation INT(120) NOT NULL,
		 		 target_gross INT(120) NOT NULL,
		 		 PRIMARY KEY (id),
		 		 ) ";
if (mysql_query($sqlCommand)){ 
    echo "Your users table has been created successfully!"; 
} else { 
    echo "ERROR: users table has not been created.";
}
?>