<?php 
session_start();
require_once '../Connection/config.php';

if(empty($_SESSION['id'])) {
    header('location: ../farmer/login.php');
}

$farmer_query = "SELECT farmers.full_name, crop.crop_name, buying_organization.organization_name, quantity FROM ads_offer JOIN farmers ON farmers.id = ads_offer.farmer_id JOIN crop ON crop.crop_id = ads_offer.crop_id JOIN buying_organization ON buying_organization.id = ads_offer.organization_id ORDER BY ads_offer.id DESC";
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = array();

while ($farmer_info = mysqli_fetch_object($farmer_result)) {
    $farmer_data[] = $farmer_info;
}
//var_dump($farmer_data);exit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Offers</title>

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
                            <center><h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Offers Made</h3></center>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Organization</th>
                                            <th>Crop</th>
                                            <th>Farmer</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($farmer_data as $data): ?>
                                            <tr>
                                                <td><?php echo $data->organization_name; ?></td>
                                                <td><?php echo $data->crop_name; ?></td>
                                                <td><?php echo $data->full_name; ?></td>
                                                <td><?php echo $data->quantity; ?></td>
                                                <td><button type="button" class="btn btn-danger" data-target=".bs-example" data-toggle="modal">Approve</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


    <div class="modal fade bs-example" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel"> Send Notification</h4>
          </div>
          <div class="modal-body">
             <div class="panel-body">
                <p>Are sure you want to approve this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-ok="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
     </div>

</body>
</html>
