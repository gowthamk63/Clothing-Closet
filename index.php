<?php
session_start();
// it will never let you open index(login) page if session is set
if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
}
require 'login.php';
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Clothing closet</title>
  <?php include 'header.php'; ?>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' type='text/css' href='index.css'>
</head>

<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="box">
    <h1>Login</h1>

    <input type="email" required name="email" placeholder="email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />

    <input type="password" required  name="password" placeholder="password" onFocus="field_focus(this, 'password');" onblur="field_blur(this, 'email');" class="email" /><br>
    <input type="submit" name="btn-login" value="Sign In" class="btn">


      <input type="button" id="btn2" onclick="location.href='register.php'" name="name" value="Signup">
  </div>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script src="js/index.js"></script>

</body>
</html>
