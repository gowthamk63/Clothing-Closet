<?php
require '../session.php';
error_reporting ( E_ALL );
ini_set ( 'display_errors', 1 );
ini_set ( "log_errors", 1 );
ini_set ( "error_log", "/tmp/php-error.log" );
include '../util/console_logger.php';
console_log ( 'Entered processing...' );
var_dump ( $_POST );

if (isset ( $_POST ['submit'] )) {
	$target_dir = $_SERVER ['DOCUMENT_ROOT'] . "/clothingCloset/uploads/";
	$target_file = $target_dir . basename ( $_FILES ["itemPhoto"] ["name"] );
	$uploadOk = 1;
	$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );
	// Check if image file is a actual image or fake image
	if (isset ( $_POST ["submit"] )) {
		$check = getimagesize ( $_FILES ["itemPhoto"] ["tmp_name"] );
		if ($check !== false) {
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
	if ($_FILES ["itemPhoto"] ["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if ($imageFileType != "jpg") {
		echo "Sorry, only JPG.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		$condition = $_POST ['condition'];
		$category = $_POST ['category'];
		$price = floatval ( $_POST ['price'] );
		$brand = $_POST ['brand'];
// 		include '../library/config.php';
// 		include '../library/opendb.php';
		include '../core/item.php';
		include '../util/connect.php';
		$person_id = $_SESSION ['user'];
		// $query = "INSERT INTO item (cond, category, price, color, brand ) " . "VALUES ('$condition', '$category', $price,'$color','$brand');";
		// mysqli_query ( $con, $query ) or die ('SQL ERROR');
		$description = '<<TBO>>';
		$color = '<<TBO>>';
		$item_type = '<<TBO>>';
		$size = '<<TBO>>';
		$query = "call process_donation($person_id,'$condition', '$category',  $price , '$color','$brand','$description','$item_type','$size',@item_id);";
		console_log($query);
		if (! $con->query( $query )) {
			printf ( "error: %s\n", mysqli_error ( $con ) );
		} else {
// 			include '../library/closedb.php';
			$result_set = $con->query('SELECT @item_id;');
			$first_row = $result_set->fetch_assoc();
			console_log($first_row);
			$id = $first_row['@item_id'];
			$target_file = $target_dir. $id . '.jpg';
			console_log($target_file);
			$_FILES ["itemPhoto"] ["name"] = $target_file;
			if (move_uploaded_file ( $_FILES ["itemPhoto"] ["tmp_name"], $target_file )) {
				echo "The file " . basename ( $_FILES ["itemPhoto"] ["name"] ) . " has been uploaded.";
				//header('Location:../senddocument.php? id='.$person_id);
				 header ( 'Location:../home.php' );
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
}
?>
