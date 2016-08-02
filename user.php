<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic();

// Create user object 
$user = new User();

if (isset($_GET['username'])) {
	if (!$user->getUserData($_GET['username'])) {
		redirect('./', 'Oops, looks like you may have mistyped something.', 'error');
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
}
?>