<?php 
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])){
	$id = (int)$_POST['id'];
	$full_name = mysqli_escape_string($connection, $_POST['full_name']);
	$phone_no = mysqli_escape_string($connection, $_POST['phone_no']);
	$username = mysqli_escape_string($connection, $_POST['username']);
	$old_password = mysqli_escape_string($connection, $_POST['old_password']);
	$old_password = md5($old_password);
	$password = mysqli_escape_string($connection, $_POST['password']);
	$confirm_password = mysqli_escape_string($connection, $_POST['confirm_password']);
	

	//query to view the old password and match it
	$old_password_query = "SELECT password FROM extension_officers WHERE id = $id LIMIT 1";
	$result = mysqli_query($connection, $old_password_query) or die(mysqli_error($connection));
	$content = mysqli_fetch_object($result);

	$password_to_compare = $content->password;

	//compare to see if old password matches the provided one
	if($old_password === $password_to_compare) {
		//user provided an acurate old password
		if($password === $confirm_password) {
			//new passwords match
			$password = md5($password);
			$update_query = "UPDATE extension_officers SET full_name = '$full_name', phone_no = '$phone_no', username = '$username', password = '$password', updated_at = NOW() WHERE id = '$id'";
			mysqli_query($connection, $update_query) or die(mysqli_error($connection));
			$_SESSION['success'] = 'Account update successfull';
			header('location: ../extension_officer/index.php');

		} else {
			//new passwords do not match
			$_SESSION['error'] = 'New passwords do not match';
			header('location: ../extension_officer/index.php');
		}

	} else {
		//user did not provide an acurate old password
		$_SESSION['error'] = 'Invalid old password';
		header('location: ../extension_officer/index.php');
	}

}else{
	exit();
}

 ?>