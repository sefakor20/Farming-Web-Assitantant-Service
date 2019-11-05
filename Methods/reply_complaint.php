<?php
session_start();
require_once '../Connection/config.php';

if (isset($_POST['submit'])) {
	$message_id = (int)$_POST['message_id'];
	$message = mysqli_escape_string($connection, $_POST['message']);
	$status = 2;

	$query = "INSERT INTO reply (id, message_id, content, created_at, status) VALUES (NULL, '$message_id', '$message', NOW(), '$status')";
	mysqli_query($connection, $query) or die(mysqli_error($connection));
	$_SESSION['success'] = 'Reply sent';
	header('location: ../extension_officer/complaint_details.php?id='.$message_id);
	
} else {
	die('fuck you');
}

?>