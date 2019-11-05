<?php 
session_start();
require_once '../Connection/config.php';
require_once '../Methods/functions.php';

if(empty($_SESSION['farmers'])) {
    header('location: login.php');
}

if (empty($_GET['id'])) {
    header('location: view_complaints.php');
}


//chenge status
$query = 'UPDATE reply SET status = 1 WHERE message_id = '.$_GET['id'];
mysqli_query($connection, $query);


$selected_complaint = fetchSingleItemWithWhereNoJoin($connection, "title, complaint_content, created_at", "complaint", "id", $_GET['id']);

$replies = fetchItemsWithoutJoin($connection, "content, created_at", "reply", "message_id", $_GET['id']);

// $complaint_details = fetchComplaintsWithReply($connection, $_GET['id']);var_dump($complaint_details);exit();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $selected_complaint->title; ?></title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <!-- logo -->
    <link rel="icon" type="image/png" href="logo-1.png">
    <!--/logo -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body>
    <div id="wrapper">
        <?php include 'nav.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Complaint Result</h3>
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-md-9">
                                   <div class="alert alert-danger">
                                    <span class="fa fa-clock-o "> <?php echo readableDate($selected_complaint->created_at); ?></span><br>
                                    <h3><?php echo $selected_complaint->title; ?></h3>
                                    <p><?php echo $selected_complaint->complaint_content; ?></p>
                                  </div> 
                                </div>
                            </div>
                                <?php foreach($replies as $reply): ?>
                                <div class="row">
                                    <div class="col-md-8 pull-right">
                                        <div class="alert alert-success">
                                            <span class="fa fa-clock-o "> <?php echo readableDate($reply->created_at); ?></span><br>
                                            <?php echo $reply->content; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php
                        if(isset($_SESSION['success'])) {
                            ?>
                            <span><?php echo $_SESSION['success']; ?></span>
                            <?php
                            $_SESSION['success'] = null;
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['error'])) {
                            ?>
                            <span><?php echo $_SESSION['error']; ?></span>
                            <?php
                            $_SESSION['error'] = null;
                        }
                    ?>
                </div>
            </div>

              
    
            
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
