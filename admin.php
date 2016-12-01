<?php
require 'session.php';
session_start();
require 'util/connect.php';
$id = (int)$_SESSION['user'];
$sql="select * from admin where id=$id;";
$result = $con->query ( $sql ) or die ( $con->connect_error );

$count = $result->num_rows;
$row = $result->fetch_array ();
if ($count != 1){
  header ("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<?php
  include 'header.php';
  ?>
</head>
<body>
  	<!-- Navigation Bar -->
      <?php
      include 'navbar.php'; ?>


  </body>
</html>
