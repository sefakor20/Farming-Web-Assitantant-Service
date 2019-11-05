<?php 
session_start();
require_once '../Connection/config.php';

if(empty($_SESSION['id'])) {
    header('location: ../farmer/login.php');
}
/*
$farmer_query = 'SELECT * FROM farmers';
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
    <title>Dashboard</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body>
    <div id="wrapper">
        <?php include 'nav.php'; ?>

        <div id="page-wrapper">
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
                  <?php
                    if (isset($_SESSION['error'])) {
                      ?>
                      <span class="alert alert-danger"><?php echo $_SESSION['error']; ?></span>
                      <?php
                      $_SESSION['error'] = null;
                    }
                  ?>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-12"><br><br>
                    <div class="jumbotron">
                       <h3 style="text-transform: capitalize;"> Welcome <?php echo $_SESSION['extension_officer_name']; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                       <?php $time = date('H:i:s'); $date = date('m-d-y'); ?> 
                       
                    </div>
                </div>
            </div>

            <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <a href="https://www.accuweather.com/en/gh/ho/181677/weather-forecast/181677" class="aw-widget-legal">
          <!--
          By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
          -->
          </a><div id="awtd1530592281820" class="aw-widget-36hour"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="true" data-uid="awtd1530592281820" data-editlocation="true"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
        </div>
      </div>
    </div>


            
        </div>
    </div>
    <!-- /#wrapper -->

</body>
</html>
