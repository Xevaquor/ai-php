<?php

require('database.php');

$query = "UPDATE $notes_table SET topic='{$_POST['topic']}', content='{$_POST['content']}', modified=NOW() 
WHERE id={$_POST['id']} AND owner={$_SESSION['id']}";

   mysql_query($query);
   echo $query;
   echo mysql_error();
	$rows = mysql_affected_rows();
	if($rows == 1)
	{
		Header('Location: index.php');		
	}
	else
	{
		echo 'błąd <a href="index.php">Powrót</a>';
	}	
  
mysql_close();
?>