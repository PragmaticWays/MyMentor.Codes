<?php include('core/init.php'); ?>
<?php 

	if(isset($_POST['do_login'])) {
	
		// Get vars
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// Create user object
		$user = new User;
		
		
		if($user->login($username, $password)) {
			redirect($_SERVER['HTTP_REFERER'], 'You have been logged in', 'success');
		} else {
			redirect('login', 'That login is not valid', 'error');
		}
	} else {
		redirect('./');
	}
?>