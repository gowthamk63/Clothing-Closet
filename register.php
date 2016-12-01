<?php
include 'signup.php'; ?>


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

	<form name="signup" method="POST" action="signup.php" onsubmit="return submitform()">
		<div class="signupbox">
		<h1>Sign up</h1>
		<label style="margin-left:350px;font-size:13px"><span style="color:red;">*</span>   required field</label><br>
			<input id="name" type="text" name="name" placeholder="Enter name" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label for="name" style="color:red">*</label>

			<input id="email" type="email" name="email" placeholder="email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="email" style="color:red;">*</label>

			<input id="address" type="text" name="address" placeholder="Enter address" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="address" style="color:red;">*</label>

			<input id="city" type="text" name="city" placeholder="Enter city" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="city" style="color:red;">*</label>

			<input id="state" type="text" name="state" placeholder="Enter State" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="state" style="color:red;">*</label>

			<input id="zip" type="text" name="zip" pattern="[0-9]{5}" placeholder="Enter zipcode" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="zip" style="color:red;">*</label>

			<input id="phone" type="text" name="phone" placeholder="Enter phone number" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="phone" style="color:red;">*</label>

			<input id="password" type="password" name="password" placeholder="Enter password" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="password" style="color:red;">*</label>

			<input id="cpassword" type="password" name="cpassword" placeholder="Confirm password" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" required />
			<label  for="cpassword" style="color:red;">*</label><br>

			<input class="signup" type="submit" value="Sign Up" name="btn-signup" id="submit">

		</div>
	</form>
	</body>
</html>
