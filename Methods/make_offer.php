<?php
session_start();
require_once '../Connection/config.php';

if (isset($_POST['submit'])) {
	$farmer_id = (int)$_POST['farmer_id'];
	$crop_id = (int)$_POST['crop_id'];
	$id = (int)$_POST['id'];
	$old_quantity = (int)$_POST['old_quantity'];
	$quantity = (int)$_POST['quantity'];
	$organization_id = (int)$_POST['organization_id'];

	//check if new quanty is more than old quantity, error
	if($quantity > $old_quantity) {
		$_SESSION['error'] = 'quantity provided: '.$quantity.' cannot be more than quantity required:'.' '.$old_quantity;
		header('location: ../farmer/make_offer.php?crop_id='.$crop_id);
		exit();
	}

	//set new quantity
	$new_quantity = $old_quantity - $quantity;
	$new_quantity_query = "UPDATE ads SET quantity = '$new_quantity' WHERE id = '$id'";
	mysqli_query($connection, $new_quantity_query);

	//make new offer
	$offer_query = "INSERT INTO ads_offer (farmer_id, crop_id, organization_id, quantity) VALUES ('$farmer_id', '$crop_id', '$organization_id', '$quantity')";
	mysqli_query($connection, $offer_query);

	$_SESSION['success'] = 'Offer made successfully';
	header('location: ../farmer/make_offer.php?crop_id='.$crop_id);

} else {
	die('requested page not found');
}

?>