<?php 
include('FileManager.php');

class ImageFile extends FileManager
{
	public function __construct($file = null) 
	{
		parent::__construct($file);
	}
	
	// This function will save the images into a directory.
	public function upload($category) 
	{
		$folder = '../images/'.$category.'/';
		$upload = move_uploaded_file($this->file_tmp_name, $folder.$this->file_name);
			
		return $upload ? true : false;		
	}
	
	// This function will save the image data into a database.
	public function save($image)
	{
		$desc = $image['description'];
		$file_name = $image['name'];
		$file_size = $image['size'];
		
		$cat_id = $image['category_id'];
		$user_id = $image['user_id'];
		
		$db = new Database();
		$con = $db->connect();
		
		
		$query = "INSERT INTO 
			images (name,description,size,category_id,user_id)
			VALUES ('$file_name','$desc','$file_size','$cat_id',$user_id)";
		
		if ($con->query($query)) {
			$id = $con->insert_id;
			return $id;
		} else {
			die(var_dump(mysqli_error($con)));
		}
		
		return false;
	}
	
	// This function will return all images from database.
	public function getAllByCategory($category_id) 
	{
		$db = new Database();
		$con = $db->connect();
		
		$sql = "SELECT * FROM images
		JOIN image_category
		ON image_category.id = images.category_id
		JOIN users
		ON users.id = images.user_id
		WHERE category_id = '$category_id'
		";
		
		$result = $con->query($sql);
		$images = [];
		
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$images[] = $row;
			}
			return $images;
		}
		
		return false;
	}
}