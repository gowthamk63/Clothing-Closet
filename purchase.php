<?php
  require 'session.php';
  require 'util/connect.php';

$id = (int)$_SESSION['user'];

$sql="call process_purchase($id, @is_success)";
include "util/console_logger.php";
console_log($sql);
$con->query( $sql );
$result_set = $con->query('SELECT @is_success;');
$temp = $result_set->fetch_assoc();
$q_is_success = $temp['@is_success'];

if ($q_is_success){
  header ( "Location: home.php" );
}else{
  echo "Unsuccessful";
}

?>
