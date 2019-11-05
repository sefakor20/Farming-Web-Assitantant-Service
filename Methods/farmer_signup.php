<?php 
session_start();
require_once '../Connection/config.php';
require_once 'functions.php';

if(isset($_POST['submit'])){
	$full_name = mysqli_escape_string($connection, $_POST['full_name']);
	$sex = mysqli_escape_string($connection, $_POST['sex']);
	$region = mysqli_escape_string($connection, $_POST['region']);
	$username = mysqli_escape_string($connection, $_POST['username']);
	$password = mysqli_escape_string($connection, $_POST['password']);
	$confirm_password = mysqli_escape_string($connection, $_POST['confirm_password']);
	$phone_no = mysqli_escape_string($connection, $_POST['phone_no']);
	$date_of_birth = mysqli_escape_string($connection, $_POST['date_of_birth']);

	//duplicate username
	$admin = duplicateUsername($connection, 'admin', $username);
	if (!empty($admin)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../farmer/signup.php');
		exit();
	}

	$farmers = duplicateUsername($connection, 'farmers', $username);
	if (!empty($farmers)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../farmer/signup.php');
		exit();
	}

	$buying_organization = duplicateUsername($connection, 'buying_organization', $username);
	if (!empty($buying_organization)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../farmer/signup.php');
		exit();
	}

	$extension_officer = duplicateUsername($connection, 'extension_officers', $username);
	if (!empty($extension_officer)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../farmer/signup.php');
		exit();
	}

	// Comparing to see if password is the same
	if($password === $confirm_password){
		$password = md5($password);

		// putting data into the database
		$query = "INSERT INTO farmers (full_name, sex, region, username, password, phone_no, date_of_birth, created_at) VALUES ('$full_name', '$sex', '$region', '$username', '$password', '$phone_no', '$date_of_birth', NOW())";
		mysqli_query($connection, $query);
		$_SESSION['success'] = 'Account created successfully, please login';
		header('location: ../farmer/login.php');
	}else{
		$_SESSION['error'] = "password do not match";
		header('location: ../farmer/signup.php');
	}
}else{
	die('requested page not found');
}

 ?>