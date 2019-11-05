<?php
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

$id = $_SESSION['id'];
$query = "SELECT * FROM extension_officers WHERE id = $id LIMIT 1";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$content = mysqli_fetch_object($result);

$notification = notCounter($connection, 'complaint');

$all_crops = fetchItem($connection, "crop");

?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Extension Officer - <?php echo $_SESSION['extension_officer_name']; ?></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="add_new_crop.php"><i class="fa fa-tags"></i> Add Crops</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#allCropsModal"><i class="fa fa-grav"></i> View all Crops</a></li>
                    <!--<li><a href="crop_received.php"><i class="fa fa-tree active"></i> Crop Received</a></li>-->
                    <li><a href="view_complaint.php"><i class="fa fa-ticket"></i> View / Reply Complaint (<?php echo $notification->total; ?>)</a></li>
                    <li><a href="farming_tips.php"><i class="fa fa-leaf"></i> Post Farming Tips</a></li>
                    <li><a href="weather.php"><i class="fa fa-cloud"></i> Weather Forecast</a></li>
                    <!--<li><a href="offers_made.php"><i class="fa fa-sitemap"></i> View Offers</a></li>
                    <li><a href="add_organization.php"><i class="fa fa-sitemap"></i> Add Buying Organization</a></li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="account.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                             <li><a href="#" data-toggle="modal" data-target="#updateModal"><i class="fa fa-gear"></i> Update Profile</a></li>
                        </ul>
                    </li>
                   <li><a href="../farmer/logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
            </div>
        </nav>




         <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update My Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="../Methods/update_extension_officer_profile.php">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="<?php echo $content->full_name; ?>" required>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <label>Mobile No.</label>
                    <input type="text" name="phone_no" class="form-control"  value="<?php echo $content->phone_no; ?>" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"  value="<?php echo $content->username; ?>" required>
                </div>
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="old_password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>  
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div> 
            <button class="btn btn-primary btn-block" name="submit" type="submit">Update</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- .// Update Modal -->


         <!-- All crops Modal -->
    <div class="modal fade" id="allCropsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Crops Added</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul>
                <?php foreach($all_crops as $crop): ?>
                <li><?php echo $crop->crop_name; ?></li>
            <?php endforeach; ?>
            </ul>
          </div>
          <div class="modal-footer">
            <a href="add_new_crop.php" class="btn btn-success">Add New Crop</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- .// All crops Modal -->
