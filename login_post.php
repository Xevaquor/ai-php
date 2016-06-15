<?php

require('database.php');

$myusername=$_POST['login'];
$mypassword=$_POST['password'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypasswords=md5($mypassword);
$sql="SELECT * FROM $users_table WHERE login='$myusername' and password='$mypasswords'";

$result=mysql_query($sql);
$count=mysql_num_rows($result);



if($count==1){

$id = mysql_result($result,0);
$_SESSION["login"]=$myusername;
$_SESSION["id"]=$id;	
header("location:index.php");
}
else {
unset($_SESSION["login"]);
unset($_SESSION["id"]);
echo "Nieporawna nazwa użytkownika i/lub hasło";
}
mysql_close();
?>
