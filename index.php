<head>
<title>PeHaPe</title>
</head>
<body>
<?php

require('database.php');

if (!isset($_SESSION['id'])) {
header('Location: login.php');
exit();
}

$query = "SELECT  id ,topic, content, created,modified FROM $notes_table where owner='" . $_SESSION['id'] . "'";
$result = mysql_query($query);

?>
<a href="add.php">Dodaj</a>
        <table border="1">
        <th>Temat</th>
        <th>Last modification</th>
        <th>Created</th>
        <th>Treść</th>
      </tr>
	
<?php
while($row = mysql_fetch_array($result)){ 
	echo "<tr><td>{$row['topic']}</td><td>{$row['modified']}</td><td>{$row['created']}</td>
	<td>{$row['content']}</td>
	<td><a href=\"edit_note.php?data={$row['id']}\" class=\"button\" >Edit</a></td>
	<td><a href=\"delete_note.php?data={$row['id']} \" class=\"button\">Delete</a></td></tr>";  
}

?>
</tbody>
</table>
<?php 
mysql_close();
?>
<p><a href="logout.php">Wyloguj  </a>
<a href= "pass.php">Zmień hasło </a>
</body>

</html>
