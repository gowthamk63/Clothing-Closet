<?php
if ( isset($_POST['btn-login']) ) {
    require 'connect.php';

    $tbl_name="user"; // Table name

    // username and password sent from form
    $username=$_POST['email'];
    $password=$_POST['password'];

    // To protect MySQL injection (more detail about MySQL injection)
    //$username = stripslashes($username);
    //$password = stripslashes($password);
    //$username = mysqli_real_escape_string($username);
    //$password = mysqli_real_escape_string($password);
    $sql="SELECT sno,UserName,password FROM $tbl_name WHERE UserName='$username' and password='$password';";
    $result=$con->query($sql);
    // Mysql_num_row is counting table row
    $count=$result->num_rows;
    $row = $result->fetch_array();

    // If result matched $username and $password, table row must be 1 row
    if($count == 1 && $row['password']==$password){
        session_start();
        $_SESSION['user'] = $row["sno"];
        header("Location: home.php");
    }
    else {
      echo "Invalid login details";
    }
  }
?>
