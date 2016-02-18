<?php

class FileManager
{
	
	private $file_name 		= "";
	private $file_type 		= "";
	private $file_error		= "";
	private $file_tmp_name 	= "";
	private $file_size 		= "";
	private $cat_id 		= "";
	private $img_id 		= "";
	
	public function __construct($user_file = null)
	{	
		$this->file_name     = $user_file['name'];
		$this->file_type     = $user_file['type'];
		$this->file_error 	 = $user_file['error'];
		$this->file_tmp_name = $user_file['tmp_name'];
		$this->file_size     = $user_file['size'];
	}
	
	public function validate()
	{
		
		$errors = [];
		
		if ($this->file_error > 0) {
			$errors[] = "Please check the file size or try again.";
		} 
		
		if ($this->file_type != "image/jpeg" AND $this->file_type != "image/png") {
			$errors[] = "Only jpeg and png image format is allowed.";
		}
		
		return $errors;
		
	}
	/* setters */
	
	public function setFileName($file_name)
	{
		$this->file_name = $file_name;
	}
	public function setFileType($file_type)
	{
		$this->file_type = $file_type;
	}
	public function setFileError($file_error)
	{
		$this->file_error = $file_error;
	}
	public function setFileTmpName($file_tmp_name)
	{
		$this->file_tmp_name = $file_tmp_name;
	}
	public function setFileSize($file_size)
	{
		$this->file_size = $file_size;
	}
	/* enf of setters */
	
	/* getters */
	public function getFileName() 
	{
		return $this->file_name;
	}
	public function getFileType() 
	{
		return $this->file_type;
	}
	public function getFileError() 
	{
		return $this->file_error;
	}
	public function getFileTmpName() 
	{
		return $this->file_tmp_name;
	}
	public function getFileSize() 
	{
		return $this->file_size;
	}
	/* end of getters */
	
	
}