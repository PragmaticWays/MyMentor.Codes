<?php require('core/init.php'); ?>
<?php

// Create topics object
$topic = new Topic;

// Create user object
$user = new User;

// Get category from URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Get user from URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

// Get template and assign vars
$template = new Template('templates/topics.php');

// Assign template vars
if (isset($category)) {
	$template->topics = $topic->getByCategory($category);
	$template->title = 'Posts In "'.$topic->getCategory($category)->name.'"';
}

// Check for user filter
if (isset($user_id)) {
	$template->topics = $topic->getByUser($user_id);
	$template->title = 'Posts By "'.$topic->getUsername($user_id)->username.'"';
}

// Check for category filter
if (!isset($category) && !isset($user_id)) {
	$template->topics = $topic->getAllTopics();
}

$template->totalUsers = $user->getTotalUsers();
$template->totalTopics = $topic->getTotalTopics();

if (isLoggedIn()) {
	$template->user = getUser();
}

// Display template
echo $template;
?>