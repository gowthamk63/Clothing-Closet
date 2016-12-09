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
      <table border="0" width="400px" style="float: left; margin-left: 10%">
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
        $person_id=$_SESSION ['user'];
        $sql="select itemid,purchaseDate,billid from purchase_history where personid='$person_id'";
        $result = $con->query ( $sql ) or die ( $con->connect_error );
        $count = $result->num_rows;
          If ($count > 0) {
            while ($row = $result->fetch_array ()) {
        ?>
        <tr>
          <?php

             $x=$row['purchaseDate'];
             $bill_id=$row['billid'];
             $itemid=$row['itemid'];
             $sql = "select price from item where id='$itemid';";
             $result1 = $con->query ( $sql ) or die ( $con->connect_error );
             $count1 = $result1->num_rows;
             $row1 = $result1->fetch_array ();
           ?>
             <td>
                
               <img src="uploads/<?php echo $itemid;?>.jpg" class="img-responsive" width="30px" height="30px">
             </td>
             <td><?php echo $x;?></td>
             <td width="50px"><?php echo $bill_id?></td>
        </tr>
        <?php
          }
          }
        ?>

      <!-- Displaying Donation History -->
      <table border="0" width="400px" style="margin-right:10%; float: right;">
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
        $sql="select itemid,donationdate,valuedAt from donation_history where personid=$person_id";
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
