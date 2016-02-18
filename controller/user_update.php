<?php
/*
 * This script will update the user information.
 */

session_start();

include('../model/Database.php');
include('../model/User.php');

// Initialize variables and value

$id         = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$country    = $_POST['country'];
$city       = $_POST['city'];
$facebook   = $_POST['facebook'];
$twitter    = $_POST['twitter'];


$user = new User();

// Set user data
$user->setFirstName($first_name);
$user->setLastName($last_name);
$user->setCountry($country);
$user->setCity($city);
$user->setFacebook($facebook);
$user->setTwitter($twitter);
$user->setId($id);

if ($user->update($user)) {
	// Update successful
	
	// Update session user data
	$_SESSION['user'] = array(
		'id'          => $id,
		'first_name'  => $first_name,
		'last_name'   => $last_name,
		'country'     => $country,
		'city'        => $city,
		'facebook'    => $facebook,
		'twitter'     => $twitter
	);
	echo "Update successful.";
	
} else {
	echo "An error occured. Please try again.";
}