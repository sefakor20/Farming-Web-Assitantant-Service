<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}

$posted_data = fetchItemsWithJoin($connection, "buying_organization.organization_name, purchase.id, crop.crop_name, purchase.quantity, purchase_status.name AS p_status, purchase.status, schedule_date, purchase.created_at", "purchase", "JOIN buying_organization ON buying_organization.id = purchase.organization_id JOIN crop ON crop.crop_id = purchase.crop_id JOIN purchase_status ON purchase_status.id = purchase.status", "purchase.farmer_id", $_SESSION['farmers'], "id");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>

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
                <div class="col-md-12">
                  <?php
                    if (isset($_SESSION['success'])) {
                      ?>
                      <span class="alert alert-success"><?php echo $_SESSION['success']; ?></span>
                      <?php
                      $_SESSION['success'] = null;
                    }
                  ?>
                </div>
              </div>
           <div class="row">
              <div class="col-md-10">
                
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">All Products to Sell</h3>
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Organization Name</th>
                          <th scope="col">Crop</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Status</th>
                          <th scope="col">Schedule Date</th>
                          <th scope="col">Date/Time</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($posted_data as $data_info): ?>
                        <tr>
                          <td><?php echo $data_info->organization_name; ?></td>
                          <td><?php echo $data_info->crop_name; ?></td>
                          <td><?php echo $data_info->quantity; ?></td>
                          <td><?php echo $data_info->p_status; ?></td>
                          <td><?php echo $data_info->schedule_date; ?></td>
                          <td><?php echo readableDate($data_info->created_at); ?></td>
                          <?php
                            //display approve button when status is 'pending'
                            if ($data_info->status == 1) {
                              ?>
                              <td><a href="../Methods/approves.php?farmer_approve=<?php echo $data_info->id; ?>">Approve</a></td>
                              <?php
                            }
                          ?> 
                        </tr>
                    <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> 
           </div>
         </div>


        

      </div><!-- .// wrapper -->

    
</body>
</html>
