<?php
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
} 

$crops = fetchItem($connection, 'crop');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Crop</title>

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
          <?php
            if(isset($_SESSION['success'])) {
              ?>

              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                  </div>
                </div>
              </div>

              <?php
              $_SESSION['success'] = null;
            }
          ?>
          <div class="row">
            <div class="col-md-8 col-md-offset-1">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <center><h3 class="panel-title">Sell Product</h3></center>
                </div>
                <div class="panel-body">
                  <form method="POST" action="../Methods/sell_crop.php">
                    <input type="hidden" name="farmer_id" value="<?php echo $_SESSION['farmers']; ?>">
                      <div class="form-group">
                          <label>Crop</label>
                          <select name="crop_id" class="form-control" required>
                                        <option>select crop</option>
                                        <?php foreach($crops as $data): ?>
                                            <option value="<?php echo $data->crop_id; ?>"><?php echo $data->crop_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                      </div><!--
                      <div class="form-group">
                          <label>Farmer Name</label>
                          <input type="text" name="full_name" class="form-control" placeholder="Entet your Full Name">
                      </div>-->
                      <div class="form-group">
                          <label>Unit Price (GHS)</label>
                          <input type="number" name="unit_price" class="form-control" pattern="[0-9]+" required title="This field only accept numbers">
                      </div>
                      <div class="form-group">
                          <label>Quantity <small style="color: red;"><i class="fa fa-exclamation-triangle"> (Please note: 150kg = 1quantity)</i></small></label></label>
                          <input type="number" name="quantity" class="form-control" pattern="[0-9]+" required>
                      </div>
                      <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>





      <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel"> Ready to Leave?</h4>
          </div>
          <div class="modal-body">
             <div class="panel-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
     </div> 
            
    </div>

    </div>
    <!-- /#wrapper -->
</body>
</html>
