<?php include('includes/header.php'); ?>


<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1712180159006758',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>



<div class="login-container">
<!-- Register Form -->
	<h2>Log in with your social media account. </h2>
	<br>
	<center>
		<a class="btn btn-block btn-social btn-github">
			<span class="fa fa-github"></span> Sign in with GitHub
		</a>
		<a class="btn btn-block btn-social btn-linkedin">
			<span class="fa fa-linkedin"></span> Sign in with LinkedIn
		</a>

		<a class="btn btn-block btn-social btn-facebook" href="#" onclick="FB.login();">
			<span class="fa fa-facebook"></span> Sign in with Facebook
		</a>

		<a class="btn btn-block btn-social btn-twitter">
			<span class="fa fa-twitter"></span> Sign in with Twitter
		</a>
	</center>
	
	<!-- Login Form -->
	<br><br><br>
	<h3>Or you can log in the old fashioned way.</h3>
	<br>
						
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

<?php include('includes/footer.php'); ?>