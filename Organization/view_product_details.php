<?php
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['organization'])) {
    header('location: ../farmer/login.php');
}
$product_posted_query = "SELECT products.id, farmers.id AS farmer_id, crop.crop_id, farmers.full_name, farmers.phone_no, crop.crop_name, products.price, products.quantity FROM products JOIN farmers ON farmers.id = products.farmer_id JOIN crop ON crop.crop_id = products.crop_id ORDER BY products.id DESC ";
$product_posted_result = mysqli_query($connection, $product_posted_query) or die(mysqli_error($connection));
$posted_data = array();

while($posted_info = mysqli_fetch_object($product_posted_result)){
    $posted_data[] = $posted_info;
}

//var_dump($posted_data); exit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products from farmers</title>

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
        <br><br>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Poducts from farmers</h3>
                        </div>
                        <div class="panel-body">
                             <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Farmer</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Crop</th>
                          <th scope="col">Unit Price <small>(GHS)</small></th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($posted_data as $data_result): ?>
                            <?php
                                if ($data_result->quantity > 0) {
                                    ?>
                                    <tr>
                          <td><?php echo $data_result->full_name; ?></td>
                          <td><?php echo $data_result->phone_no; ?></td>
                          <td><?php echo $data_result->crop_name; ?></td>
                          <td><?php echo $data_result->price; ?></td>
                          <td><?php echo $data_result->quantity; ?></td>
                          <td><a href="#" data-target="#purchase<?php echo $data_result->id; ?>" data-toggle="modal">Buy</a></td>
                        </tr>

                        <div id="purchase<?php echo $data_result->id; ?>" class="modal fade purchase-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel"> Buy</h4>
          </div>
          <div class="modal-body">
             <div class="panel-body">
                <form method="post" action="../Methods/make_purchase.php">
                    <input type="hidden" name="crop_id" value="<?php echo $data_result->crop_id; ?>" required>
                    <input type="hidden" name="farmer_id" value="<?php echo $data_result->farmer_id; ?>" required>
                    <input type="hidden" name="organization_id" value="<?php echo $_SESSION['organization']; ?>" required>
                    <input type="hidden" name="previous_qty" value="<?php echo $data_result->quantity; ?>" required>
                    <input type="hidden" name="product_id" value="<?php echo $data_result->id; ?>" required>
                    <div class="form-group">
                        <label>Quantity to buy</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Schedule date to take product</label>
                        <input type="date" name="schedule_date" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-block">Purchase</button>
                </form>
            </div>
          </div>
        </div>
      </div>
     </div>
                                    <?php
                                }
                            ?>
                        

                    <?php endforeach; ?>
                      </tbody>
                    </table>
                    <br><br>

                    <div class="row">
                            <div class="col-md-6 col-md-offset-8">
                                <span class="alert alert-danger alert-block"><i class="fa fa-exclamation-triangle"> Please note: 150kg = 1quantity</i></span>
                            </div>
                        </div>
                        <br><br>
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
