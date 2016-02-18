<?php
include('../model/Database.php');
$db = new Database();
$con = $db->connect();

$id = $_POST['id'];

$sql = "SELECT * FROM user_accounts WHERE account_id = '$id' LIMIT 1";

$result = $con->query($sql);

$row = $result->fetch_assoc();

$account = array(
	'username' => $row['username'],
	'email'    => $row['email']
);

echo json_encode($account);