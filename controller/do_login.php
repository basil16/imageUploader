<?php

/* ------------------
 * This script will do the user login process
 *---------------------------*/

session_start();
include('../model/Database.php');
include('../model/UserAuthentication.php');
include('../model/User.php');

if (isset($_POST['login'])) {
	
	// Get the username and password from POST variable
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Declare view variable to be used of what the page is going to display.
	$view = "";
	
	// Use UserAuthentication class for login 
	$user = new UserAuthentication($username, $password);
	
	// Do user login
	$result = $user->login();
	
	// Check the result row
	if ($result->num_rows > 0) {
		
		// login successful
		
		$row = $result->fetch_assoc();
		
		// Get user account id
		$id = $row['account_id'];
		
		// Set session user type
		$user_type = $row['user_type'];
		
		$user = new User();
		
		// Get the user information using id
		$result = $user->getUserData($id);
	
		if ($result) {
			
			$row = $result->fetch_assoc();
		
			// Save user data in a session variable.
			$_SESSION['user'] = array(
				'id'          => $row['id'],
				'first_name'  => $row['first_name'],
				'last_name'   => $row['last_name'],
				'country'     => $row['country'],
				'city'        => $row['city'],
				'facebook'    => $row['facebook'],
				'twitter'     => $row['twitter'],
				'image'       => $row['name'],
				'user_type'   => $user_type
			);	
		}
		// Set view to home page
		if ($user_type === 'administrator') {
			$view = 'Location: ../view/admin.php';
		} else {
			$view = "Location: ../view/home.php";
		}
		
		
	} else {
		// error login
		
		$_SESSION['error_login'] = true;
		$_SESSION['username'] = $username;
		
		// set view to login page
		$view = "Location: ../view/login.php";
	}
	
	header($view);
	EXIT; // Use exit so that no other script will be executed.
}