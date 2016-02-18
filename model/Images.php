<?php 
include('FileManager.php');

class ImageFile extends FileManager
{
	
	public function __construct($file) 
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
	
	// This function will save the image data into database.
	public function save($image)
	{
		
		$file_name = $image['name'];
		$file_size = $image['size'];
		$desc 	   = $image['description'];
		$cat_id    = $image['category_id'];
		$user_id   = $image['user_id'];
		
		$db  = new Database();
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
}