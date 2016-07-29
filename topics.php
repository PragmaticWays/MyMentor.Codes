<?php require('core/init.php'); ?>
<?php

// Create topics object
$topic = new Topic;

// Create user object
$user = new User;

// Get category from URL
if (isset($_GET['category'])) {
	$category = $_GET['category'];
	$category = urlUnformat($category);
} else {
	$category = null;
}


// Get user from URL
$username = isset($_GET['user']) ? $_GET['user'] : null;

// Get template and assign vars
$template = new Template('templates/topics.php');

// Assign template vars
if (isset($category)) {
	$template->topics = $topic->getByCategory($category);
	$template->title = 'Posts In <strong>'.$topic->getCategory($category)->name.'</strong>';
}

// Check for user filter
if (isset($username)) {
	$template->topics = $topic->getByUser($username);
	$template->title = 'Posts by <strong>'.$username.'</strong>';
}

// Check for category filter
if (!isset($category) && !isset($username)) {
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