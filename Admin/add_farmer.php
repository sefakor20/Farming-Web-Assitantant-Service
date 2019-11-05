<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['admin'])){
 header('location: ../farmer/login.php');
}

//query to fetch gender
$gender_query = fetchItem($connection, "gender");

//query to fetch region
$region_query = fetchItem($connection, "region");


 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add New Farmer</title>

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
            <a href="#">Add User</a>
          </li>
          <li class="breadcrumb-item active">Farmer</li>
        </ol>

        <div class="col-lg-10">
          <?php
                  if (isset($_SESSION['success'])) {
                    ?>
                    <span class="alert alert-success"><?php echo $_SESSION['success']; ?></span>
                    <?php
                    $_SESSION['success'] = null;
                  }
                ?>
                <?php
                  if (isset($_SESSION['error'])) {
                    ?>
                    <span class="alert alert-danger"><?php echo $_SESSION['error']; ?></span>
                    <?php
                    $_SESSION['error'] = null;
                  }
                ?>
        </div>


        <div class="col-lg-10 col-md-12 col-sm-12 offset-2"><br><br>
          <div class="card mb-112">
            <div class="card-header">
              <h3>Add New Farmer</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="../Methods/admin_add_farmer.php">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" pattern="[A-Za-z]+" name="full_name" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Region</label>
                      <select name="region" class="form-control" required>
                        <option class="selected">Select Region</option>
                        <?php foreach($region_query as $region): ?>
                        <option value="<?php echo $region->id ?>"><?php echo $region->region_name; ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="date" name="date_of_birth" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mobile No.</label>
                      <input type="number" pattern="[0-9]+" name="phone" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Gender</label>
                      <select name="sex" class="form-control" required>
                        <option class="selected">Select Gender</option>
                        <?php foreach($gender_query as $sex): ?>
                        <option value="<?php echo $sex->id; ?>"><?php echo $sex->sex; ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <button type="submit" name="submit" class="btn btn-success pull-right" >Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <br><br><br>

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
