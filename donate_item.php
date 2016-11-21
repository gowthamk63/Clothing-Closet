<?php
require 'session.php';
?>

<html>
<head></head>
<body>
	<form action="home.php" method="post" enctype="multipart/form-data">
		<input type="radio" name="condition" value="Good" class="condition"
			id="condition" checked="checked" /> <input type="radio"
			name="condition" value="Satisfactory" class="condition"
			id="condition" /> <input type="radio" name="condition"
			value="Needs Mending" class="condition" id="condition" /> <input
			type="radio" name="category" value="All" class="category"
			id="category" checked="checked" /> <input type="radio"
			name="category" value="Male" class="category" id="category" /> <input
			type="radio" name="category" value="Female" class="category"
			id="category" /> <input type="text" name="price" value="" id="price"
			class="price" /> <input type="text" name="brand" value="" id="brand"
			class="brand" /> <input type="text" name="color" value="" id="color"
			class="color" /> <input type="file" name="itemPhoto" id="itemPhoto">
		<input type="submit" value="Upload Image" name="submit">

	</form>
	<?php
	include 'footer.php';
	?>
</body>
</html>