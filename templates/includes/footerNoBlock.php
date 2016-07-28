
				</div><!-- /.main-col from header -->
			</div><!-- /.col-md-8 from header -->
			
			
			<!-- Sidebar: Login & Categories -->
			<div class="col-md-4">
				<div class="sidebar">
					<!-- Login Form -->
					<div class="block">
						<h3>Login</h3>
						
						<?php if(isloggedIn()) : ?>
							<div class="userdata">
								<?php echo getUser()['username']; ?>
							</div>
							<br>
							<form role="form" method="post" action="logout.php">
								<input type="submit" name="do_logout" class="btn btn-primary" value="Logout">
							</form>
						<?php else : ?>
						<form role="form" method="post" action="login.php">
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
					<!-- Categories -->
					<div class="block">
						<h3>Categories</h3>
						<div class="list-group">
							<a href="topics.php" class="list-group-item <?php echo is_active(null); ?>">All Topics</a>
							<?php foreach(getCategories() as $category) : ?>
							<a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item <?php echo is_active($category->id); ?>"><?php echo $category->name; ?></a>
							<?php endforeach; ?>
						</div>
					</div>	
				</div>
			</div>
			
		</div><!-- /.row -->

    </div><!-- /.container -->
</main>
	
<!-- Footer -->
<footer>
	<div class="footer-content-wrapper">
		<div class="footer-col large-25 small-50 tiny-100 ta-l flt">
			<h3>MyMentor.Codes</h3>
			<a href="index.php">Home</a>
			<a href="about.php">About</a>
			<a href="#">Contact</a>
		</div>
		<div class="footer-col large-25 small-50 tiny-100 ta-l flt">
			<h3>Community</h3>
			<a href="#">Privacy Statement</a>
			<a href="#">Code of Conduct</a>
			<a href="#">Support</a>
		</div>
		<div class="footer-col large-25 small-50 tiny-100 ta-l flt">
			<h3>Categories</h3>
			<a href="topics.php">All Topics</a>
			<?php foreach(getCategories() as $category) : ?>
			<a href="topics.php?category=<?php echo $category->id; ?>"><?php echo $category->name; ?></a>
			<?php endforeach; ?>
			
		</div>
		<div class="footer-col large-25 small-50 tiny-100 ta-l flt">
			<h3>Social</h3>
			<a href="https://www.facebook.com/MyMentorCodes-1619529868337963/" target="_blank">Facebook</a>
			<a href="https://twitter.com/MyMentorCodes" target="_blank">Twitter</a>
			<a href="#">YouTube</a>
			<a href="#">Instagram</a>
		</div>
	</div>
	<div class="clearfix"></div>
</footer>

</body>
</html>