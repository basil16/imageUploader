<?php

class Person 
{
	private $first_name = "";
	private $last_name  = "";
	private $country    = "";
	private $city 		= "";
	private $facebook   = "";
	private $twitter    = "";
	
	public function __construct()
	{
	}
	
	//setters
	
	public function setFirstName($fname)
	{
		$this->first_name = $fname;
	}
	public function setLastName($lname)
	{
		$this->last_name = $lname;
	}
	public function setCountry($country)
	{
		$this->country = $country;
	}
	public function setCity($city)
	{
		$this->city = $city;
	}
	public function setFacebook($fb)
	{
		$this->facebook = $fb;
	}
	public function setTwitter($twitter)
	{
		$this->twitter = $twitter;
	}
	
	//getters
	
	public function getFirstName()
	{
		return $this->first_name;
	}
	
	public function getLastName()
	{
		return $this->last_name;
	}
	
	public function getCountry()
	{
		return $this->country;
	}
	
	public function getCity()
	{
		return $this->city;
	}
	public function getFacebook()
	{
		return $this->facebook;
	}
	public function getTwitter()
	{
		return $this->twitter;
	}
}