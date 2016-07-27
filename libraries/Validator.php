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
	
	// Check if username is taken
	public function usernameAvailable($username) {
		$this->db->query("SELECT username FROM users WHERE username='". $username ."'");
		$thisUser = $this->db->single();
		
		if(!$thisUser) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if email address is already used
	public function emailNotUsed($email) {
		$this->db->query("SELECT email FROM users WHERE email='". $email ."'");
		$thisUser = $this->db->single();
		
		if(!$thisUser) {
			return true;
		} else {
			return false;
		}
	}
	
}