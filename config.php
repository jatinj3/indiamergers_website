<?php


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'indiamergers');
 
/* Attempt to connect to MySQL database */
 $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
 
 mysqli_select_db($link,DB_NAME) or die("cannot select DB");

?>