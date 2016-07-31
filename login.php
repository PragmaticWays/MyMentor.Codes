<?php require('core/init.php'); ?>
<?php


// Create topic object
$topic = new Topic();

// Create user object
$user = new User();

// Create validate object
$validate = new Validator();

// Get template and assign vars
$template = new Template('templates/login.php');

// Assign vars
$template->title = "Login";


// Display template
echo $template;
?>