<?php 

class ImageCategory 
{
	private $id = "";
	private $name = "";
	
	public function __construct()
	{
		
	}
	
	public function insert()
	{
		
	}
	
	// setter
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function setId($id) 
	{
		$this->id = $id;
	}
	
	// getter
	public function getName()
	{
		return $this->name;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	// Will return the category id.
	// Parameter $category is the category name.
	public function getCategoryId($category)
	{
		$db =  new Database();
		$con = $db->connect();
		
		$query = "SELECT id FROM image_category WHERE category = '$category' LIMIT 1";
		
		$result = $con->query($query);
		
		if ($result) {
			$row = $result->fetch_assoc();	
			return $row['id'];
		} else {
			die(var_dump(mysqli_error($con)));
		}
		return false;
	}
	
	public function getCategoryName($id)
	{
		$db =  new Database();
		$con = $db->connect();
		
		$query = "SELECT category FROM image_category WHERE id = '$id' LIMIT 1";
		
		$result = $con->query($query);
		
		if ($result) {
			$row = $result->fetch_assoc();	
			return $row['category'];
		} else {
			die(var_dump(mysqli_error($con)));
		}
		return false;
	}
	
	public function getAll() 
	{
		$db = new Database();
		$con = $db->connect();
		
		$sql = "SELECT * FROM image_category";
		
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			
			return $result;
		} else {
			die(mysql_error($con));
		}
	}
	
}