<?php
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])) {
	$farmer_id = (int)$_POST['farmer_id'];
	$title = mysqli_escape_string($connection, $_POST['title']);
	$content = mysqli_escape_string($connection, $_POST['complaint_msg']);
	$status = 2;

	$query = "INSERT INTO complaint (farmer_id, title, complaint_content, status) VALUES ('$farmer_id', '$title', '$content', '$status')";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Complaint added successfully';
	header('location: ../farmer/complaint.php');

} else {
	exit();
}

?>