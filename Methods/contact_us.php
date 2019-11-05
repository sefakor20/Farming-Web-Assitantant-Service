<?php
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])) {
	$name = mysqli_escape_string($connection, $_POST['name']);
	$email = mysqli_escape_string($connection, $_POST['email']);
	$message_title = mysqli_escape_string($connection, $_POST['message_title']);
	$message_content = mysqli_escape_string($connection, $_POST['message_content']);

	$query = "INSERT INTO contact_us (name, email, message_title, message_content) VALUES ('$name', '$email', '$message_title', '$message_content')";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'Message sent successfully';
	header('location: ../contact.php');

} else {
	exit();
}

?>