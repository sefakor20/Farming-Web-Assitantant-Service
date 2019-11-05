<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign Up</title>

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

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Sign Up
        </div>
        <div class="card-body">
          <form method="POST" action="../Methods/admin_signup.php">
            <div class="form-group">
                  <label for="exampleInputName">Full name</label>
                  <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter your full name" name="full_name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">Confirm password</label>
                  <input type="password" class="form-control" id="exampleConfirmPassword" placeholder="Confirm password" name="confirm_password">
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="submit">Register</a>
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
