<?php
session_start();
require_once '../Connection/config.php';

if (isset($_POST['submit'])) {
	$crop_id = (int)$_POST['crop_id'];
	$new_unit_price = mysqli_escape_string($connection, $_POST['new_unit_price']);

	$query = "UPDATE products SET price = '$new_unit_price' WHERE id = '$crop_id' ";
	mysqli_query($connection, $query) or die(mysqli_error($connection));
	$_SESSION['success'] = 'Price changed successfully';
	header('location: ../farmer/all_product_posted.php');
}

?>