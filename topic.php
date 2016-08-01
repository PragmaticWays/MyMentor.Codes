<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object
$user = new User();

// Get ID from URL
$topic_title = $_GET['title'];

// Process reply
if (isset($_POST['do_reply'])) {
	
	// Create data array
	$data = array();
	
	$data['topic_id'] = $topic->getTopic(urlUnformat($topic_title))->id;
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];
	
	// Create validator object
	$validate = new Validator();
	
	// Required fields
	$field_array = array('body');
	
	if ($validate->isRequired($field_array)) {
		
		// Register user
		if ($topic->reply($data)) {
			redirect($_SERVER['HTTP_REFERER'], 'You have successfully replied.', 'success');
		} else {
			redirect($_SERVER['HTTP_REFERER'], 'Something went wrong with your post. Please try again.', 'error');
		}
	} else {
		redirect($_SERVER['HTTP_REFERER'], 'Please try to refrain from leaving a blank reply.', 'error');
	}
}

// Get template and assign vars
$template = new Template('templates/topic.php');

// Assign vars
$template->topic = $topic->getTopic(urlUnformat($topic_title));

$topic_id = $topic->getTopic(urlUnformat($topic_title))->id;
$template->replies = $topic->getReplies($topic_id);
$thisTopic = $topic->getTopic(urlUnformat($topic_title));
$template->title = $thisTopic->title;

if (isLoggedIn()) {
	$template->user = getUser();
}

// Display template
echo $template;
?>
