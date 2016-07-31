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
		if (preg_match("/^[a-zA-Z0-9 -?!]+$/", $title)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if user has liked this topic
	public function userNotLikeTopic($topic_id) {
		$this->db->query("SELECT * FROM likes WHERE topic_id = :topic_id AND user_id = :user_id AND status = '1'");
		
		// Bind values
		$this->db->bind(':topic_id', $topic_id);
		$this->db->bind(':user_id', getUser()['user_id']);
		
		// Assign
		$result = $this->db->single();
		
		if(!$result) {
			return true;
		} else {
			return false;
		}
	}
	
	// Check if user has liked this topic
	public function userNotDislikeTopic($topic_id) {
		$this->db->query("SELECT * FROM likes WHERE topic_id = :topic_id AND user_id = :user_id AND status = '0'");
		
		// Bind values
		$this->db->bind(':topic_id', $topic_id);
		$this->db->bind(':user_id', getUser()['user_id']);
		
		// Assign
		$result = $this->db->single();
		
		if(!$result) {
			return true;
		} else {
			return false;
		}
	}
	
}