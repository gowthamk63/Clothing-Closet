
<?php
require 'util/connect.php';

if($_GET['action'] == 'reject') {
 $id=$_GET['id'];
 $sql="UPDATE `item` SET `status`=2 WHERE id=$id";
 $result = $con->query ( $sql ) or die ( $con->connect_error );
}

 if($_GET['action'] == 'approve') {
  $id=$_GET['id'];
  $sql="UPDATE `item` SET `status`=1 WHERE id=$id";
  $result = $con->query ( $sql ) or die ( $con->connect_error );
}

if($_GET['action'] == 'edit') {
  $id=$_GET['id'];
  $value=$_GET['value'];
  $sql="UPDATE `item` SET `price`=$value WHERE id=$id";
  $result = $con->query ( $sql ) or die ( $con->connect_error );
}
?>
