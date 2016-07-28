<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object
$user = new User();

// Get template and assign vars
$template = new Template('templates/about.php');

// Assign vars
$template->title = 'About MyMentor.Codes';

if (isLoggedIn()) {
		$template->user = getUser();
	} 

// Display template
echo $template;
?>