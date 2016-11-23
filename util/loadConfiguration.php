<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
<<<<<<< HEAD
$config = parse_ini_file('resources/dbconfiguration.ini',true) or die('Error');
=======
$file_name = 'resources/dbconfiguration.ini';
if(file_exists($file_name)){
	$config = parse_ini_file($file_name,true) or die('Error');
}else{
	$config = parse_ini_file('../'.$file_name,true) or die('Error');
	
}

>>>>>>> f140f14f5abcc37378e6a2c52b4b7b65c0a9957e
?>
