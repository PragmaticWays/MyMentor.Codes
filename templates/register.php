<?php include('includes/header.php'); ?>

<!-- Register Form -->
	<form role="form" enctype="multipart/form-data" method="post" action="register.php">
		<div class="form-group">
			<label>Name*</label> <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
		</div>
		<div class="form-group">
			<label>Email Address*</label> <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
		</div>
		<div class="form-group">
			<label>Username*</label> <input type="text" class="form-control" name="username" placeholder="Choose a Username">
		</div>
		<div class="form-group">
			<label>Password*</label> <input type="password" class="form-control" name="password" placeholder="Enter a Password">
		</div>
		<div class="form-group">
			<label>Confirm Password*</label> <input type="password" class="form-control" name="password2" placeholder="Reenter Your Password">
		</div>
		<div class="form-group">
			<label>Location</label> <input type="text" class="form-control" name="location" placeholder="Where do you live?">
		</div>
		<div class="form-group">
			<label>Upload Avatar</label> <input type="file" name="avatar">
			<p class="help-block"></p>
		</div>
		<div class="form-group">
			<label>About Me</label> 
			<textarea id="about" rows="6" cols="80" class="form-control" name="about" placeholder="Tell us about yourself"></textarea>
		</div>
		<button name="register" type="submit" class="btn btn-primary">Register</button>
	</form>

<?php include('includes/footer.php'); ?>