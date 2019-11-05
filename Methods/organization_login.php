<?php 
session_start();
require_once '../Connection/config.php';

//Taking users input
if(isset($_POST['submit'])){
$username = mysqli_escape_string($connection, $_POST['username']);
$password = mysqli_escape_string($connection, $_POST['password']);
$password = md5($password);

//Query the database to see if everything is ok
$query = "SELECT * FROM buying_organization WHERE username = '$username' AND password = '$password' LIMIT 1";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$organization_data = mysqli_fetch_object($result);

//validating users input
if(empty($organization_data->id)){
	$_SESSION['error'] = "Username or Password incorrect";
	$_SESSION['username'] = $username;
	header('location: ../Organization/login.php');
}else{
	$_SESSION['organization'] = $organization_data->id;
	$_SESSION['organization_name'] = $organization_data->organization_name;
	header('location: ../Organization/index.php');
}

}else{
	die('requested page not found');
}

 ?>