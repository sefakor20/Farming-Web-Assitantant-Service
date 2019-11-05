<?php 
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$full_name = mysqli_escape_string($connection, $_POST['full_name']);
	$username = mysqli_escape_string($connection, $_POST['username']);
	$password = mysqli_escape_string($connection, $_POST['password']);
	$confirm_password = mysqli_escape_string($connection, $_POST['confirm_password']);

	// Comparing to see if password is the same
	if($password === $confirm_password){
		$password = md5($password);

		// putting data into the database
		$query = "INSERT INTO admin (full_name, username, password, created_at) VALUES ('$full_name', '$username', '$password', NOW())";
		mysqli_query($connection, $query);
		echo "User added successfully";
		header('location: ../Admin/login.php');
	}else{
		echo "password do not match";
	}
}else{
	exit();
}

 ?>