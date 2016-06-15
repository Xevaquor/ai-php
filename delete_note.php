<?php

require('database.php');

$owner=$_SESSION['id'];

if(isset($_GET['data']))
  {
    $id=$_GET['data'];
    $query = "DELETE FROM $notes_table where id='$id' and owner='$owner' LIMIT 1";
    $result = mysql_query($query);
    header("location:index.php");
  }
mysql_close();
?>
