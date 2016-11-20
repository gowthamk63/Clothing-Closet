 <?php
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }

if ( isset($_POST['btn-signup']) ) {
  require 'util/connect.php';

  $tbl_name="person"; // Table name

  //user details
  $name=$_POST['name'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $zip=$_POST['zip'];
  $phone=$_POST['phone'];

  $sql="INSERT INTO $tbl_name(name, password, email, address, city, state, zip) VALUES ('$name', '$password', '$email', '$address', '$city', '$state', '$zip');";// Insert into database

  $con->query($sql) or die(mysql_error($con));
  if ($con) {
    header("Location: index.php");
  }
}
 ?>
