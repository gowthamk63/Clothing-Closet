<?php
include 'loadConfiguration.php';

$host = $config ['database'] ['host'];
$username = $config ['database'] ['user'];
$password = $config ['database'] ['password'];
$db_name = $config ['database'] ['dbname'];

// Connect to server and select databse.
$con = new mysqli ( "$host", "$username", "$password", "$db_name" ) or die('Connection Error');
$con->autocommit(true);
?>
