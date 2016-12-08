<?php
  require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>My cart</title>
<?php
  include 'header.php';
  include 'navbar.php';
  require 'util/connect.php';
  ?>
  <script src="js/cart.js"></script>
</head>
<body>

   <table border="2" width="350px" style="margin-left:20px;">
     <thead>
       <tr>
         <th>Item</th>
         <th>Price</th>
       </tr>
       </thead>
       <tbody>
       <?php
       $sql="select item_id from cart where 1";
       $result = $con->query ( $sql ) or die ( $con->connect_error );
       $count = $result->num_rows;
         If ($count > 0) {
           while ($row = $result->fetch_array ()) {
             $sql="select price from item where id='$row[item_id]'";
             $result1 = $con->query ( $sql ) or die ( $con->connect_error );
             $row1 = $result1->fetch_array ();
       ?>
         <tr>
              <td width="50px"><img src="uploads/<?php echo $row['item_id']?>.jpg" class="img-responsive" width="30px" height="30px"></td>
              <td width="120px"><?php echo $row1['price']; ?> <button style="margin-left:50px;" type="button" name="button" onclick="remove(<?php echo $row['item_id']?>)"><span class="glyphicon glyphicon-remove"></span> Remove</button></td>
         </tr>
         <!-- <button type="button" name="button">Remove</button> -->
         <?php
 }
 }
  ?>
</tbody>
</table>
<?php
$sql = "SELECT price FROM item where id in (select item_id from cart)";
$result2 = $con->query ( $sql ) or die ( $con->connect_error );
$sum=0;
while ($row2 = $result2->fetch_array ()) {
  $sum=$sum+$row2[price];
}
echo "<p style='margin-left:10px;margin-top:20px;font-size:150%;'>"."Total amount:".$sum."</p>"; ?>
<button type="button" name="button" onclick="location.href='purchase.php'"> Proceed to Checkout</button>
</body>
</html>
