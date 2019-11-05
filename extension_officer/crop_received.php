<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

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
    <title>Crop Received</title>

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

    <div id="wrapper">
        <?php include 'nav.php'; ?>

    <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center><h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Result of the post</h3></center>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Accept</th>
                                            <th>Crop ID</th>
                                            <th>Crop Name</th>
                                            <th>Quantity</th>
                                            <th>Username</th>
                                            <th>Farmer Name</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



</body>
</html>
