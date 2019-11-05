<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['id'])) {
    header('location: ../farmer/login.php');
}

if(empty($_GET['id'])) {
    header('location: view_complaint.php');
}

$id = $_GET['id'];

//chenge status
$query = 'UPDATE complaint SET status = 1 WHERE id = '.$_GET['id'];
mysqli_query($connection, $query);

$farmer_query = "SELECT complaint.id, complaint.title, complaint.complaint_content, farmers.full_name FROM complaint JOIN farmers ON farmers.id = complaint.farmer_id WHERE complaint.id = '$id' ";
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = mysqli_fetch_object($farmer_result);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaint - <?php echo $farmer_data->title; ?></title>

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
                           <center><h3 class="panel-title"><i class="fa fa-ticket"></i> Complaints</h3></center>
                        </div>
                        <div class="panel-body">
                            <h1 style="text-transform: capitalize;"><?php echo $farmer_data->title; ?></h1>
                            <p><spanstyle="text-transform: capitalize;">By: <?php echo $farmer_data->full_name; ?></span></p>
                            <p>
                              <?php echo $farmer_data->complaint_content; ?>
                            </p>
                            <p><a href="reply_complaint.php?id=<?php echo $_GET['id']; ?>" style="float: left; margin-top: 20px;">Reply</a></p>
                            <p><a href="view_complaint.php" style="float: right; margin-top: 20px;">Back To Complaints</a></p>
                        </div>

                </div>



</body>
</html>
