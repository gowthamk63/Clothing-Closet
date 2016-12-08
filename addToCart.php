<?php
require 'session.php';
require 'util/connect.php';
if($_GET['action'] == 'add') {
$person=(int)$_SESSION['user'];
 $id=$_GET['id'];
 $sql="insert into cart values($id,$person)";
 $result = $con->query ( $sql ) or die ( $con->connect_error );
}

if($_GET['action'] == 'remove') {
$person_id=(int)$_SESSION['user'];
 $id=$_GET['id'];
 $sql="delete from cart where item_id='$id'";
 $result = $con->query ( $sql ) or die ( $con->connect_error );
}
 ?>
