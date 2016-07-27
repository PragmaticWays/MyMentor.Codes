<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Get template and assign vars
$template = new Template('templates/about.php');

// Assign vars
$template->title = 'About MyMentor.Codes';

// Display template
echo $template;
?>