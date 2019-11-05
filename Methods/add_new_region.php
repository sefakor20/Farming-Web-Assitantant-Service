<?php 
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$region_name = mysqli_escape_string($connection, $_POST['region_name']);
	$query = "INSERT INTO region (region_name) VALUES ('$region_name')";
	mysqli_query($connection, $query); 
	$_SESSION['success'] = 'Region added successfully';
	header('location: ../Admin/new_region.php');
}else{
	exit();
}


 ?>