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
      <table border="2" width="350px" style="margin-left:20px;">
        <thead>
          <tr>
            <th>Item</th>
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
             <td width="120px"><?php echo $row['billid']; ?></td>
        </tr>
      </tbody>
      </table>
        <?php
          }
          }
        ?>

      <!-- Displaying Donation History -->
      <table border="2" width="350px" style="margin-top:50px;margin-left:20px;">
        <thead>
          <tr>
            <th> Item </th>
            <th>Donation Date</th>
            <th>Value</th>
          </tr>
        </thead>
      <tbody>
        <?php
        require 'util/connect.php';
        $sql="select itemid,donationdate,valuedAt from donation_history where 1";
        $result = $con->query ( $sql ) or die ( $con->connect_error );
        $count = $result->num_rows;
          If ($count > 0) {
            while ($row = $result->fetch_array ()) {
        ?>
        <tr>
          <?php
             $x=$row['donationdate'];
             $sql = "select id,price from item where dateOfAcquiring='$x';";
             $result1 = $con->query ( $sql ) or die ( $con->connect_error );
             $count1 = $result1->num_rows;
             $row1 = $result1->fetch_array ();
             $price=$row1['price'];
           ?>
             <td>
               <img src="uploads/<?php echo $row1['id']?>.jpg" class="img-responsive" width="30px" height="30px">
             </td>
             <td><?php echo $row['donationdate']; ?></td>
             <td width="50px"><?php echo "<p font-size:100%>"."$".$price."</p>"; ?></td>
        </tr>
        <?php
          }
          }
        ?>
      </tbody>
      </table>
  </body>
</html>
