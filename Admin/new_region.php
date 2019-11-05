<?php 
session_start();
require_once '../Connection/config.php';

if(empty($_SESSION['admin'])){
 header('location: ../farmer/login.php');
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
    <title>Add New Region</title>

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
        <?php
                  if (isset($_SESSION['success'])) {
                    ?>
                    <span class="btn btn-success"><?php echo $_SESSION['success']; ?></span>
                    <?php
                    $_SESSION['success'] = null;
                  }
                ?>


        <div class="col-lg-8 col-md-8 col-sm-8 offset-2">
          <div class="card mb-3 pull-right">
            <div class="card-header">
              <h3>Add New Region</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="../Methods/add_new_region.php">
                <div class="form-group">
                  <label>Region Name</label>
                  <input type="text" name="region_name" class="form-control" placeholder="Enter New Region here">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
              </form>
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

  </body>

</html>
