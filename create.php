<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object 
$user = new User();

if(isset($_POST['do_create'])) {
	
	// Create validator object
	$validate = new Validator();
	
	// Create data array
	$data = array();
	$data['title'] = $_POST['title'];
	$data['body'] = $_POST['body'];
	$data['category_id'] = $_POST['category'];
	$data['user_id'] = getUser()['user_id'];
	$data['last_activity'] = date("Y-m-d H:i:s");
	
	// Required fields
	$field_array = array('title', 'body', 'category');
	
	if ($validate->isRequired($field_array)) {
		if ($validate->validTitle($field_array['title'])) {
			if ($topic->create($data)) {
				redirect('./', 'Your topic has been successfully posted.', 'success');
			} else {
				redirect('./', 'Something went wrong with your post. Please try again', 'error');
			}
		} else {
			redirect('create.php', 'Your title may only consist of letters, number, -, !, or ?', 'error');
		}
	} else {
		redirect('create.php', 'Please fill in all required fields.', 'error');
	}
}

// Get template and assign vars
$template = new Template('templates/create.php');

if (isLoggedIn()) {
		$template->user = getUser();
	} else {
		redirect('index.php', 'You must be logged in for that.', 'error');
	}

// Display template
echo $template;
?>