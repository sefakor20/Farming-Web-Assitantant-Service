<?php 
session_start();
require_once '../Connection/config.php';

//Taking users input
if(isset($_POST['submit'])){
$username = mysqli_escape_string($connection, $_POST['username']);
$password = mysqli_escape_string($connection, $_POST['password']);
$password = md5($password);

//Query the database to see if everything is ok
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' LIMIT 1";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$admin_data = mysqli_fetch_object($result);

//validating Admin input
if(empty($admin_data->id)){
	$_SESSION['error'] = 'Username or Password incorrect';
	$_SESSION['username'] = $username;
	header('location: ../Admin/login.php');
}else{
	$_SESSION['admin'] = $admin_data->id;
	$_SESSION['admin_name'] = $admin_data->full_name;
	header('location: ../Admin/index.php');
}

}else{
	exit();
}

 ?>