<?php
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
} 

if (empty($_GET['crop_id'])) {
  header('location: advertisement_details.php');
}

$crop_id = (int)$_GET['crop_id'];

$make_offer = fetchSingleItemWithWhere($connection, "ads.id, quantity, crop.crop_name, organization_id, crop.crop_id as crop_id, buying_organization.organization_name", "ads", "JOIN buying_organization ON buying_organization.id = ads.organization_id JOIN crop ON crop.crop_id = ads.crop_id ", "ads.id", $crop_id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Offer - <?php echo $make_offer->crop_name; ?></title>

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
            <div class="col-md-6 col-md-offset-2">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <center><h3 class="panel-title">Make Offer</h3></center>
                </div>
                <div class="panel-body">
                  <form method="POST" action="../Methods/make_offer.php">
                    <input type="hidden" name="farmer_id" value="<?php echo $_SESSION['farmers']; ?>">
                    <input type="hidden" name="crop_id" value="<?php echo $make_offer->id; ?>">
                    <input type="hidden" name="id" value="<?php echo $make_offer->id; ?>">
                    <input type="hidden" name="old_quantity" value="<?php echo $make_offer->quantity; ?>">
                    <input type="hidden" name="organization_id" value="<?php echo $make_offer->organization_id; ?>">
                      <div class="form-group">
                          <label>Organization</label>
                          <input type="text" value="<?php echo $make_offer->organization_name; ?>" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                          <label>Crop</label>
                          <input type="text" value="<?php echo $make_offer->crop_name; ?>" class="form-control" readonly>
                      </div>
                      <?php
                          if (isset($_SESSION['error'])) {
                            ?>
                            <span style="color: red; font-weight: bolder;"><?php echo $_SESSION['error']; ?></span>
                            <?php
                            $_SESSION['error'] = null;
                          }
                        ?>
                      <div class="form-group">
                          <label>Quantity</label>
                          <input type="number" value="<?php echo $make_offer->quantity; ?>" class="form-control" readonly title="This field only accept numeric values">
                      </div>
                      <div class="form-group">
                          <label>Quantity To Supply <small style="color: red;"><i class="fa fa-exclamation-triangle"> (Please note: 150kg = 1quantity)</i></small></label>
                          <input type="number" pattern="[0-9]+" name="quantity" class="form-control" required>
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
