<?php

 if (isset ( $_POST ['promote-admin'] )) {
	require 'util/connect.php';

  $email = $_POST ['email'];
  $position = $_POST ['position'];

  $sql="select id from person where email='$email';";

  $result = $con->query ( $sql ) or die ( $con->connect_error );

   // counting table rows
  $count = $result->num_rows;
  $row = $result->fetch_array ();

  // If result matched $email and $password, table row must be 1 row
  if ($count == 1) {
    $person_id=$row ['id'];
    //Checking if person is already an admin
    $sql="select * from admin where id=$person_id;";
    $result = $con->query ( $sql ) or die ( $con->connect_error );
    $count=$result->num_rows;

    if($count==0){
      $sql="insert into admin values($person_id, '$position')";
      $con->query ( $sql ) or die ( $con->connect_error );
      header ( "Location: admin.php" );
    }
    else{
      include 'header.php';
      include 'navbar.php';
      echo "Already an admin";
      ?>
      <a href="admin.php">Go Back</a>
      <?php
     }
   }
  else {
    echo "Invalid email id";
  }
}
?>
