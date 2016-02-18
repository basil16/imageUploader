<?php

include('Person.php');

class User extends Person
{
	private $id         = "";
	private $image_id   = "";
	private $account_id = 0;
	
	public function __construct()
	{
		// Call parent class contructor
		parent::__construct();
	}
	
	/* ----------------------
	 * @desc This method will insert user information into the database. 
	 * @param Object '$user' A user object
	 * @return int '$user_id' An id of a new inserted user.
	 * ------------------------- */
	public function save(User $user)
	{	
		// Initialize variables
		$fname 	 = $user->getFirstName();
		$lname 	 = $user->getLastName();
		$country = $user->getCountry();
		$city 	 = $user->getCity();
		$fb		 = $user->getFacebook();
		$tw 	 = $user->getTwitter();
		$image_id   = $user->getImageId();
	
		$db = new Database();
		$con = $db->connect();
	
		$query = "INSERT INTO users (first_name,last_name,country,city,facebook,twitter,image_id)
		VALUES ('$fname','$lname','$country','$city','$fb','$tw','$image_id')";
		
		if ($con->query($query)) {
			
			$user_id = $con->insert_id;
			return $user_id;
		
		} else {
			die(var_dump(mysqli_error($con)));
		}
		return false;
	}
	
	/* ----------------------
	 * @desc This method will update user information. 
	 * @param Object '$user' A user object
	 * @return boolean
	 * ------------------------- */
	public function update(User $user)
	{	
		// Initialize variables
		$id      = $user->getId();
		$fname 	 = $user->getFirstName();
		$lname 	 = $user->getLastName();
		$country = $user->getCountry();
		$city 	 = $user->getCity();
		$fb		 = $user->getFacebook();
		$tw 	 = $user->getTwitter();
	
		$db = new Database();
		$con = $db->connect();
	
		$query = "UPDATE users 
		        SET 
		        first_name = '$fname',
				last_name  = '$lname',
				country    = '$country',
				city       = '$city',
				facebook   = '$fb',
				twitter    = '$tw' 
				WHERE id   = $id
		    	";
		
		if ($con->query($query)) {
			
			return true;

		} else {
			die(var_dump(mysqli_error($con)));
		}
	}

	public function saveUserImage()
	{
		
	}	
	
	/* ------------------------------------------------
	 * @desc This method will get the data of a user.
	 * @param int '$user_id' A user id 
	 * @return object '$result' A mysql result object 
	 * ------------------------------------------------*/
	public function getUserData($user_id)
	{
		$db  = new Database();
		$con = $db->connect();
		
		$sql = "SELECT * FROM users WHERE account_id = '$user_id' LIMIT 1";
		
		$result = $con->query($sql);
		
		if ($result) {
			return $result;
		} else {
			die(var_dump(mysql_error($con)));
		}
	}
	
	
	/* @desc This method will check if user id exist.
	 * @param int '$id' A user id 
	 * @return bolean  
	 */
	public function exist($id)
	{
		$db = new Database();
		$con = $db->connect();
		
		$query = "SELECT * FROM users WHERE id = '$id'";
		
		$result = $con->query($query);
		
		$rows = $result->num_rows;
		
		return $result ? true : die(var_dump(mysql_error($con)));
	}
	
	/* @desc This method will update image of a user.
	 * @param int '$id' A user id 
	 * @return bolean  
	 */
	public function updateImageId($id)
	{
		$db = new Database();
		$con = $db->connect();
		
		
		$update_query = "UPDATE users SET image_id='$id'
		WHERE id = '$this->id'
		";
		$result = $con->query($update_query);
		
		$result ? true : die(var_dump(mysqli_error($con)));
	}	
	
	/* @desc This method will update account id of a user.
	 * @param int '$user_id' A user id
	 * @parant int $account_id' A desired account id
	 * @return bolean  
	 */
	public function updateAccountId($user_id, $account_id)
	{
		$db = new Database();
		$con = $db->connect();
		
		$sql = "UPDATE users SET account_id = '$account_id' WHERE users.id = '$user_id' ";
		
		$result = $con->query($sql);
		
		if ($result) {
			return true;
		} else {
			die(var_dump(mysql_error($con)));
		}
	}
	
	public function getAll() 
	{
		$db = new Database();
		$con = $db->connect();
		
		$sql = "SELECT * FROM users";
		
		$result = $con->query($sql);

		if ($result) {
			return $result;
		} else {
			die(mysql_error($con));
		}
	}
	
	// setters
	public function setId($id) 
	{
		if ($id > 0) {
			$this->id = $id;
		}
	}
	
	public function setImageId($id) 
	{
		$this->image_id = $id;
	}
	
	// getters
	public function getId()
	{
		return $this->id;
	}
	
	public function getImageId()
	{
		return $this->image_id;
	}
}