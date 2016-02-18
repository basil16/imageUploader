<?php 
/*----------------------
 * Description: This class will support the form fields for validation purpose. 
 *--------------------*/
class FormValidation
{
	private $errors = array();
	
	public function __construct()
	{
		
	}
	
	/*----------------------------------------
	 * @desc    The function will check if user input has a valid string length.
	 * @param   Array '$user_data' Contains data from the form input fields.
	 * @return  None
	 *----------------------------------------*/
	public function validateLength($user_data)
	{	
		foreach ($user_data as $key => $value) {

			$field = "";

			if (strlen($value) > 100 ) {

				if ($key === 'first_name') {
					$field = "First name"; // reformat string
				}
				
				if ($key === 'last_name') {
					$field = "Last name"; // reformat string
				}
				$this->errors[] = $field . " length must not more than 100 characters.";
			}
		}
	}
	
	/*----------------------------------------
	 * @desc    The function will do the password validation.
	 * @param   String '$password' A user password.
	 * @return  None
	 *----------------------------------------*/
	public function validatePassword($password)
	{
		if (!preg_match('/[a-zA-Z]/', $password)) {
			$this->errors[] = "Password must contain at least 1 letter";
		}
		
		if (!preg_match('/[0-9]/', $password)) {
			$this->errors[] = "Password must contain at least 1 number";
		}
	
		
		if (strlen($password) < 6 || strlen($password) > 8) {
			$this->errors[] = "Password must be 6-8 characters in length.";
		}
	}
	
	/*----------------------------------------
	 * @desc    The function will do the email validation.
	 * @param   Array '$email' A user email address.
	 * @return  None
	 *----------------------------------------*/
	public function validateEmail($email) 
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = "Email address is invalid.";
		}
	}
	
	/*----------------------------------------
	 * @desc    The function will check if the user password is match.
	 * @param   Array '$pass1' Password Entered.
	 * @param   Array '$pass2' Repeated Password.
	 * @return  None
	 *----------------------------------------*/
	public function passwordMatch($pass1, $pass2)
	{
		if ($pass1 != $pass2) {
			$this->errors[] = "Password not match.";
		}
	}
	
	// This function will return the errors done by validation
	public function getErrors()
	{
		return $this->errors;
	}
}