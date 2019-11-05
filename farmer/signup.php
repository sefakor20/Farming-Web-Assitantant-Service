<?php
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

//Query fetch region table
$region_query = fetchItem($connection, "region");

 //query to fetch gender
$gender_query = fetchItem($connection, "gender");

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
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>   
</head>
<body style="
background-color: #D3D3D3;">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" ">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="../Methods/farmer_signup.php">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" pattern="[A-Za-z]+" name="full_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="sex" class="form-control" required>
                                <option class="selected">Select gender</option>
                                <?php foreach($gender_query as $sex): ?>
                                    <option value="<?php echo $sex->id; ?>"><?php echo $sex->sex; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <select name="region" class="form-control" required>
                                <option class="selected">Choose your region</option>
                                <?php foreach($region_query as $reg): ?>
                                    <option value="<?php echo $reg->id; ?>"><?php echo $reg->region_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" pattern="[0-9]+" name="phone_no" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
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
                        <button type="submit" name="submit" class="btn btn-success btn-block">Sign Up</button>
                    </form><br>
                     <span><center>I Already have an account. <a href="login.php">&nbsp; Login </a></span></center>
                </div>
            </div>
        </div>    
    </div>
</div>

</body>
</html>
