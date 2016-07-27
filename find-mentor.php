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

// Display template
echo $template;
?>