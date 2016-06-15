<?php
$host="ai-php.cgtkfsh055iq.us-west-2.rds.amazonaws.com:3306";
$password="rootroot";
$username="root"; 
$db_name="ai";
$notes_table="notes"; 
$users_table="users";

error_reporting(0);
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


session_start();

?>