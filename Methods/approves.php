<?php
session_start();
require_once '../Connection/config.php';

//farmer approving purchase
if (isset($_GET['farmer_approve'])) {
	//change status from 'pending' to 'delivered'
	$id = (int)$_GET['farmer_approve'];

	$query = "UPDATE purchase SET status = 2 WHERE id = '$id'";
	mysqli_query($connection, $query) or die(mysqli_error($connection));
	$_SESSION['success'] = 'Item sold successfully';
	header('location: ../farmer/purchase.php');
}

?>