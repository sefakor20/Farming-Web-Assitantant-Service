<?php 
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$post_id = (int)$_POST['post_id'];
	$new_quantity = mysqli_escape_string($connection, $_POST['new_quantity']);

	//query to update the table
	$query = "UPDATE ads SET quantity = '$new_quantity' WHERE id = '$post_id'";
	mysqli_query($connection, $query) or die(mysqli_error($connection));
	$_SESSION['success'] = 'Update successful';
	header('Location: ../Organization/requested_items.php');
}else{
	die('Requested Page Not Found');
}

 ?>