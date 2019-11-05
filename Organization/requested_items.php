<?php
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['organization'])) {
    header('location: ../farmer/login.php');
}


$requested_query = fetchJoinWhere($connection, "ads.id AS post_id, ads.quantity, crop.crop_name, buying_organization.organization_name", 'ads', "JOIN crop ON crop.crop_id = ads.crop_id JOIN buying_organization ON buying_organization.id = ads.organization_id", "ads.organization_id", $_SESSION['organization']);

//query to fetch all requested items
//$requested_query = fetchItemWithJoin($connection, "ads.id, ads.quantity, crop.crop_name, buying_organization.organization_name", "ads", "JOIN crop ON crop.crop_id = ads.crop_id JOIN buying_organization ON buying_organization.id = ads.organization_id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Requested Product</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->
</head>
<body>
    <div id="wrapper">
        <?php include 'navbar.php'; ?>
        <br>

        <div id="page-wrapper">
            <?php
            if(isset($_SESSION['success'])) {
              ?>

              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                  </div>
                </div>
              </div>

              <?php
              $_SESSION['success'] = null;
            }
          ?>
            <div class="row">
                <div class="col-md-10 "><br>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align: center;"><i class="fa fa-cubes"></i> Product Requested</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Crop</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($requested_query as $req): ?>
                                <?php if($req->quantity > 0){ ?>
                            <tr>
                                <td><?php echo $req->crop_name; ?></td>
                                <td><?php echo $req->quantity; ?></td>
                                <td><a href="#" data-toggle="modal" data-target="#exampleModal<?php  echo $req->post_id?>">Edit Post</a></td>
                            </tr>
                            <!-- Modal -->
<div class="modal fade" id="exampleModal<?php  echo $req->post_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit Post</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="POST" action="../Methods/buyer_change_quantity.php">
          <div class="modal-body">
                <input type="hidden" name="post_id" value="<?php echo $req->post_id; ?>" required>
                <div class="form-group">
                    <label>Crop Name</label>
                    <input type="text" name="crop_name" class="form-control" placeholder="<?php echo $req->crop_name; ?>" required readonly>
                </div>
                <div class="form-group">
                    <label>Old Quantity</label>
                    <input type="number" name="quantity" class="form-control" readonly placeholder="<?php echo $req->quantity; ?>" required>
                </div>
                <div class="form-group">
                    <label>New Quantity</label>
                    <input type="number" name="new_quantity" pattern="[0-9]+" class="form-control" required>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-success">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>              <?php } ?>
                        <?php endforeach; ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!--
        This section initializes the chart widgets and a grid component, 
        which visualize records and allow sorting and paging. 
        For more information visit: 
        http://www.shieldui.com/documentation/javascript.chart/getting.started
        http://www.shieldui.com/documentation/grid/javascript/getting.started
        http://www.shieldui.com/documentation/datasource/javascript/getting.started
    -->
    <script type="text/javascript">
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 443, 32],
                budget = [23, 19, 11, 134, 242, 352, 435, 22, 637, 445, 555, 57],
                sales = [11, 9, 31, 34, 42, 52, 35, 22, 37, 45, 55, 57];

            $("#shieldui-chart1").shieldChart({
                primaryHeader: {
                    text: "Visitors"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Q Data",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                primaryHeader: {
                    text: "Logins Per week"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                seriesSettings: {
                    donut: {
                        enablePointSelection: true
                    }
                },
                dataSeries: [{
                    seriesType: "donut",
                    collectionAlias: "logins",
                    data: visits
                }]
            });

            $("#shieldui-chart3").shieldChart({
                primaryHeader: {
                    text: "Budget"
                },
                dataSeries: [{
                    seriesType: "line",
                    collectionAlias: "Budget",
                    data: budget
                }]
            });

            $("#shieldui-chart4").shieldChart({
                primaryHeader: {
                    text: "Sales"
                },
                dataSeries: [{
                    seriesType: "bar",
                    collectionAlias: "sales",
                    data: sales
                }]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: gridData
                },
                sorting: {
                    multiple: true
                },
                paging: {
                    pageSize: 12,
                    pageLinksCount: 4
                },
                selection: {
                    type: "row",
                    multiple: true,
                    toggle: false
                },
                columns: [
                    { field: "id", width: "70px", title: "ID" },
                    { field: "name", title: "Person Name" },
                    { field: "company", title: "Company Name" },
                    { field: "email", title: "Email Address", width: "270px" }
                ]
            });
        });
    </script>
</body>
</html>
