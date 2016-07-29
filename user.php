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
	$template->thisProfile = $user->getUserData($username);

	if (isLoggedIn()) {
		$template->user = getUser();
	}

	// Display template
	echo $template;
}
?>