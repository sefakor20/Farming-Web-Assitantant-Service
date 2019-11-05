<?php
$id = $_SESSION['organization'];
$query = "SELECT * FROM buying_organization WHERE id = $id LIMIT 1";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$content = mysqli_fetch_object($result);

//query display notification counter
$product_notification = notCounter($connection, "products");

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Buyer - <?php echo $_SESSION['organization_name']; ?></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index.php"><i class="fa fa-truck"></i> Request for Product</a></li>
                    <!--<li><a href="approve_offers.php"><i class="fa fa-clock-o"></i> Approve Offers</a></li>-->
                    <li><a href="requested_items.php"><i class="fa fa-cubes"></i> All Requested Items</a></li>
                    <li><a href="view_product_details.php"><i class="fa fa-cart-plus"></i> Product posted by farmers </a></li>
                    <li><a href="all_product_purchased.php"><i class="fa fa-linode"></i> All Product Purchased</a></li>                 
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown" >
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#000;"><i class="fa fa-gear" ></i> Settings<b class="caret"></b></a>
                       <ul class="dropdown-menu">
                           <li><a href="#" data-toggle="modal" data-target="#organizationUpdateModal"><i class="fa fa-gear"></i> Update Profile</a></li>
                           <li class="divider"></li>
                           <li><a href="../farmer/login.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                       </ul>
                   </li>
                </ul>
            </div>
        </nav>



        <!-- Update Modal -->
    <div class="modal fade" id="organizationUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="../Methods/update_organization_profile.php">
                <div class="form-group">
                    <label>Organization Name</label>
                    <input type="text" name="organization_name" class="form-control" required value="<?php echo $content->organization_name; ?>" readonly>
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
               
                <div class="form-group">
                    <label>Mobile No.</label>
                    <input type="text" name="organization_contact" class="form-control" required value="<?php echo $content->organization_contact; ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required value="<?php echo $content->username; ?>">
                </div>
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="old_password" class="form-control">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                 <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
            <button class="btn btn-primary btn-block" name="submit" type="submit">Update Profile</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- .// Update Modal -->