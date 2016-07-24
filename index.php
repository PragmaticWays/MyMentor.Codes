<?php require('core/init.php'); ?>

<?php

// Create topic object
$topic = new Topic();

// Get template and assign vars
$template = new Template('templates/frontpage.php');

// Assign vars
$template->topics = $topic->getAllTopics();
$template->totalUsers = $topic->getTotalUsers();
$template->totalTopics = $topic->getTotalTopics();

// Display template
echo $template;
