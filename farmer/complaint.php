<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>

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

         <div class="container">
           <div class="row">
              <div class="col-md-8 col-md-offset-1">
                <?php
                  if (isset($_SESSION['success'])) {
                    ?>
                    <span class="alert alert-success"><?php echo $_SESSION['success']; ?></span>
                    <?php
                    $_SESSION['success'] = null;
                  }
                ?>
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Complaint</h3>
                  </div>
                  <div class="panel-body">
                    <form method="POST" action="../Methods/complain.php">
                      <input type="hidden" name="farmer_id" value="<?php echo $_SESSION['farmers']; ?>">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Message</label>
                        <textarea name="complaint_msg" class="form-control" rows="5"></textarea>
                      </div>
                      <center><button type="submit" name="submit" class="btn btn-info btn-block"><strong>Submit</strong></button></center>
                    </form>
                  </div>
                </div>
              </div> 
           </div>
         </div>
         <hr>  

         <!--<div class="container">
           <div class="row">
             <div class="col-md-8 col-md-offset-4">
               <button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">View Complaint Status</button>
             </div>
           </div>
         </div> 


      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Complaint Status</h4>
          </div>
          <div class="modal-body">
             <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Complaint</th>
                              <th>Status</th>
                              <th>Username</th>
                          </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>101</td>
                           <td>Required Fertilizer</td>
                           <td>Unread</td>
                           <td>sefakor@</td>
                         </tr>
                       </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
     </div> 





      <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
     </div> 
            
    </div>-->

      </div><!-- .// wrapper -->

    
</body>
</html>
