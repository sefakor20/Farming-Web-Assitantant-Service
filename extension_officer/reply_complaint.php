<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['id'])) {
    header('location: ../farmer/login.php');
}

if (empty($_GET['id'])) {
  header('location: view_complaint.php');
}

/*$farmer_query = "SELECT complaint.id, complaint.title, farmers.full_name FROM complaint JOIN farmers ON farmers.id = complaint.farmer_id ORDER BY complaint.id DESC";
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = array();

while ($farmer_info = mysqli_fetch_object($farmer_result)) {
    $farmer_data[] = $farmer_info;
}*/

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaint</title>

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
   
         <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <center><h3 class="panel-title"><i class="fa fa-ticket"></i> Reply Complaint</h3></center>
                        </div>
                        <div class="panel-body">
                          <!--<div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Farmer</th>
                                  <th>Title</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php //foreach($farmer_data as $data): ?>
                                  <tr>
                                    <td><?php //echo $data->full_name; ?></td>
                                    <td><?php //echo $data->title; ?></td>
                                    <td><a href="complaint_details.php?id=<?php //echo $data->id; ?>">View Details</a></td>
                                  </tr>
                                <?php //endforeach; ?>
                              </tbody>
                            </table>
                            </div>-->

                            <form method="POST" action="../Methods/reply_complaint.php">
                              <input type="hidden" name="message_id" value="<?php echo $_GET['id']; ?>">
                              <div class="form-group">
                                <label>Reply Message</label>
                                <textarea class="form-control" cols="5" rows="10" name="message"></textarea>
                              </div>
                              <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                            <p><a href="view_complaint.php" style="float: right; margin-top: 20px;">Back To Complaints</a></p>
                        </div>
                </div>




</body>
</html>
