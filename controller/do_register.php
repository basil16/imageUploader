<?php
/* --------------------
* This controller will do the registration process.
*----------------------*/

session_start();
include('../model/Database.php');
include('../model/FormValidation.php');
include('../model/UserAccount.php');
include('../model/User.php');

if (isset($_POST['register'])) {
	
	// user data
	$email 		= $_POST['email'];
	$pass1 		= $_POST['password'];
	$pass2 		= $_POST['repeatpassword'];

	$user_data = array(
		'username'   => $_POST['username'],
		'first_name' => $_POST['first_name'],
		'last_name'  => $_POST['last_name'],
		'country'    => $_POST['country'],
		'city'       => $_POST['city'],
		'facebook'   => $_POST['facebook_link'],
		'twitter'    => $_POST['twitter_link'],
		'email' 	 => $_POST['email']
	);
	
	// User form validation class
	$input_validate = new FormValidation();
	
	$input_validate->validateLength($user_data);

	$input_validate->passwordMatch($pass1, $pass2);

	$input_validate->validatePassword($pass1);

	$input_validate->validateEmail($email);
	
	$errors = $input_validate->getErrors();

	$_SESSION['result'] = false;
	
	if (count($errors) > 0) {
		$_SESSION['result']     = $errors;
		$_SESSION['user_data']  = $user_data;
 	} else {
		
		$username  = $_POST['username'];

		$account   = new UserAccount($username, $email, $pass1);
		
		// Save user account and get id.
		$account_id = $account->add();	
		
		$user= new User();
		$user->setFirstName($_POST['first_name']);
		$user->setLastName(	$_POST['last_name']);
		$user->setCountry(	$_POST['country']);
		$user->setCity(		$_POST['city']);
		$user->setFacebook(	$_POST['facebook_link']);
		$user->setTwitter(	$_POST['twitter_link']);
		
		// save user data and get id
		$user_id = $user->save($user);
		
		// update account id
		$user->updateAccountId($user_id, $account_id);
	}
	
	header("Location: ../view/register.php");
	EXIT;
}