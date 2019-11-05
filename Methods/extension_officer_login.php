<?php 
session_start();
require_once '../Connection/config.php';

//Taking users input
if(isset($_POST['submit'])){
$username = mysqli_escape_string($connection, $_POST['username']);
$password = mysqli_escape_string($connection, $_POST['password']);
$password = md5($password);

//Query the database to see if everything is ok
$query = "SELECT * FROM extension_officers WHERE username = '$username' AND password = '$password' LIMIT 1";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$farmer_data = mysqli_fetch_object($result);

//validating farmers input
if(empty($farmer_data->id)){
	$_SESSION['error'] = 'Username or Password incorrect';
	$_SESSION['username'] = $username;
	header('location: ../extension_officer/login.php');
}else{
	$_SESSION['id'] = $farmer_data->id;
	$_SESSION['extension_officer_name'] = $farmer_data->full_name;
	header('location: ../extension_officer/index.php');
}

}else{
	die('requested page not found');
}

 ?>