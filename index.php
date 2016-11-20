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
  <link rel="stylesheet" href="css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
</head>

<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="box">
    <h1>Login</h1>

    <input type="email" name="email" placeholder="email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />

    <input type="password" name="password" placeholder="password" onFocus="field_focus(this, 'password');" onblur="field_blur(this, 'email');" class="email" /><br>
    <input type="submit" name="btn-login" value="Sign In" class="btn">

    <a href="register.php"><input type="button" id="btn2" value="Sign Up"></a> <!-- End Btn2 -->
  </div> <!-- End Box -->

  <a href="https://www.facebook.com">asdasd</a>


</form>

<p>Forgot your password? <u style="color:#f1c40f;">Click Here!</u></p>
<?php
include 'footer.php';?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script src="js/index.js"></script>

</body>
</html>
