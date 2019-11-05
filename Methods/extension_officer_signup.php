<?php 
session_start();
require_once '../Connection/config.php';
require_once 'functions.php';

//Taking users input
if(isset($_POST['submit'])){
	$full_name = mysqli_escape_string($connection, $_POST['full_name']);
	$sex = mysqli_escape_string($connection, $_POST['sex']);
	$region = mysqli_escape_string($connection, $_POST['region']);
	$phone_no = mysqli_escape_string($connection, $_POST['phone_no']);
	$date_of_birth = mysqli_escape_string($connection, $_POST['date_of_birth']);
	$username = mysqli_escape_string($connection, $_POST['username']);
	$password = mysqli_escape_string($connection, $_POST['password']);
	$confirm_password = mysqli_escape_string($connection, $_POST['confirm_password']);

	//duplicate username
	$admin = duplicateUsername($connection, 'admin', $username);
	if (!empty($admin)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../extension_officer/signup.php');
		exit();
	}

	$farmers = duplicateUsername($connection, 'farmers', $username);
	if (!empty($farmers)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../extension_officer/signup.php');
		exit();
	}

	$buying_organization = duplicateUsername($connection, 'buying_organization', $username);
	if (!empty($buying_organization)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../extension_officer/signup.php');
		exit();
	}

	$extension_officer = duplicateUsername($connection, 'extension_officers', $username);
	if (!empty($extension_officer)) {
		$_SESSION['error'] = 'Username: '.$username.', already exists';
		header('location: ../extension_officer/signup.php');
		exit();
	}

	//comparing both password to see if they are same
	if($password === $confirm_password){
		$password = md5($password);

		// putting values into the database
		$query = "INSERT INTO extension_officers (full_name, sex, region, phone_no, date_of_birth, username, password, created_at) VALUES ('$full_name', '$sex', '$region', '$phone_no', '$date_of_birth', '$username', '$password', NOW())";
		mysqli_query($connection, $query);
		$_SESSION['success'] = "Extension officer Added Successfully";
			header('location: ../extension_officer/login.php');
		
	}else{
		$_SESSION['error'] = "Password do not match";
		header('location: ../extension_officer/signup.php');
	}
}else{
	die('Requested Page not found');
}

 ?>