<?php include('core/init.php'); ?>
<?php 

	if(isset($_POST['add_tag'])) {
	
		// Get vars
		$tag = $_POST['tag'];
		
		// Create user object
		$user = new User;
		
		if($user->addTag($tag)) {
			redirect($_SERVER['HTTP_REFERER'], $tag.' added', 'success');
		} else {
			redirect($_SERVER['HTTP_REFERER'], 'We had a bug, it happens...', 'error');
		}
	} else {
		redirect('./');
	}
?>