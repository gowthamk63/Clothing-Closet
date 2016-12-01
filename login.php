<?php

if (isset ( $_POST ['btn-login'] )) {
	require 'util/connect.php';

	// email and password sent from form
	$email = $_POST ['email'];
	$password = $_POST ['password'];

	$sql = "select personid,email,password from login where email='$email' and password='$password';";

	$result = $con->query ( $sql ) or die ( $con->connect_error );

	// counting table rows
	$count = $result->num_rows;
	$row = $result->fetch_array ();

	// If result matched $email and $password, table row must be 1 row
	if ($count == 1 && $row ['password'] == $password) {
		session_start ();
		$_SESSION ['user'] = $row ["personid"];
		header ( "Location: home.php" );
	} else {
		echo "Invalid login details";
	}
}
?>
