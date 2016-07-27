<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Get ID from URL
$topic_id = $_GET['id'];

// Process reply
if (isset($_POST['do_reply'])) {
	
	// Create data array
	$data = array();
	$data['topic_id'] = $_GET['id'];
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];
	
	// Create validator object
	$validate = new Validator();
	
	// Required fields
	$field_array = array('body');
	
	if ($validate->isRequired($field_array)) {
		
		// Register user
		if ($topic->reply($data)) {
			redirect('topic.php?id='.topic_id, 'You have successfully replied.', 'success');
		} else {
			redirect('topic.php?id='.topic_id, 'Something went wrong with your post. Please try again.', 'success');
		}
	} else {
		redirect('topic.php?id='.topic_id, 'Please try to refrain from leaving a blank reply.', 'success');
	}
}

// Get template and assign vars
$template = new Template('templates/topic.php');

// Assign vars
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

// Display template
echo $template;
?>
