<?php
session_start();
require_once '../Connection/config.php';

if(isset($_POST['submit'])) {
	$crop = (int)$_POST['crop'];
	$org = (int)$_POST['org'];
	$qty_required = mysqli_escape_string($connection, $_POST['qty_required']);

	if (isset($_FILES['crop_img'])) {
		$crop_img_name = $_FILES['crop_img']['name'];
		$crop_img_tmp_name = $_FILES['crop_img']['tmp_name'];
		$crop_img_name_type = $_FILES['crop_img']['type'];
		$crop_img_name_size = $_FILES['crop_img']['size'];
		$error = $_FILES['crop_img']['error'];

		if(!$crop_img_tmp_name) {
			$_SESSION['error'] = 'no image selected';
			header('location: ../extension_officer/post_ad.php');
			exit();
		}

		//destination
		$destination = move_uploaded_file($crop_img_tmp_name, '../Add-Photo/'.$crop_img_name);

		if(!$destination) {
			$_SESSION['error'] = 'image not successfull';
			header('location: ../extension_officer/post_ad.php');
			exit();
		}
	}

	$query = "INSERT INTO ads (photo, quantity, crop_id, organization_id) VALUES ('$crop_img_name', '$qty_required', '$crop', '$org')";
	mysqli_query($connection, $query);
	$_SESSION['success'] = 'ads successfull';
	header('location: ../extension_officer/post_ad.php');

} else {
	exit();
}

?>