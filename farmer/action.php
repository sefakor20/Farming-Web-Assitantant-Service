<?php
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}

$ads_data = fetchItemWithJoin($connection, "ads.id, quantity, crop.crop_name, buying_organization.organization_name, buying_organization.organization_contact", "ads", "JOIN buying_organization ON buying_organization.id = ads.organization_id JOIN crop ON crop.crop_id = ads.crop_id");

/*
$farmer_query = "SELECT ads.id, quantity, crop.crop_name, buying_organization.organization_name, buying_organization.organization_contact FROM ads JOIN buying_organization ON buying_organization.id = ads.organization_id JOIN crop ON crop.crop_id = ads.crop_id ORDER BY ads.id DESC";
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = array();

while ($farmer_info = mysqli_fetch_object($farmer_result)) {
    $farmer_data[] = $farmer_info;
}*/

//var_dump($farmer_data);exit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Advertisement Details</title>

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

        <div class="container">
          <div class="row">
            <div class="col-md-10"><br><br><br><br>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <center><h3 class="panel-title">Crop Advertisement Details</h3></center>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">

                  <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                              <th>Crop Name</th>
                              <th>Action</th>
                              <th>Status</th>
                          </tr>
                       </thead>
                       <tbody>
                        <?php foreach($ads_data as $farm): ?>
                          <?php
                            if ($farm->quantity > 0) {
                              ?>
                              <tr>
                                 <td><?php echo $farm->crop_name; ?></td>
                                 <td><?php echo $farm->quantity; ?></td>
                                 <td><?php echo $farm->organization_name; ?></td>
                                 <td><?php echo $farm->organization_contact; ?></td>
                                 <td><a href="#">Make Offer</a></td>
                                 <td>Not Yet</td>
                               </tr>
                              <?php
                            }
                          ?>
                         
                       <?php endforeach; ?>
                       </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div><!-- .// wrapper -->
</body>
</html>
