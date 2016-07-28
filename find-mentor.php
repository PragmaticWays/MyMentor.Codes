<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object 
$user = new User();

// Get template and assign vars
$template = new Template('templates/find-mentor.php');

// Assign vars
$template->title = 'Find a Mentor';

if (isLoggedIn()) {
		$template->user = getUser();
	} else {
		redirect('index.php', 'You must be logged in to find a mentor.', 'error');
	}

// Display template
echo $template;
?>