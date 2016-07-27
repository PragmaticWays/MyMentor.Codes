<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object 
$user = new User();

// Get template and assign vars
$template = new Template('templates/user.php');

// Assign vars
$template->title = 'Your Profile Page';

// Display template
echo $template;
?>