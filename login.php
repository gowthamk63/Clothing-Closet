<?php
if ( isset($_POST['btn-login']) ) {
    require 'util/connect.php';
    $tbl_name="person"; // Table name

    //  and password sent from form
    $email=$_POST['email'];
    $password=$_POST['password'];

    // To protect MySQL injection (more detail about MySQL injection)
    //$email = stripslashes($email);
    //$password = stripslashes($password);
    //$email = mysqli_real_escape_string($email);
    //$password = mysqli_real_escape_string($password);

    $sql="SELECT id,email,password FROM $tbl_name WHERE email='$email' and password='$password';";
    $result=$con->query($sql);
    // counting table rows
    $count=$result->num_rows;
    $row = $result->fetch_array();

    // If result matched $email and $password, table row must be 1 row
    if($count == 1 && $row['password']==$password){
        session_start();
        $_SESSION['user'] = $row["id"];
        header("Location: home.php");
    }
    else {
      echo "Invalid login details";
    }
  }
?>
