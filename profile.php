<?php
require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
<?php
  include 'header.php';
  ?>
</head>
<body>
  	<!-- Navigation Bar -->
      <?php
      include 'navbar.php'; ?>


      <!-- Displaying Purchase History -->
      <table border="2">
        <thead>
          <tr>
            <th>Purchased date</th>
            <th>Bill ID</th>
          </tr>
        </thead>
      <tbody>
        <?php
        require 'util/connect.php';
        $sql="select purchaseDate,billid from purchase_history where 1";
        $result = $con->query ( $sql ) or die ( $con->connect_error );
        $count = $result->num_rows;
          If ($count > 0) {
            while ($row = $result->fetch_array ()) {
        ?>
        <tr>
             <td><?php echo $row['purchaseDate']; ?></td>
             <td><?php echo $row['billid']; ?></td>
        </tr>
      </tbody>
      </table>
        <?php
          }
          }
        ?>




































      <!-- Displaying Donation History -->
      <table border="2">
        <thead>
          <tr>
            <th>Donation Date</th>
            <th>Value</th>
          </tr>
        </thead>
      <tbody>
        <?php
        require 'util/connect.php';
        $sql="select donationdate,valuedAt from donation_history where 1";
        $result = $con->query ( $sql ) or die ( $con->connect_error );
        $count = $result->num_rows;
          If ($count > 0) {
            while ($row = $result->fetch_array ()) {
        ?>
        <tr>
             <td><?php echo $row['donationdate']; ?></td>
             <td><?php echo $row['valuedAt']; ?></td>
        </tr>
      </tbody>
      </table>
        <?php
          }
          }
        ?>
  </body>
</html>
