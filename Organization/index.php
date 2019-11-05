<?php
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['organization'])) {
    header('location: ../farmer/login.php');
}

$farmer_query = 'SELECT * FROM crop';
$farmer_result = mysqli_query($connection, $farmer_query) or die(mysqli_error($connection));
$farmer_data = array();

while ($farmer_info = mysqli_fetch_object($farmer_result)) {
    $farmer_data[] = $farmer_info;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for product</title>

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
                            <span class="alert alert-success"><?php echo $_SESSION['success']; ?></span>
                            <?php
                            $_SESSION['success'] = null;
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['error'])) {
                            ?>
                            <span class="alert alert-danger"><?php echo $_SESSION['error']; ?></span>
                            <?php
                            $_SESSION['error'] = null;
                        }
                    ?>



            <div class="row">
                <div class="col-md-12 "><br>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align: center;"><i class="fa fa-truck"></i> Request for Product</h3>
                        </div>
                        <div class="panel-body">
                            
                            <form method="POST" action="../Methods/request_for_product.php">
                                <input type="hidden" name="organization_id" value="<?php echo $_SESSION['organization'] ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                     <div class="form-group">
                                        <label>Crop</label>
                                        <select name="crop" class="form-control">
                                            <option>select crop</option>
                                            <?php foreach($farmer_data as $data): ?>
                                                <option value="<?php echo $data->crop_id; ?>"><?php echo $data->crop_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Quantity required</label>
                                        <input type="number" name="quantity" class="form-control" required pattern="[0-9]+" title="This field only accept number"/>
                                    </div>
                                </div><br>
                                <div class="col-sm-4">
                                    <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
                                </div>
                                </div>
                            </form><br><br>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-4">
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
