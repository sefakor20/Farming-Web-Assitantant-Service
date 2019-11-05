<?php 
session_start();
require_once '../Connection/config.php';

if(empty($_SESSION['admin'])){
 header('location: ../farmer/login.php');
}

$farmer_query = "SELECT farmers.id, full_name, phone_no, created_at, region.region_name as region FROM farmers JOIN region ON region.id = farmers.region ORDER BY farmers.id DESC";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>All Farmers</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <?php include 'nav.php' ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">All Farmers Enrolled</li>
        </ol>

        <?php
                  if (isset($_SESSION['success'])) {
                    ?>
                    <span class="btn btn-success"><?php echo $_SESSION['success']; ?></span>
                    <?php
                    $_SESSION['success'] = null;
                  }
                ?>


        <div class="col-lg-12 col-md-12 col-sm-12 offset-2">
          <div class="card mb-12">
            <div class="card-header">
              <h3>All Farmers</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Region</th>
                      <th>Contact</th>
                      <th>Registered</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($farmer_data as $data): ?>
                    <tr>
                      <td style="text-transform: capitalize;"><?php echo $data->full_name; ?></td>
                      <td><?php echo $data->region; ?></td>
                      <td><?php echo $data->phone_no; ?></td>
                      <td><?php echo strftime("%a %b %d, %Y", strtotime($data->created_at)); ?></td>
                      <td><!--<a href="update_farmer.php?id=<?php echo $data->id; ?>">Update</a>--> <a onclick="deleteItem(event);" href="delete.php?farmer_id=<?php echo $data->id; ?>">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <?php include 'footer.php'; ?>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>

    <!-- Custom scripts for this template -->
    <script type="text/javascript" src="script.js"></script>


  </body>

</html>
