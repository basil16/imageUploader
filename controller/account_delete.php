<?php
session_start();

include('../model/Database.php');

$id = $_POST['id'];


if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] == 'administrator') {
	
	$db = new Database();
	$con = $db->connect();
	$sql = "UPDATE user_accounts SET status = '0' WHERE account_id = '$id' ";
	if ($con->query($sql)) {
		return true;
	}
	return false;
	
} else {
	echo "Please log in as administrator.";
	die();
}