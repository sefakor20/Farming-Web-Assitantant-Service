<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

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
    <title>Farming Tips</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>        
</head>
<body>
 <div id="wrapper">
        <?php include 'nav.php'; ?>
        <?php
            if(isset($_SESSION['success'])) {
                ?>
                <span class="alert alert-success"><?php echo $_SESSION['success']; ?></span>
                <?php
                $_SESSION['success'] = null;
            }
        ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-10"><br><br>
                    <a href="https://www.accuweather.com/en/gh/ho/181677/weather-forecast/181677" class="aw-widget-legal">
                    <!--
                    By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
                    -->
                    </a><div id="awcc1530592281820" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="true" data-uid="awcc1530592281820"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
                </div>
            </div>
        </div>

         <div class="col-md-9 col-md-offset-1"><br><br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <center><h3 class="panel-title"><i class="fa fa-leaf"></i> Farming Tips</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="../Methods/farming_tips.php">
                                <input type="hidden" name="status" required>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" pattern="[A-Za-z]+" required>
                                </div>
                                <div class="form-group">
                                    <label>Tips (<small style="color: red;"><i>Note: the content of the farming tips should be editored here.</i></small>)</label>
                                    <textarea class="form-control" rows="5" placeholder="Enter tips here..." name="content" id="editor" required></textarea>
                                    <script>
                                        CKEDITOR.replace('editor');
                                  </script>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>


<!--
    <div class="modal fade bs-example" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
     </div> -->

</body>
</html>
