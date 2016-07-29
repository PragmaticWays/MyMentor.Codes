<?php

class Validator{
	
	// Init DB var
	private $db;
	
	// Constructor
	public function __construct() {
		$this->db= new Database;
	}
	
	// Check if all required fields entered
	public function isRequired($field_array) {
		foreach($field_array as $field) {
			if ($_POST[''.$field.''] == '') {
				return false;
			}
		}
		return true;
	}
	
	// Check if valid email
	public function isValidEmail($email) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if both passwords match
	public function passwordsMatch($pw1, $pw2) {
		if ($pw1 == $pw2) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if username valid 
	public function usernameValid($username) {
		$restrictedUsernames = array('about','user','topic','topics','register','create','find-mentor','contact');
		if (preg_grep( "/$username/i" , $restrictedUsernames )) {
			return false;
		}
		
		$pattern = "/^[a-zA-Z0-9]+$/";
		
		if (preg_match($pattern, $username, $matches)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if username is taken
	public function usernameAvailable($username) {
		$this->db->query("SELECT username FROM users WHERE username = :username");
		
		// Bind values
		$this->db->bind(':username', $username);
		
		// Assign
		$thisUser = $this->db->single();
		
		if(!$thisUser) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if email address is already used
	public function emailNotUsed($email) {
		$this->db->query("SELECT email FROM users WHERE email = :email");

		// Bind values
		$this->db->bind(':email', $email);
		
		// Assign
		$thisUser = $this->db->single();
		
		if(!$thisUser) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if valid topic title
	public function validTitle($title) {
		$prohibitedChars = array('"',"'",'@','#','$','%','^','&','*','<','>','`','+','=','~');
		if (preg_grep( "/$title/i" , $prohibitedChars )) {
			return false;
		} else {
			return true;
		}
	}
	
}