<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['id'])) {
    header('location: ../farmer/login.php');
}

$farmer_query = 'SELECT * FROM crop';
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = array();

while ($farmer_info = mysqli_fetch_object($farmer_result)) {
    $farmer_data[] = $farmer_info;
}


$org_query = 'SELECT * FROM buying_organization';
$org_result = mysqli_query($connection, $org_query) or die(mysqli_error($connection));
$org_data = array();

while ($org_info = mysqli_fetch_object($org_result)) {
    $org_data[] = $org_info;
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Crop</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style>
        img {
            filter: gray; /* IE6-9 */
            -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
            -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
            box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
            margin-bottom: 20px;
        }
        img:hover {
            filter: none; /* IE6-9 */
            -webkit-filter: grayscale(0); /* Google Chrome, Safari 6+ & Opera 15+ */
        }
    </style>
</head>
<body>
 <div id="wrapper">
        <?php include 'nav.php'; ?>

            <div class="row">
                <div class="col-lg-4">
                    <div class="col-lg-4">
                        <?php
                                    if (isset($_SESSION['crop_add'])) {
                                        ?>
                                        <span class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $_SESSION['crop_add']; ?></span>
                                        <?php
                                        $_SESSION['crop_add'] = null;
                                    }
                                ?>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3"><br><br><br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tags"></i> New Crop</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="../Methods/add_new_crop.php" enctype="multipart/form-data">
                                <?php
                                    if (isset($_SESSION['success'])) {
                                        ?>
                                        <span class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><?php echo $_SESSION['success']; ?></span>
                                        <?php
                                        $_SESSION['success'] = null;
                                    }
                                ?>
                                <?php
                                    if (isset($_SESSION['error'])) {
                                        ?>
                                        <span class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">><?php echo $_SESSION['error']; ?></span>
                                        <?php
                                        $_SESSION['error'] = null;
                                    }
                                ?>
                                <div class="form-group">
                                    <label>Crop Name</label>
                                    <input type="text" name="crop_name" class="form-control" pattern="[A-Za-z]+" required>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-block" name="submit">Add Crop</button>
                            </form>
                        </div>
                    </div><br><br><br>
                </div>
            </div>
        </div>

                 <!-- Add New crop modal -->

         <div class="modal fade add-new-crop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel"> Add New Crop</h4>
          </div>
          <div class="modal-body">
             <div class="panel-body">
                <form method="POST" action="../Methods/add_new_crop.php">
                    <div class="form-group">
                        <label>Crop Name</label>
                        <input type="text" name="crop_name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block" name="submit">Add Crop</button>
                </form>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>-->
          </div>
        </div>
      </div>
     </div>
     <!-- ./ Add new crop modal -->
        




    
</body>
</html>
