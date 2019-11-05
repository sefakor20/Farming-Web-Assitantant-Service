
<?php 
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$crop_name = mysqli_escape_string($connection, $_POST['crop_name']);
	$query = "INSERT INTO crop (crop_name) VALUES ('$crop_name')";
	mysqli_query($connection, $query); 
	$_SESSION['crop_add'] = 'New crop added';
	header('location: ../extension_officer/add_new_crop.php');
}else{
	exit();
}


 ?>



