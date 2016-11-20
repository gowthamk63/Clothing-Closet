<?php
require 'session.php';
?>

<html>
<head></head>
<body>
<?php 
$target_dir = "../uploads/";
$target_file = $target_dir . basename ( $_FILES ["fileToUpload"] ["name"] );
$uploadOk = 1;
$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );
// Check if image file is a actual image or fake image
if (isset ( $_POST ["submit"] )) {
	console_log ( 'inside isset' );
	$check = getimagesize ( $_FILES ["fileToUpload"] ["tmp_name"] );
	if ($check !== false) {
		console_log ( "File is an image - " . $check ["mime"] . "." );
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists ( $target_file )) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES ["fileToUpload"] ["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" ) {
	echo "Sorry, only JPG.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
} else {
	include 'library/config.php';
	include 'library/opendb.php';
	$conn = connect () or die ( 'Connection failed' );

	$query = "INSERT INTO item (file_name ) " . "VALUES ('$target_file')";
	console_log ( $query );
	// mysqli_query ( $conn, $query ) or die ('SQL ERROR');
	if (! mysqli_query ( $conn, $query )) {
		printf("error: %s\n", mysqli_error($conn));
	} else {
		include 'library/closedb.php';
		$id = $conn->insert_id;
		console_log ( 'Id is' . $id );
		$target_file = $target_dir . $id . '.jpg';
		console_log ( 'target_file is ' . $target_file );
		$_FILES ["fileToUpload"] ["name"] = $target_file;
		// 		console_log ( move_uploaded_file ( $_FILES ["fileToUpload"] ["tmp_name"], $target_file ) );
		if (move_uploaded_file ( $_FILES ["fileToUpload"] ["tmp_name"], $target_file )) {
			echo "The file " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
?>
</body>
</html>