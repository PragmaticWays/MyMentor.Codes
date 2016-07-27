<?php require('core/init.php'); ?>
<?php

// Create topic object
$topic = new Topic;

// Create user object
$user = new User;

// Create validate object
$validate = new Validator;

if (isset($_POST['register'])) {
	// Create data array
	$data = array();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];
	$data['password'] = md5($_POST['password']);
	$data['password2'] = md5($_POST['password2']);
	$data['about'] = $_POST['about'];
	$data['last_activity'] = date("Y-m-d H:i:s");
	
	// Required fields array
	$field_array = array('name', 'email', 'username', 'password', 'password2');
	
	if ($validate->isRequired($field_array)) {
		if ($validate->isValidEmail($data['email'])) {
			if ($validate->passwordsMatch($data['password'], $data['password2'])) {
				if ($validate->usernameAvailable($data['username'])) {
					if ($validate->emailNotUsed($data['email'])) {
				
						// Handle upload avatar
							if ($user->uploadAvatar()) {
								$data['avatar'] = $_FILES["avatar"]["name"];
							} else {
								$data['avatar'] = 'gravatar.png';
							}
	
						// Register user
						if ($user->register($data)) {
							redirect('index.php', 'You are registered. You may log in.', 'success');
						} else {
							redirect('index.php', 'Something went wrong with registration. Please try again.', 'error');
						}
					
					} else {
						redirect('register.php', "I feel like we've done this kind of thing before. Your email address is already associated with an account.", 'error');
					}
				} else {
					redirect('register.php', 'Great minds think alike. This username is already taken. Please pick a different username.', 'error');
				}				
			} else {
				redirect('register.php', 'Do you get many syntax errors typing that fast? Your passwords do not match.', 'error');
			}
		} else {
			redirect('register.php', 'What kind of email address is that? Please use a valid email address.', 'error');
		}
	} else {
		redirect('register.php', 'Please fill in all required fields.', 'error');
	}
}

// Get template and assign vars
$template = new Template('templates/register.php');

// Display template
echo $template;
?>
