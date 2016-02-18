<?php
session_start();

include('../model/Database.php');
include('../model/UserAccount.php');

$id       = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];

$account = new UserAccount($username, $email, $password);

if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] == 'administrator') {
	$account->update($id);
} else {
	echo "Please log in as administrator.";
	die();
}