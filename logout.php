<a href="login.php">Logowanie </a>

<?php

require('database.php');

session_unset();
session_destroy();
$_SESSION = array();

echo 'Wylogowano';
?>
