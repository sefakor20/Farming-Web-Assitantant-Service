<?php 
session_start();
require_once '../Connection/config.php';
require_once 'functions.php';

if (isset($_POST['submit'])) {
	$username = mysqli_escape_string($connection, $_POST['username']);
	$password = mysqli_escape_string($connection, $_POST['password']);
	$password = md5($password);

	//check admin table
	$admin_login = login($connection, 'admin', $username, $password);
	if (!empty($admin_login)) {
		//admin
		$_SESSION['admin'] = $admin_login->id;
		$_SESSION['admin_name'] = $admin_login->full_name;
		header('location: ../Admin/index.php');
	}

	//check farmers table
	$farmer_login = login($connection, 'farmers', $username, $password);
	if (!empty($farmer_login)) {
		//farmer
		$_SESSION['farmers'] = $farmer_login->id;
		$_SESSION['farmer_name'] = $farmer_login->full_name;
		header('location: ../farmer/index.php');
	}

	//extention officer
	$ex_officer_login = login($connection, 'extension_officers', $username, $password);
	if (!empty($ex_officer_login)) {
		//extension officer
		$_SESSION['id'] = $ex_officer_login->id;
		$_SESSION['extension_officer_name'] = $ex_officer_login->full_name;
		header('location: ../extension_officer/index.php');
	}

	//buying organization
	$buying_org = login($connection, 'buying_organization', $username, $password);
	if (!empty($buying_org)) {
		//buying organization
		$_SESSION['organization'] = $buying_org->id;
		$_SESSION['organization_name'] = $buying_org->organization_name;
		header('location: ../Organization/index.php');
	}

	//login not successfull
	if (empty($admin_login) && empty($farmer_login) && empty($ex_officer_login) && empty($buying_org)) {
		//login error
		$_SESSION['error'] = "Username or Password incorrect";
		$_SESSION['username'] = $username;
		header('location: ../farmer/login.php');
	}

}