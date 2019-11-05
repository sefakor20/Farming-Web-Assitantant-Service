<?php 
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$event_date = mysqli_escape_string($connection, $_POST['event_date']);
	$weather_info = mysqli_escape_string($connection, $_POST['weather_info']);
	$status = 2;
	$query = "INSERT INTO weather_trends (weather_info, event_date, status, created_at) VALUES ('$weather_info', '$event_date', '$status' NOW())";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Weather report added';
	header('location: ../extension_officer/weather.php');

}else{
	exit();
}

 ?>