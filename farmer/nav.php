<?php
$id = $_SESSION['farmers'];
$query = "SELECT * FROM farmers WHERE id = $id LIMIT 1";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$content = mysqli_fetch_object($result);

//query to fetch all ofers made by a particular farmer
$o_query = fetchJoinWhere($connection, "crop.crop_name, buying_organization.organization_name, quantity", 'ads_offer', "JOIN farmers ON farmers.id = ads_offer.farmer_id JOIN crop ON crop.crop_id = ads_offer.crop_id JOIN buying_organization ON buying_organization.id = ads_offer.organization_id", "ads_offer.farmer_id", $_SESSION['farmers']);

//query to display the notification for weather trends
$notification_weather = notCounter($connection, "weather_trends");

//query to display the notification for farming tips
$tips_notification = notCounter($connection, "tips");


?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Farmer - <?php echo $_SESSION['farmer_name']; ?></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" >
                    <li><a href="complaint.php" ><i class="fa fa-commenting-o"></i> Complaint</a></li>
                    <!--<li><a href="purchase.php" ><i class="fa fa-edit"></i> Approve Purchase</a></li>-->
                    <li><a href="view_complaints.php" ><i class="fa fa-edit"></i> View Complaints Replies</a></li>                    
                    <li><a href="tips.php" ><i class="fa fa-leaf active"></i> Farming tips (<?php echo $tips_notification->total; ?>) </a></li>
                     <li><a href="weather_reports.php" ><i class="fa fa-cloud active"></i>  Weather Reports </a></li>
                    <li><a href="advertisement_details.php" ><i class="fa fa-list-alt"></i> Crop Advertiment Details</a></li>
                    <li><a href="sell_crop.php" ><i class="fa fa-cubes"></i> Sell Crop</a></li>   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-clipboard" ></i> View <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="all_product_posted.php" >All Product Posted</a></li>
                            <li><a href="#" data-toggle="modal" data-target=".all-offers-made" > All Offers made</a></li>
                        </ul>
                    </li>                
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="account.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                             <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-gear"></i> Update Profile</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
               </ul>
            </div>
        </nav>





         <!-- Update Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update My Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="../Methods/update_farmer_profile.php">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" required value="<?php echo $content->full_name; ?>">
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
               
                <div class="form-group">
                    <label>Mobile No.</label>
                    <input type="text" name="phone_no" class="form-control" required value="<?php echo $content->phone_no; ?>">
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

    







     <!-- All offers made -->
         <div class="modal fade all-offers-made" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel"> All Offers Made</h4>
          </div>
          <div class="modal-body">
             <div class="panel-body">
                <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Organization</th>
                          <th scope="col">Crop</th>
                          <th scope="col">Quantity Supplied</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($o_query as $data): ?>
                        <tr>
                          <td><?php echo $data->organization_name; ?></td>
                          <td><?php echo $data->crop_name; ?></a></td>
                          <td><?php echo $data->quantity; ?></td>
                        </tr>
                    <?php endforeach; ?>
                      </tbody>
                    </table>
            </div>
          </div>
        </div>
      </div>
     </div>
     <!--./ All offers made -->


