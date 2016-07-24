<?php require('core/init.php'); ?>

<?php

// Create topic object
$topic = new Topic;

// Get ID from URL
$topic_id = $_GET['id'];

// Get template and assign vars
$template = new Template('templates/topic.php');

// Assign vars
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
//$template->title = $topic->getTopic($topic_id)->title;

// Display template
echo $template;
