<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object 
$user = new User();

// Get template and assign vars
$template = new Template('templates/frontpage.php');

// Assign vars
$template->topics = $topic->getAllTopics();
$template->totalUsers = $user->getTotalUsers();
$template->totalTopics = $topic->getTotalTopics();

if (isLoggedIn()) {
		$template->user = getUser();
	} 

// Display template
echo $template;
?>