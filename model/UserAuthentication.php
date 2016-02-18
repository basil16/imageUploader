<?php 

include('Helper.php');

class UserAuthentication
{
	private $username = "";
	private $password = "";
	
	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}
	 
	/*---------------------------------
	* This function will check if user account is logged in.
	*---------------------------*/
	public function isLogged()
	{
		
	}

	/*---------------------------------
	* This function will log in the user if exist in database.
	*---------------------------*/
	public function login()
	{
		$db  = new Database();
		$con = $db->connect();
		
		$helper = new Helper(); // User helper class to get salt code.
		
		$username = $this->username;
		$password = md5($this->password.$helper->saltCode());
		
		$sql = "SELECT * FROM user_accounts WHERE username='$username' and password='$password' and status != 0 LIMIT 1";
	
		$result = $con->query($sql);
		
		if ($result) {
			return $result;
		} else {
			die(var_dump(mysql_error($con)));
		}
		
	}
}