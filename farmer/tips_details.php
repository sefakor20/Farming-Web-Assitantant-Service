<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}

if(empty($_GET['id'])) {
    header('location: tips.php');
}

$id = $_GET['id'];

$query = "SELECT title, content FROM tips WHERE id = '$id'";
$result = mysqli_query($connection, $query);
$contents = mysqli_fetch_object($result);

//update status
$status_query = 'UPDATE tips SET status = 1 WHERE id = '.$_GET['id'];
mysqli_query($connection, $status_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farming Tips - <?php echo $contents->title; ?></title>

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
            <div class="col-md-10 ">
              <h1 style="text-transform: capitalize;"><?php echo $contents->title; ?></h1>
              <p>
                <?php echo $contents->content; ?>
              </p>
              <p>
                <a href="tips.php" style="float: right; margin-top: 20px;">Back To Tips</a>
              </p>
            </div>
          </div>
        </div>
      </div>




      

      </div><!-- //. wrapper -->
</body>
</html>
