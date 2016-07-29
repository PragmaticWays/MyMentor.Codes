<?php require('core/init.php'); ?>
<?php

// Create topics object
$topic = new Topic;

// Create user object
$user = new User;

// Get user from URL
$username = isset($_GET['user']) ? $_GET['user'] : null;

// Get template and assign vars
$template = new Template('templates/replies.php');


// Check for user filter
if (isset($username)) {
	$id = $topic->getID($username)->id;
	$template->replies = $topic->getUserReplies($id);
	$template->title = 'Replies by <strong>'.$username.'</strong>';
}

// Check for replies filter
if (!isset($replies) && !isset($username)) {
	//$template->topics = $topic->getAllTopics();
}

$template->totalUsers = $user->getTotalUsers();
$template->totalTopics = $topic->getTotalTopics();

if (isLoggedIn()) {
	$template->user = getUser();
}

// Display template
echo $template;
?>