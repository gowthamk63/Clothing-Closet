<?php
require 'session.php';
?>

<html>
<head></head>
<body>
	<form action="process/process_donation.php" method="post" enctype="multipart/form-data">
		<input type="radio" name="condition" value="G" class="condition"
			id="condition" checked="checked" />Good<br> <input type="radio"
			name="condition" value="S" class="condition"
			id="condition" />Satisfactory <br> <input type="radio"
			name="condition" value="B" class="condition"
			id="condition" />Needs Mending<br> <input type="radio"
			name="category" value="A" class="category" id="category"
			checked="checked" />All <br> <input type="radio" name="category"
			value="M" class="category" id="category" />Male<br> <input
			type="radio" name="category" value="F" class="category"
			id="category" /> Female<br> <input type="text" name="price" value=""
			id="price" class="price" />Price <br> Brand<input type="text"
			name="brand" value="" id="brand" class="brand" /> <br> Color<input
			type="text" name="color" value="" id="color" class="color" /> <br>
		Upload Photo<input type="file" name="itemPhoto" id="itemPhoto"> <br> <input
			type="submit" value="Upload Image" name="submit">

	</form>
	<?php
	include 'footer.php';
	?>
</body>
</html>