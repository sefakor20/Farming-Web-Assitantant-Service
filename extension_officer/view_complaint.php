<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['id'])) {
    header('location: ../farmer/login.php');
}

$farmer_query = "SELECT complaint.id, complaint.title, complaint.status, farmers.full_name FROM complaint JOIN farmers ON farmers.id = complaint.farmer_id ORDER BY complaint.id DESC";
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = array();

while ($farmer_info = mysqli_fetch_object($farmer_result)) {
    $farmer_data[] = $farmer_info;
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaint</title>

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
   
         <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <center><h3 class="panel-title"><i class="fa fa-ticket"></i> Complaints</h3></center>
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Farmer</th>
                                  <th>Title</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($farmer_data as $data): ?>
                                  <tr>
                                    <?php
                                      if ($data->status == 2) {
                                        ?>
                                        <td style="color: red; font-weight: bolder;"><?php echo $data->full_name; ?></td>
                                        <?php
                                      } else {
                                        ?>
                                        <td><?php echo $data->full_name; ?></td>
                                        <?php
                                      }
                                    ?>
                                    <?php
                                      if ($data->status == 2) {
                                        ?>
                                        <td style="color: red; font-weight: bolder;"><?php echo $data->title; ?></td>
                                        <?php
                                      } else {
                                        ?>
                                        <td><?php echo $data->title; ?></td>
                                        <?php
                                      }
                                    ?>
                                    <td><a href="complaint_details.php?id=<?php echo $data->id; ?>">View Details</a></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                            </div>
                        </div>
                </div>




</body>
</html>
