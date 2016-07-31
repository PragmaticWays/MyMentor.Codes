<?php include('includes/header.php'); ?>

<div class="login-container">
<!-- Register Form -->
	<form role="form" enctype="multipart/form-data" method="post" action="logging_in.php">
	<center>
		<a class="btn btn-block btn-social btn-github">
			<span class="fa fa-github"></span> Sign in with GitHub
		</a>
		<a class="btn btn-block btn-social btn-linkedin">
			<span class="fa fa-linkedin"></span> Sign in with LinkedIn
		</a>
		<a class="btn btn-block btn-social btn-facebook">
			<span class="fa fa-facebook"></span> Sign in with Facebook
		</a>
		<a class="btn btn-block btn-social btn-twitter">
			<span class="fa fa-twitter"></span> Sign in with Twitter
		</a>
		</center>
	</form>
	
	<!-- Login Form -->
					<div class="block">
						<center><strong>Or use your email the old fashioned way.</strong></center>
						
						<?php if(isloggedIn()) : ?>
							<div class="userdata">
								<?php echo getUser()['username']; ?>
							</div>
							<br>
							<form role="form" method="post" action="logout.php">
								<input type="submit" name="do_logout" class="btn btn-primary" value="Logout">
							</form>
						<?php else : ?>
						<form role="form" method="post" action="logging_in.php">
							<div class="form-group">
								<label>Username</label>
								<input name="username" type="text" class="form-control" placeholder="Username"></input>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input name="password" type="password" class="form-control" id="testPass" placeholder="Password"></input>
							</div>
							<button name="do_login" type="submit" class="btn btn-primary">Login</button> <a class="btn btn-default" href="register.php">Create Account</a>
						</form>
						<?php endif; ?>
						
					</div>
					</div>

<?php include('includes/footer.php'); ?>