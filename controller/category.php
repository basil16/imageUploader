<?php
session_start();

include('../model/Database.php');
include('../model/ImageFile.php');

if (isset($_GET['category'])) {
		
	$category_id = $_GET['category'];
	
	$image = new ImageFile();
	$images = $image->getAllByCategory($category_id);
	
	
	$_SESSION['images'] = $images;
	$_SESSION['category'] = $_GET['category'];
	
	$view = "";
	
	if (isset($_GET['images_page'])) {
		$view = "Location: ../view/images.php";
	} else {
		$view = "Location: ../view/category.php";
	}
	
	header($view);
	EXIT;
}