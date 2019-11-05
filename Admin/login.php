<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

  </head>

  <body class="bg-dark">

    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <?php
              if (isset($_SESSION['success'])) {
                ?>
                <span style="color: green; font-weight: bolder;"><?php echo $_SESSION['success']; ?></span>
                <?php
                $_SESSION['success'] = null;
              }
            ?>
          <form method="POST" action="../Methods/admin_login.php">
            <div class="form-group">
              <label for="exampleInputName">Username</label>
              <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter Username" name="username">
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
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
