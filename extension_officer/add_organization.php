<?php 
session_start();
require_once '../Connection/config.php';

if(empty($_SESSION['id'])) {
    header('location: ../farmer/login.php');
}
/*
$farmer_query = 'SELECT * FROM farmers';
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = array();

while ($farmer_info = mysqli_fetch_object($farmer_result)) {
    $farmer_data[] = $farmer_info;
}*/

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Buying Organization</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>   
</head>
<body>

     <?php include 'nav.php'; ?>

         


    <div id="wrapper">
     <div class="container">
    <div class="col-md-4 col-md-offset-4">
         <?php
                  if (isset($_SESSION['success'])) {
                    ?>
                    <span class="btn btn-success"><?php echo $_SESSION['success']; ?></span><br>
                    <?php
                    $_SESSION['success'] = null;
                  }
                ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center><h3 class="panel-title"><i class="fa fa-sitemap"></i> Add buying Organization</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="../Methods/add_buying_organization.php">
                                <div class="form-group">
                                    <label>Organization Name</label>
                                    <input type="text" name="organization_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="organization_contact" class="form-control" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- //container -->

            </div><!--// Wrapper -->



</body>
</html>
