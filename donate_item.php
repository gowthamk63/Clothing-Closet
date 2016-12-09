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
<link rel="stylesheet" href="css/donate.css" media="screen" title="no title">
</head>

<body>
	<!--Navigation Bar-->
  <?php
    include 'navbar.php'; ?>

      <!-- Donation Form -->
			<div class="box">
				<form class="form-horizontal" action="process/process_donation.php" method="post" enctype="multipart/form-data">

						<div class="form-group">
              <label for="condition">Condition:</label>
                      <!-- <span> -->
                      <input type="radio" name="condition" value="Good" class="condition" id="condition" required/>Good
						          <input type="radio" name="condition" value="Satisfactory" class="condition" id="condition" required/>Satisfactory
						          <input type="radio" name="condition" value="B" class="condition" id="condition" />Needs Mending
                      <!-- <div class="col-sm-10"> -->
                    <!-- </span><br><br> -->
            </div>

            <div class="form-group">
              <label for="category">Category:</label>
              <input type="radio" name="category" value="Male" class="category" id="category" required/>Male
						  <input type="radio" name="category" value="Female" class="category" id="category" /> Female
              <!-- <div class="col-sm-10"> -->
            </div>

            <div class="form-group">
						  <label for="price">Price:</label>
               <input type="text" name="price" placeholder="Enter price for the item" id="price" class="price" required/>
               <!-- <div class="col-sm-10"> -->
            </div>

            <div class="form-group">
              <label for="brand">Brand:</label>
               <input type="text" name="brand" placeholder="Brand" id="brand" class="brand" required/>
               <!-- <div class="col-sm-10"> -->
            </div>

            <div class="form-group">
              <label for="color">Color:</label>
               <input type="text" name="color" placeholder="Color" id="color" class="color" required>
               <!-- <div class="col-sm-10"> -->
            </div>

            <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" name="type" placeholder="Type" id="type" class="type" required><br><br>
            </div>

            <div class="form-group">
              <label for="size">Select Size:</label>
		          <select name="size" id="size" class="size" required>
		              <option value="Small">Small</option>
		              <option value="Medium">Medium</option>
		              <option value="Large">Large</option>
		              <option value="Extra Large">Extra large</option>
		          </select>
		        </div>

          	<div class="form-group">
          		<label for="message">Description:</label><br />
          		<textarea id="message" name="message" rows="7" cols="50" class="message"></textarea><br />
          	</div>

              Upload Photo:
  						<input type="file" name="itemPhoto" id="itemPhoto" required> <br>
  						<input class="upload" type="submit" value="Upload Image" name="submit">

          </form>
  	</div>
  </body>
</html>
