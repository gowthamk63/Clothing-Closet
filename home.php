<?php
  require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome</title>
<?php
  include 'header.php';
  ?>
</head>
<body>
  	<!-- Navigation Bar -->
      <?php
      include 'navbar.php'; ?>

      <!-- Displaying Items -->
        <?php
        require 'util/connect.php';
        $sql="select cond,category,dateOfAcquiring,price,brand from item where status=1";
        $result = $con->query ( $sql ) or die ( $con->connect_error );
        $count = $result->num_rows;
          If ($count > 0) {
            while ($row = $result->fetch_array ()) {
        ?>
        <div class="albums-container container-fluid">

            <!-- Albums -->
            <div class="row">
              <div class="col-sm-4 col-lg-2">
                            <div class="thumbnail">
                                    <img src="uploads/yo.jpg" class="img-responsive" width="300px" height="300px">
                                <div class="caption">
                                    <h2><?php echo $row['brand']?><h2>
                                    <h4><?php echo $row['price']?></h4>
                                    <h4><?php echo $row['category']?></h4></div>
                                </div>
                            </div>
                <div class="clearfix visible-md visible-lg"></div>
            </div>
        <?php
          }
          }
        ?>
  </body>
</html>
