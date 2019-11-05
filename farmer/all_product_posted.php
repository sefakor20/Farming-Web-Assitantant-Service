<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}

// query to fetch the product posted by a farmer
$product_posted_query = fetchJoinWhere($connection, "crop.crop_name, products.id AS crop_id, products.price, products.quantity", 'products', "JOIN farmers ON farmers.id = products.farmer_id JOIN crop ON crop.crop_id = products.crop_id", "products.farmer_id", $_SESSION['farmers']); 


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product Posted</title>

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
              <div class="col-md-10 "><br><br>
                
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">All Products to Sell</h3>
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Crop Name</th>
                          <th scope="col">Unit Price <small> (GHS)</small></th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($product_posted_query as $data_info): ?>
                          <?php if($data_info->quantity > 0){
                            ?>
                        <tr>
                          <td><?php echo $data_info->crop_name; ?></td>
                          <td><?php echo $data_info->price; ?></td>
                          <td><?php echo $data_info->quantity; ?></td>
                          <td><a href="#" data-target="#change_id<?php echo $data_info->crop_id; ?>" data-toggle="modal">Change</a></td>
                        </tr>

                         <!-- change price modal -->
     <div id="change_id<?php echo $data_info->crop_id; ?>" class="modal fade new-price-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel"> Change Price</h4>
          </div>
          <div class="modal-body">
             <div class="panel-body">
                <form method="post" action="../Methods/farmer_change_price.php">
                  <input type="hidden" name="crop_id" required value="<?php echo $data_info->crop_id; ?>">
                    <div class="form-group">
                        <label>Crop Name</label>
                        <input type="text" name="crop_name" class="form-control" placeholder="<?php echo $data_info->crop_name; ?>"  readonly>
                    </div>
                    <div class="form-group">
                        <label>Old Unit Price</label>
                        <input type="text" name="old_price" class="form-control" placeholder="<?php echo $data_info->price; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>New Unit Price</label>
                        <input type="text" name="new_unit_price" class="form-control" >
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-block">Update</button>
                </form>
            </div>
          </div>
        </div>
      </div>
     </div>
     <!-- ./ change price modal -->
                  <?php } ?>

                    <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> 
           </div>
         </div>
         <hr> 


        

      </div><!-- .// wrapper -->

    
</body>
</html>
