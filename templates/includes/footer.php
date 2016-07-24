					</div>
				</div>
			</div>
			<!-- Sidebar: Login & Categories -->
			<div class="col-md-4">
				<div class="sidebar">
					<!-- Login Form -->
					<div class="block">
						<h3>Login</h3>
						<form role="form">
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
			
		</div>

    </div><!-- /.container -->

  </body>
</html>