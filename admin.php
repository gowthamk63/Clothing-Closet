<?php
require 'session.php';
session_start();
require 'util/connect.php';
$id = (int)$_SESSION['user'];
$sql="select * from admin where id=$id;";
$result = $con->query ( $sql ) or die ( $con->connect_error );

$count = $result->num_rows;
$row = $result->fetch_array ();
if ($count != 1){
  header ("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<?php
  include 'header.php';
  ?>
<link rel="stylesheet" href="css/admin.css" media="screen" title="no title">
<script src="js/admin.js"></script>


</head>
<body>
  	<!-- Navigation Bar -->
      <?php
      include 'navbar.php'; ?>

        <!--Adding Admin-->
        Promote a member to admin:<br>
        <form class="form-promote" action="promote.php" method="post">
          Email Id: <input type="email" name="email" placeholder="Enter email id " required>
          Position: <input type="text" name="position" placeholder="Enter position" required>
          <input type="submit" name="promote-admin" value="promote">
        </form>

        <!--Displaying pending items for approval-->
        <div class="pendingItems">
        <?php
        require 'util/connect.php';
        $sql="select id,cond,category,dateOfAcquiring,price,brand from item where status=0";
        $result = $con->query ( $sql ) or die ( $con->connect_error );
        $count = $result->num_rows;
          If ($count > 0) {
        ?>
        <div class="albums-container container-fluid">

            <!-- Items -->
            <div class="row">
              <?php  while ($row = $result->fetch_array ()) {?>
              <div class="col-xs-3 col-lg-2x">
                            <div class="thumbnail">
                                    <img src="uploads/<?php echo $row['id'];?>.jpg" class="img-responsive">
                                <div class="caption">
                                    <h2><?php echo $row['brand']?></h2>
                                    <h4><?php echo $row['category']?></h4>
                                       <h4><?php echo $row['price']?> </h4>
                                      <div id="btn<?php echo $row['id'];?>">
                                      <button id="btn" type="button" name="button" class="btn-edit" onclick="show(<?php echo $row['id'];?>)">
                                        <span class="glyphicon glyphicon-pencil"></span></button>
                                       
                                        
                                        <button type="button" name="button" class="btn-approve" onclick="approve(<?php echo $row['id']?>)">
                                      Approve
                                    </button>
                                    <button type="button" name="button" class="btn-reject" onclick="reject(<?php echo $row['id']?>)">
                                      Reject
                                    </button>
                                       </div>


                                        
                                    <div id="edit<?php echo $row['id'];?>" style="display:none;">

                                          <input size="8" type="text" name="edit" id="editvalue<?php echo $row['id'];?>" placeholder="Enter value" required>
                                      
                                        <button type="button" name="button" class="btn-done" onclick="edit(<?php echo $row['id']?>)">
                                        <span class="glyphicon glyphicon-ok"></span> Done
                                        </button>
                                        <br>
                                        </div>

                                </div>
                            </div>
                            </div>
                            <?php } ?>
                <div class="clearfix visible-md visible-lg"></div>
            </div>
        <?php
          }
        ?>
        </div>
  </body>
</html>
