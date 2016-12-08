<?php
	if($_GET['text']){
		//echo $_GET['text'].' '.'is not registered with this domain';
		echo "<p style='color:red;font-size:100%;'>".$_GET['text']." "."is not registered with this domain"."</p>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="index.css">
	<script src="signup.js"></script>
</head>
<body>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

	<form name="forgotpassword" method="POST" action="forgotpassword.php">
		<div class="signupbox">
		<h1>Forgot password</h1>
		<label style="margin-left:350px;font-size:13px"><span style="color:red;">*</span>   required field</label><br>
			<input id="email" type="email" name="email" placeholder="Enter email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label for="name" style="color:red">*</label>


			<input class="forgot" type="submit" value="Send email" name="btn-forgot" id="submit">

		</div>
	</form>
	</body>
</html>
