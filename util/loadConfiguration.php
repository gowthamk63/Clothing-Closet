<?php
echo "string";
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
$config = parse_ini_file('../resources/dbconfiguration.ini',true) or die('Error');
?>
