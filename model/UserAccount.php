<?php

include('Helper.php');

class UserAccount 
{
	
	private $username;
	private $email;
	private $password;
	
	public function __construct($username, $email, $password)
	{
		$this->username = $username;
		$this->email 	= $email;
		$this->password = $password;
	}
	
	/*---------------
	* This function will insert new a user account into the database.
	*---------------*/
	public function add()
	{
		$db = new Database();
		$con = $db->connect();
		$helper = new Helper();
		
		$username = $this->username;
		$email	  = $this->email;
		
		// Encrypt password using md5 + salt code
		$password = md5($this->password.$helper->saltCode());
		
		$sql = "INSERT into user_accounts(username,email,password)
		VALUES ('$username','$email','$password')";
		
		$result = $con->query($sql);
		
		if ($result) {
			return $con->insert_id;
		} else {
			die(var_dump(mysql_error($con)));
		}
	}
	
	public function getAccount($id)
	{
		
	}
	
	// This method will update the user account information
	public function update($id)
	{
		$db = new Database();
		$con = $db->connect();
		
		$username = $this->username;
		$email    = $this->email;
		
		// Encrypt password using md5 + salt code
		$helper = new Helper();
		$password = md5($this->password.$helper->saltCode());
		
		$sql = "UPDATE user_accounts SET username = '$username', password = '$password', email = '$email' WHERE account_id = '$id' ";
		
		$result = $con->query($sql);
		
		if ($result) {
			return true;
		} else {
			die(var_dump(mysql_error($con)));
		} 
	}
	
	// This function will set the user account to inactive state.
	
	public function delete($id)
	{
		$db = new Database();
		$con = $db->connect();

		
		$sql = "UPDATE user_accounts SET status = '0' WHERE account_id = '$id' ";
		
		$result = $con->query($sql);
		
		if ($result) {
			return true;
		} else {
			die(var_dump(mysql_error($con)));
		} 
	}
}