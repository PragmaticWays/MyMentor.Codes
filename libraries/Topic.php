<?php
class Topic {
	// Init DB var
	private $db;
	
	// Constructor
	public function __construct() {
		$this->db = new Database;
	}
	
	// Get all topics
	public function getAllTopics() {
		$this->db->query("SELECT topics.*, 
						  users.username, 
						  users.avatar, 
						  categories.name 
						  
						  FROM topics 
						  INNER JOIN users 
						  ON topics.user_id = users.id 
						  INNER JOIN categories 
						  ON topics.category_id = categories.id 
						  ORDER BY create_date DESC
		");				  
		$results = $this->db->resultset();
		
		return $results;
	}
	
	// Get topics by category 
	public function getByCategory($category_id) {
		$this->db->query("SELECT topics.*, 
		                  categories.*, 
						  users.username, 
						  users.avatar, 
						  categories.name
						  
						  FROM topics
						  INNER JOIN categories
						  ON topics.category_id = categories.id
						  INNER JOIN users
						  ON topics.user_id = users.id
						  WHERE topics.category_id = :category_id
		");
		$this->db->bind(':category_id', $category_id);
		
		// Assign result set
		$results = $this->db->resultset();
		
		return $results;
	}
	
	// Get category by ID
	public function getCategory($category_id) {
		$this->db->query("SELECT * FROM categories WHERE id = :category_id");
		$this->db->bind(':category_id', $category_id);
		
		// Assign rowCount
		$row = $this->db->single();
		
		return $row;
	}
	
	// Get topics by username
	public function getByUser($user_id) {
		$this->db->query("SELECT topics.*,
						  categories.*,
						  users.username,
						  users.avatar
						  
						  FROM topics
						  INNER JOIN categories
						  ON topics.category_id = categories.id
						  INNER JOIN users
						  ON topics.user_id = users.id
						  WHERE topics.user_id = :user_id
		");
		$this->db->bind(':user_id', $user_id);
		
		// Assign result set
		$results = $this->db->resultset();
		
		return $results;
	}
	
	// Get statistics - total topics
	public function getTotalTopics() {
		$this->db->query('SELECT * FROM topics');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	
	// Get topic by ID
	public function getTopic($id) {
		$this->db->query("SELECT topics.*,
						  users.username,
						  users.name,
						  users.avatar
						  
						  FROM topics
						  INNER JOIN users
						  ON topics.user_id = users.id
						  WHERE topics.id = :id
		");
		$this->db->bind(':id', $id);
		
		// Assign row
		$row = $this->db->single();
		
		return $row;
	}
	
	// Get topic replies
	public function getReplies($topic_id) {
		$this->db->query("SELECT replies.*, 
						  users.*
						  
						  FROM replies
						  INNER JOIN users
						  ON replies.user_id = users.id
						  WHERE replies.topic_id = :topic_id
						  ORDER BY create_date ASC
		");
		$this->db->bind(':topic_id', $topic_id);
		
		// Assign results set
		$results = $this->db->resultset();
		
		return $results;
	}
	
}
?>