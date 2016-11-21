<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
$file_name = 'resources/dbconfiguration.ini';
if(file_exists($file_name)){
	$config = parse_ini_file($file_name,true) or die('Error');
}else{
	$config = parse_ini_file('../'.$file_name,true) or die('Error');
	
}

?>
