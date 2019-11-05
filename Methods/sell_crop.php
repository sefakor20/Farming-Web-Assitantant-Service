<?php 
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$crop_id = mysqli_escape_string($connection, $_POST['crop_id']);
	$unit_price = mysqli_escape_string($connection, $_POST['unit_price']);
	$quantity = mysqli_escape_string($connection, $_POST['quantity']);
	$farmer_id = mysqli_escape_string($connection, $_POST['farmer_id']);

	$query = "INSERT INTO products (farmer_id, crop_id, price, quantity) VALUES ('$farmer_id', '$crop_id', '$unit_price', '$quantity')";
		mysqli_query($connection, $query);
	$_SESSION['success'] = 'product added successfully';
	header('location: ../farmer/sell_crop.php');

}else{
	die('requeste page not found');
}

 ?>