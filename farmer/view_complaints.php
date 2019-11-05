<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}

//notification


$complaints = fetchItemsWithoutJoin($connection, "id, title, status", "complaint", "farmer_id", $_SESSION['farmers']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints Replies</title>

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
            <div class="col-md-10 col-md-offset-1">
              <?php foreach($complaints as $title): ?>
                <?php
                  //notification
                  $notification = notificationCounter($connection ,'reply', 'message_id', $title->id);
                ?>
                <ul style="list-style-type: circle;">
                  <li>
                    <?php
                      if ($title->status == 2) {
                        ?>
                        <a style="color: red; font-weight: bolder;" href="complaint_result.php?id=<?php echo $title->id; ?>"><?php echo $title->title; ?> </a> (<?php echo $notification->total; ?>)
                        <?php
                      } else {
                        ?>
                        <a href="complaint_result.php?id=<?php echo $title->id; ?>"><?php echo $title->title; ?> </a> (<?php echo $notification->total; ?>)
                        <?php
                      }
                    ?>
                    
                  </li>
                </ul>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>




      </div><!-- //. wrapper -->
</body>
</html>
