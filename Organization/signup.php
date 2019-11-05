<?php 
session_start();
require_once '../Connection/config.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->   
</head>
<body style="background-color: #D3D3D3;">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" ">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="../Methods/organization_signup.php">
                        <div class="form-group">
                            <label>Organization Name</label>
                            <input type="text" pattern="[A-Za-z]+" name="organization_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" pattern="[0-9]+" name="organization_contact" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"  name="username" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                         <?php
                          if (isset($_SESSION['error'])) {
                            ?>
                            <span style="color: red; font-weight: bolder;"><?php echo $_SESSION['error']; ?></span>
                            <?php
                            $_SESSION['error'] = null;
                          }
                        ?>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">Sign Up</button><br>
                        <span style="font-size: 17px;"><center>I Already have an account. <a href="../farmer/login.php">&nbsp; Login </a></span></center>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>

</body>
</html>
