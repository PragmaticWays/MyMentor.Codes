<?php

class User {
	
	// Init DB var
	private $db;
	
	// Constructor
	public function __construct() {
		$this->db= new Database;
	}
	
	// Register user
	public function register($data) {
		
		// Insert query
		$this->db->query('INSERT INTO users (name, email, avatar, username, password, about, location, last_activity) 
						  VALUES (:name, :email, :avatar, :username, :password, :about, :location, :last_activity)');
						  
		// Bind values
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':avatar', $data['avatar']);
		$this->db->bind(':username', $data['username']);
		$this->db->bind(':password', $data['password']);
		$this->db->bind(':about', $data['about']);
		$this->db->bind(':location', $data['location']);
		$this->db->bind(':last_activity', $data['last_activity']);
		
		
		// Execute
		if ($this->db->execute()) {	
		
			// Move user avatar from temp file to user's own (newly created) file
			$this->db->query("SELECT id FROM users WHERE username='". $data["username"] ."'");
			$thisUser = $this->db->single();
		
			// create user's own file to store images
			$source = "img/avatars/temp/" . $data['avatar'];
			mkdir('img/avatars/' . $thisUser->id .'/', 0777, true);
			$dest = "img/avatars/" . $thisUser->id . "/" . $data['avatar'];
			
			rename($source, $dest);
		
			return true;
		} else {
			return false;
		}
	}

	// Upload User Avatar
	public function uploadAvatar() {
		$allowedExts = array("gif", "jpg", "jpeg", "png");
		$temp = explode(".", $_FILES["avatar"]["name"]);
		$extension = end($temp);
	
		// If user did not upload a file, assign default image
		if(!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
			copy("img/avatars/gravatar.png", "img/avatars/temp/gravatar.png");
			return false;
		}
		if (($_FILES["avatar"]["type"] == "image/gif")
		  || ($_FILES["avatar"]["type"] == "image/jpeg")
		  || ($_FILES["avatar"]["type"] == "image/jpg")
		  || ($_FILES["avatar"]["type"] == "image/pjpeg")
		  || ($_FILES["avatar"]["type"] == "image/x-png")
		  || ($_FILES["avatar"]["type"] == "image/png") 
		  || ($_FILES['avatar']['size'] == 0)) {
			if ($_FILES["avatar"]["size"] < 100000) {
				if (in_array($extension, $allowedExts)) {
					if ($_FILES["avatar"]["error"] > 0) {
						redirect('register.php', $_FILES["avatar"]["error"], 'error');
					} else {
						if (file_exists("img/avatars/temp/" . $_FILES["avatar"]["name"])) {
							redirect('register.php', 'File already exists. Rename your file.', 'error');
						} else {
							// move avatar to temp file until new user is added to database and assigned an ID
							move_uploaded_file($_FILES["avatar"]["tmp_name"], "img/avatars/temp/" . $_FILES["avatar"]["name"]);
							return true;
						}
					}
				}
			} else {
				redirect('register.php', 'File is too large. Use smaller file size.', 'error');
			}
		} else {
			redirect('register.php', 'Invalid File Type.', 'error');
		}
	}
	
	// User login
	public function login($username, $password) {
		$this->db->query("SELECT * FROM users WHERE username = :username");
		
		// Bind values
		$this->db->bind(':username', $username);
		
		// Assign row
		$row = $this->db->single();
		
		if (password_verify($password, $row->password)) {
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
		
		// Check rows
		if ($this->db->rowCount() > 0) {
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
	}
	
	// Set user data
	private function setUserData($row) {
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['username'] = $row->username;
		$_SESSION['name'] = $row->name;
	}
	
	// Get user data
	public function getUserData($username) {
		$this->db->query("SELECT id, name, username, about, avatar, join_date, location FROM users WHERE username = :username");
		
		// Bind values
		$this->db->bind(':username', $username);
		
		// Assign row
		$row = $this->db->single();
		
		return $row;
	}
	
	// User logout
	public function logout() {
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		unset($_SESSION['name']);
		return true;
	}
	
	// Get statistics - total users
	public function getTotalUsers() {
		$this->db->query('SELECT * FROM users');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
}
