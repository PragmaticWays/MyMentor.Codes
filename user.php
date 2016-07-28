<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object 
$user = new User();


// Get ID from URL
if (!isset($_GET['username'])){
	redirect('index.php');
} else {
	
	$username = $_GET['username'];

	// Get template and assign vars
	$template = new Template('templates/user.php');

	// Assign vars
	$template->title = $username."'s Profile";
	if (!$template->thisProfile = $user->getUserData($username)) {
		redirect('index.php', "We don't know anybody with that username. Make sure your spelling is correct and try again.", 'error');
	}

	if (isLoggedIn()) {
		$template->user = getUser();
	}

	// Display template
	echo $template;
}
?>