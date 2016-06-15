<?php

require('database.php');

if(isset($_GET['data']))
  {
    $id=$_GET['data'];
	$owner=$_SESSION['id'];
    $query = "SELECT topic, content FROM $notes_table where id=$id and owner=$owner";
    $result = mysql_query($query);
	echo mysql_error();
	$row = mysql_fetch_row($result);

  }
mysql_close();
?>
<form method="POST" action="commit.php">
<table>
<tr><td>Temat</td><td><input type="text" name="topic" value=" <?php  echo $row[0];  ?>" ></td></tr>
<tr><td>Text:</td><td><input type="text" name="content" value="<?php echo $row[1];?>" ></td></tr>
<tr><td ><input type="submit" value="zapisz"><br></td></tr>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
</table>
</form>
