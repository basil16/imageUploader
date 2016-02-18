<?php
session_start();

include('../model/Database.php');
include('../model/ImageFile.php');
include('../model/User.php');
include('../model/ImageCategory.php');


if (isset($_POST)) {
	
	$errors = [];
	$number_of_files = count($_FILES['user_file']['name']);
	$user_file = [];
	
	
	// Loop each file
	for ($i = 0; $i < $number_of_files; $i++) {
		
		$user_file['name'] 	   = $_FILES['user_file']['name'][$i];
		$user_file['type']     = $_FILES['user_file']['type'][$i];
		$user_file['error']    = $_FILES['user_file']['error'][$i];
		$user_file['tmp_name'] = $_FILES['user_file']['tmp_name'][$i];
		$user_file['size']	   = $_FILES['user_file']['size'][$i];
		
	
		
		if ($_FILES['user_file']['error'][$i] > 0) {
			// Collect error files
			$_SESSION['file_error'][] = $user_file;
		
		} else {
			
			$file  = new ImageFile($user_file);
			$errors = $file->validate();
			
			if ($errors) {
				$_SESSION['file_error'][] = $user_file;
			} else {
			
				$user = new User();		
				$user->setFirstName($_POST['first_name']);
				$user->setLastName(	$_POST['last_name']);
				$user->setCountry(	$_POST['country']);
				$user->setCity(		$_POST['city']);
				$user->setFacebook(	$_POST['facebook_link']);
				$user->setTwitter(	$_POST['twitter_link']);
				
				// Save user and get id
				$user_id = $user->save($user);
				
				$user->setId($user_id);
				
				if ($user_id) {
					$_SESSION['user'] = array (
						'id'         => $user->getId(),
 						'first_name' => $user->getFirstName(),
						'last_name'  => $user->getLastName(),
						'country'    => $user->getCountry(),
						'city'		 => $user->getCity(),
						'facebook'   => $user->getFacebook(),
						'twitter'	 => $user->getTwitter(),
						'image'      => $_FILES['user_image']['name']
					);
				}
				
				// Set User image
				$user_image['name'] 	   = $_FILES['user_image']['name'];
				$user_image['size'] 	   = $_FILES['user_image']['size'];
				$user_image['description'] = "";
				$user_image['type']    	   = $_FILES['user_image']['type'];
				$user_image['error']   	   = $_FILES['user_image']['error'];
				$user_image['tmp_name']    = $_FILES['user_image']['tmp_name'];
				$user_image['category_id'] = 0;
				$user_image['user_id']     = $user_id;
				
				// save user image
				$user_image_file = new ImageFile($user_image);
				$user_image_id = $user_image_file->save($user_image);
				
				// save user image to images/Users folder
				if ($user_image_id) {
					move_uploaded_file($_FILES['user_image']['tmp_name'], '../images/User/'.$_FILES['user_image']['name']);
				}
	
				// Get category id 
				$category = new ImageCategory();
				$cat_id = $category->getCategoryId($_POST['category']);
				
				// Set description
				$user_file['description'] = $_POST['description'];
				
				// Save the file.
				$user_file['category_id'] = $cat_id;
				$user_file['user_id'] 	  = $user_id;
				$user_file['category']    = $_POST['category'];
				
				$err_no = count($errors);
				$image_id = "";
				
				// If no errors, save it.
				if ($err_no == 0) {
					$image_id = $file->save($user_file);
					$_SESSION['file_success'][] = $user_file;
				}
				
				// save user file image to images/ folder 	
				if ($image_id) {
					move_uploaded_file($user_file['tmp_name'], '../images/'.$_POST['category'].'/'.$user_file['name']);	
				}
				
	
				// Update user image id
				$update_user = new User();
				$update_user->setId($user_id);
				$update_user->updateImageId($user_image_id);
			}	
		}
	}
	
	if (count($_SESSION['file_success']) > 0) {
		header("Location: ../view/home.php");
		EXIT;
	} 
	header("Location: ../view/index.php");
	EXIT;
}