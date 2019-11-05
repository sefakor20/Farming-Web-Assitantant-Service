<?php
session_start();
require_once '../Connection/config.php';

if(isset($_GET['farmer_id'])) {
	$id = (int)$_GET['farmer_id'];

	$query = "DELETE FROM farmers WHERE id = '$id' ";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Delete successfull';
	header('location: all_farmers.php');
}


if(isset($_GET['extension_id'])) {
	$id = (int)$_GET['extension_id'];

	$query = "DELETE FROM extension_officers WHERE id = '$id' ";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Delete successfull';
	header('location: view_extension_officers.php');
}


if(isset($_GET['buyers_id'])) {
	$id = (int)$_GET['buyers_id'];

	$query = "DELETE FROM buying_organization WHERE id = '$id' ";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Delete successfull';
	header('location: all_buyers.php');
}

?>