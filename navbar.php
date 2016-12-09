  <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Clothing Closet</a>
            </div>

            <!-- Items -->
            <div class="collapse navbar-collapse" id="topNavBar">

                <ul class="nav navbar-nav">
                  <li class="">
                      <a href="profile.php">
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Profile
                      </a>
                  </li>
                  <li class="">
                      <a href="donate_item.php">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp; Donate
                      </a>
                  </li>
                  <li class="">
                      <a href="cart.php">
                          <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp; Cart
                      </a>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                  <?php
                    if (!isset($_SESSION)) {
  session_start();
}
                    require 'util/connect.php';
                    $id = (int)$_SESSION['user'];
                    $sql="select * from admin where id=$id;";
                    $result = $con->query ( $sql ) or die ( $con->connect_error );

                  $count = $result->num_rows;
                  $row = $result->fetch_array ();
                  if ($count == 1){
                    ?>
                    <li class="">
                        <a href="admin.php">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp; Admin
                        </a>
                    </li>
                    <?php
                  }
                    ?>

                    <li class="">
                        <a href="logout.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp; Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
