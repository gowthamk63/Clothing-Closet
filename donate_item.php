<?php
require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Donate Items</title>
<?php
  include 'header.php';
  ?>
  <link rel="stylesheet" href="donate.css" media="screen" title="no title">
</head>
<body>
	<!--Navigation Bar-->
      <?php
      include 'navbar.php'; ?>
			<div class="box">
				<form action="process/process_donation.php" method="post" enctype="multipart/form-data">
						Condition:<span>
                      <input type="radio" name="condition" value="G" class="condition" id="condition" required/>Good
						          <input type="radio" name="condition" value="S" class="condition" id="condition"/>Satisfactory
						          <input type="radio" name="condition" value="B" class="condition" id="condition" />Needs Mending
                    </span><br><br>
            Category: <input type="radio" name="category" value="M" class="category" id="category" />Male
						          <input type="radio" name="category" value="F" class="category" id="category" /> Female<br><br>
						Price: <input type="text" name="price" value="" id="price" class="price" /><br><br>
            Brand: <input type="text" name="brand" value="" id="brand" class="brand" /> <br><br>
						Upload Photo:
						<input type="file" name="itemPhoto" id="itemPhoto"> <br>
						<input type="submit" value="Upload Image" name="submit">
				</form>
				</div>
  </body>
</html>
