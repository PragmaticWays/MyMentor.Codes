<?php

// Get reply count for a topic
function replyCount($topic_id) {
	$db = new Database();
	$db->query('SELECT * FROM replies WHERE topic_id = :topic_id');
	$db->bind(':topic_id', $topic_id);
	
	// Assign rows
	$rows = $db->resultset();
	
	// Get count
	return $db->rowCount();
}

function likeCount($topic_id) {
	$db = new Database();
	$db->query('SELECT * FROM likes WHERE topic_id = :topic_id AND status = "1"');
	$db->bind(':topic_id', $topic_id);
	
	// Assign rows
	$rows = $db->resultset();
	
	// Get count
	return $db->rowCount();
}

function dislikeCount($topic_id) {
	$db = new Database();
	$db->query('SELECT * FROM likes WHERE topic_id = :topic_id AND status = "0"');
	$db->bind(':topic_id', $topic_id);
	
	// Assign rows
	$rows = $db->resultset();
	
	// Get count
	return $db->rowCount();
}

// Get categories for sidebar
function getCategories() {
	$db = new Database();
	$db->query('SELECT * FROM categories');
	
	// Assign Result Set
	$results = $db->resultset();
	
	return $results;
}

// User Posts - topics
function userTopicCount($user_id) {
	$db = new Database();
	$db->query('SELECT * FROM topics WHERE user_id = :user_id');
	$db->bind(':user_id', $user_id);
	
	// Assign rows
	$rows = $db->resultset();
	
	// Get count
	$topic_count = $db->rowCount();
	
	return $topic_count;
}
	
// User Posts - replies
function userReplyCount($user_id) {
	$db = new Database();	
	$db->query('SELECT * FROM replies WHERE user_id = :user_id');
	$db->bind('user_id', $user_id);
	
	// Assign rows
	$rows = $db->resultset();
	
	// Get count
	$reply_count = $db->rowCount();
	
	return $reply_count;
}

// Get all tags 
function getTags() {
	$db = new Database();
	$db->query('SELECT * FROM tags');
	
	// Assign Result Set
	$results = $db->resultset();
	
	return $results;
}

// Get user's tags
function getUserTags($username) {
	$db = new Database();
	
	$db->query('SELECT * FROM users WHERE username = :username');
	
	// Bind values
	$db->bind(':username', $username);
	
	// Assign
	$user = $db->single();
	
	$db->query('SELECT * FROM user_tags 
				INNER JOIN tags
				ON tags.id = user_tags.tag_id
				WHERE user_id = :user_id');
	
	// Bind values
	$db->bind(':user_id', $user->id);
	
	// Assign Result Set
	$results = $db->resultset();

	return $results;
}