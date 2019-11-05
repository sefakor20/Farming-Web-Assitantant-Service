<?php
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])) {
	$title = mysqli_escape_string($connection, $_POST['title']);
	$content = mysqli_escape_string($connection, $_POST['content']);
	$status = 2;

	$query = "INSERT INTO tips (title, content, status) VALUES ('$title', '$content', '$status')";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Tips added successfully';
	header('location: ../extension_officer/farming_tips.php');

} else {
	exit();
}

?>