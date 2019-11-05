<?php 
session_start();
require_once '../Connection/config.php';
require_once 'functions.php';

//Taking users input
if(isset($_POST['submit'])){
	$organization_name = mysqli_escape_string($connection, $_POST['organization_name']);
	$organization_contact = mysqli_escape_string($connection, $_POST['organization_contact']);
	$region = mysqli_escape_string($connection, $_POST['region']);
	$username = mysqli_escape_string($connection, $_POST['username']);
	$password = mysqli_escape_string($connection, $_POST['password']);
	$confirm_password = mysqli_escape_string($connection, $_POST['confirm_password']);


	//duplicate username
	$admin = duplicateUsername($connection, 'admin', $username);
	if (!empty($admin)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../Admin/add_buyer.php');
		exit();
	}

	$farmers = duplicateUsername($connection, 'farmers', $username);
	if (!empty($farmers)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../Admin/add_buyer.php');
		exit();
	}

	$buying_organization = duplicateUsername($connection, 'buying_organization', $username);
	if (!empty($buying_organization)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../Admin/add_buyer.php');
		exit();
	}

	$extension_officer = duplicateUsername($connection, 'extension_officers', $username);
	if (!empty($extension_officer)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../Admin/add_buyer.php');
		exit();
	}

	//comparing both password to see if they are same
	if($password === $confirm_password){
		$password = md5($password);

		// putting values into the database
		$query = "INSERT INTO buying_organization (organization_name, organization_contact, region, username, password, created_at) VALUES ('$organization_name', '$organization_contact', '$region', '$username', '$password', NOW())";
		mysqli_query($connection, $query);
		$_SESSION['success'] = "Buyer Added Successfully";
			header('location: ../Admin/add_buyer.php');
		
	}else{
		$_SESSION['error'] = "Password do not match";
		header('location: ../Admin/add_buyer.php');
	}
}else{
	die('Requested Page not found');
}

 ?>