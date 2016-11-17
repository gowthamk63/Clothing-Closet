<?php
  require 'connect.php';

  $tbl_name="user"; // Table name

  //user details
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="INSERT INTO $tbl_name(UserName, password) VALUES ('$username','$password');";// Insert into database

  $con->query($sql);
 ?>
