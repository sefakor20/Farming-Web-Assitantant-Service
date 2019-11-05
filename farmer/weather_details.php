<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}


if(empty($_GET['id'])){
  header('Location: weather_reports.php');
}

$ids = $_GET['id'];

//chenge status
$query = 'UPDATE weather_trends SET status = 1 WHERE id = '.$_GET['id'];
mysqli_query($connection, $query);

$weather_report_details = fetchSingleItemWithWhereNoJoin($connection, "id, weather_info, event_date", "weather_trends", "id", "$ids");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Details</title>

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

        <div class="page-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-md-offset-1"><br><br>
              <b style="font-size: 20px; color: black;">Weather Report Content</b>
              <span class="pull-right" style="font-size: 20px; color: black;">For: <?php echo myDate($weather_report_details->event_date); ?></span>
              <p><?php echo $weather_report_details->weather_info; ?></p>
              <a href="weather_reports.php" class="pull-right"><i class="fa fa-arrow-left"></i> Go Back</a>
          </div>
        </div>
      </div>




      </div><!-- //. wrapper -->
</body>
</html>
