<?php
require('database.php');

$myusername=$_SESSION['login'];
$mypassword=$_POST['password'];
$mypassword2=$_POST['password2'];

if($mypassword != $mypassword2)
{
	echo("Hasła inne");
	echo('<a href="pass.php">Wróć</a>');
	exit();
}


$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypasswords=md5($mypassword);
$sql="UPDATE $users_table SET password='$mypasswords' WHERE login='$myusername' LIMIT 1";

mysql_query( $sql );
$affected_rows = mysql_affected_rows();
  if($affected_rows != 1)
  {
      echo("Niepoprawne dane");
	  echo('<a href="register.php">Powrót</a>');
  }
  else {
    header("location:login.php");}

?>
