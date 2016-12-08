<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that


$id=$_GET['person_id'];
require 'util/connect.php';
$sql = "select email from person where id='$id';";
$result = $con->query ( $sql ) or die ( $con->connect_error );
// counting table rows
$count = $result->num_rows;
$row = $result->fetch_array ();

// If result matched $email and $password, table row must be 1 row
if ($count == 1 ) {
    $email = $row ['email'] ;
  require 'util/PHPMailer/PHPMailerAutoload.php';

  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  // use
  // $mail->Host = gethostbyname('smtp.gmail.com');
  // if your network does not support SMTP over IPv6
  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "saikalyan2703@gmail.com";
  //Password to use for SMTP authentication
  $mail->Password = "a1a2a3a4a5a6a7";
  //Set who the message is to be sent from
  //Set who the message is to be sent to
  $mail->addAddress("syeturu1@uncc.edu");
  //Set the subject line
  $mail->Subject = 'Your Tax Document';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body

  $mail->msgHTML("Tax document is attached with this mail");
  //Replace the plain text body with one created manually
  $mail->AltBody = 'This is a plain-text message body';
  //Attach an image file
  //$mail->addAtachment("images/TaxDocument.jpg");
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  header("Location: home.php");
  }
} else {
  echo "Email address not registered with this domain";
  ?>
  <a href="home.php">Go Back</a>
  <?php
 }

?>
