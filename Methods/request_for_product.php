<?php
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])) {
	$crop = (int)$_POST['crop'];
	$organization_id = (int)$_POST['organization_id'];
	$quantity = mysqli_escape_string($connection, $_POST['quantity']);

	$query = "INSERT INTO ads (quantity, crop_id, organization_id) VALUES ('$quantity', '$crop', '$organization_id')";

	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Request successfull';
	header('location: ../Organization/index.php');

} else {
	exit();
}

?>