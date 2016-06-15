<?php

require('database.php');

$owner=$_SESSION['id'];
$txt=$_POST['txt'];
$t=$_POST['temat'];

$query = "INSERT INTO $notes_table (id ,topic ,content, created, modified, owner) VALUES (NULL,'$t', '$txt', NOW(), NOW(), $owner)";

$result = mysql_query($query);

mysql_close();
header("location:index.php");
?>
