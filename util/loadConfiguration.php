<?php
$file_name = 'resources/dbconfiguration.ini';
if(file_exists($file_name)){
	$config = parse_ini_file($file_name,true) or die('Error');
}else{
	$config = parse_ini_file('../'.$file_name,true) or die('Error');
}
?>
