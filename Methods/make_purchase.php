<?php
session_start();
require_once '../Connection/config.php';

if (isset($_POST['submit'])) {
	$crop_id = (int)$_POST['crop_id'];
	$farmer_id = (int)$_POST['farmer_id'];
	$organization_id = (int)$_POST['organization_id'];
	$quantity = (int)$_POST['quantity'];
	$previous_qty = (int)$_POST['previous_qty'];
	$product_id = (int)$_POST['product_id'];
	$schedule_date = mysqli_escape_string($connection, $_POST['schedule_date']);
	$today = date('Y-m-d');

	//check whether new quantity is more than provided quantity
	if ($quantity > $previous_qty) {
	 	$_SESSION['error'] = 'Requested quantity: '.$quantity.' is more than quantity available: '.$previous_qty;
	 	header('location: ../Organization/view_product_details.php');
	 	exit();
	 } 

	//check whether schedule date is not before the day of request
	if ($schedule_date < $today) {
		$_SESSION['error'] = "schedule_date less";
		header('location: ../Organization/view_product_details.php');
	 	exit();
	}

	//setting new quantity
	$new_quantity = $previous_qty - $quantity;
	$setting_new_quantity = "UPDATE products SET quantity = '$new_quantity' WHERE id = '$product_id' ";
	mysqli_query($connection, $setting_new_quantity) or die(mysqli_error($connection));

	//making purchase request
	$query = "INSERT INTO purchase (id, farmer_id, organization_id, crop_id, quantity, status, schedule_date, created_at) VALUES (NULL, '$farmer_id', '$organization_id', '$crop_id', '$quantity', 1, '$schedule_date', NOW())";
	mysqli_query($connection, $query) or die(mysqli_error($connection));
	$_SESSION['success'] = 'Request sent';
	header('location: ../Organization/view_product_details.php');
	
} else {
	die('requested page not found');
}

?>