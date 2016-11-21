<?php
require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome</title>
</head>
<body>
  <?php
		include 'header.php';
		?>
      You are successfully logged in
      <a href="logout.php">logout</a>
	<form>
		<div id="action_bar" class="action_bar">
			<table>
				<tr>
					<td>Administration</td>
					<td><a href="donate_item.php">Donate Items</a></td>
					<td>Search Items</td>
				</tr>
			</table>
		</div>
		<div id="scrollable_list" class="scrollable_list">Scrollable list here</div>
	</form>
	<!-- footer -->
  <?php
		include 'footer.php';
		?>

  </body>
</html>
