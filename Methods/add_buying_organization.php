<?php 
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$organization_name = mysqli_escape_string($connection, $_POST['organization_name']);
	$organization_contact = mysqli_escape_string($connection, $_POST['organization_contact']);
	$query = "INSERT INTO buying_organization (organization_name, organization_contact) VALUES ('$organization_name', '$organization_contact')";
	mysqli_query($connection, $query); 
	$_SESSION['success'] = 'Organization added successfully';
	header('location: ../extension_officer/add_organization.php');
}else{
	exit();
}


 ?>