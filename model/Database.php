<?php

class Database
{
	 private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $db = "mydb"; 
 
	/* private $hostname = "localhost";
	private $username = "basileventesten";
	private $password = ",9X*iu!TQpt6";
	private $db = "basileve_mydb";
  */
 
	public function __construct()
	{	
	}
	
	public function connect()
	{
		$con = new mysqli($this->hostname, $this->username, $this->password, $this->db);
		
		if ($con->connect_error) {
			die("Connection Failed." . $con->connect_error);
		}
		return $con;
	}
}