<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>   
</head>
<body style="background-color: #D3D3D3;">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">
                    <h3 class="panel-title">Login / Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="../Methods/login.php">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} ?>" class="form-control" required>
                        </div>
                        <?php
                            if (isset($_SESSION['success'])) {
                                ?>
                                <span style="color: green;"><?php echo $_SESSION['success']; ?></span>
                                <?php
                                $_SESSION['success'] = null;
                            }
                        ?>
                        <?php
                            if (isset($_SESSION['error'])) {
                                ?>
                                <span style="color: red;"><?php echo $_SESSION['error']; ?></span>
                                <?php
                                $_SESSION['error'] = null;
                            }
                        ?>
                         <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">Login</button><br>
                        <center><span style="color: red; font-size: 17px;">Are you a new user?</span></center><br>
                    <ul class="row" style="list-style: none;">
                        <li class="col-md-8 col-md-offset-1"><a href="signup.php" class="btn btn-info btn-block">Sign up as a Farmer</a></li><br><br>
                        <li class="col-md-8 col-md-offset-1"><a href="../organization/signup.php" class="btn btn-warning btn-block">Sign up as a Buyer</a></li>
                    </ul>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>

</body>
</html>
