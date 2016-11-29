<?php
include 'util/console_logger.php';
if (isset ( $_POST ['btn-login'] )) {
	require 'util/connect.php';

	// and password sent from form
	$email = $_POST ['email'];
	$password = $_POST ['password'];

	// To protect MySQL injection (more detail about MySQL injection)
	// $email = stripslashes($email);
	// $password = stripslashes($password);
	// $email = mysqli_real_escape_string($email);
	// $password = mysqli_real_escape_string($password);

	$sql = "select p.id, p.email, l.password from login as l join person as p on p.id=l.personid WHERE p.email='$email' and l.password='$password';";

	$result = $con->query ( $sql ) or die ( $con->connect_error );
	// counting table rows
	$count = $result->num_rows;
	$row = $result->fetch_array ();

	// If result matched $email and $password, table row must be 1 row
	if ($count == 1 && $row ['password'] == $password) {
		session_start ();
		$_SESSION ['user'] = $row ["id"];
		header ( "Location: home.php" );
	} else {
		echo "Invalid login details";
	}
}
?>
