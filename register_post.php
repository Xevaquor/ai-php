<?php

require('database.php');

$myusername=$_POST['login'];
$mypassword=$_POST['password'];
$mypassword2=$_POST['password2'];

if($mypassword != $mypassword2)
{
	echo('Hasła są inne');
	echo('<a href="register.php">Powrót</a>');
	exit();
}

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypasswords=md5($mypassword);



$sql="INSERT INTO $users_table (id, login ,  password) VALUES (NULL, '$myusername','$mypasswords')";

mysql_query( $sql );
$affected_rows = mysql_affected_rows();
  if($affected_rows != 1)
  {
      echo("Niepoprawne dane");
	  echo('<a href="register.php">Powrót</a>');
      //header("location:register.php");
  }
  else {
    header("location:login.php");}

?>
