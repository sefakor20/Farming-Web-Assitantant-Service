<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}


$weather_report = fetchItemDecending($connection, "id, event_date, status", "weather_trends", "id");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Reports</title>

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
        <div class="col-lg-12">
          <a href="https://www.accuweather.com/en/gh/ho/181677/weather-forecast/181677" class="aw-widget-legal">
          <!--
          By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
          -->
          </a><div id="awtd1530592281820" class="aw-widget-36hour"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="true" data-uid="awtd1530592281820" data-editlocation="true"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
        </div>
      </div>
    </div>




      </div><!-- //. wrapper -->
</body>
</html>
