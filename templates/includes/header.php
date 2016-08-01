<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="An online mentor program for programmers - A community of programmers, software engineers, and web developers to learn from each other and teach each other.">
    <meta name="author" content="Adam Allard">
	
	<meta property="og:title" content="MyMentor.Codes">  
	<meta property="og:description" content="An online mentor program for programmers - A community of programmers, software engineers, and web developers to learn from each other and teach each other.">
	<meta property="og:image" content="http://mymentor.codes/img/avatars/gravatar.png">
	<meta property="og:url" content="http://mymentor.codes">
    
	<meta name="twitter:site" content="@mymentorcodes">
	<meta property="twitter:title" content="MyMentor.Codes">  
	<meta property="twitter:description" content="An online mentor program for programmers - A community of programmers, software engineers, and web developers to learn from each other and teach each other.">
	<meta property="twitter:image" content="http://mymentor.codes/img/avatars/gravatar.png">
	
    <link rel="icon" href="../../favicon.ico">

    <title>MyMentor.Codes | A mentor program for programmers</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URI; ?>templates/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo BASE_URI; ?>templates/css/bootstrap-social.css" rel="stylesheet" >
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URI; ?>templates/css/custom.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo BASE_URI; ?>templates/js/bootstrap.js"></script>
	<script src="<?php echo BASE_URI; ?>templates/js/ckeditor/ckeditor.js"></script>
	
	
	<?php
	// Check if title is set, if not then assign it to default
	if (!isset($title)) {
		$title = SITE_TITLE; // (SITE_TITLE can be found in config.php)
	}
	?>
  </head>

  <body>
  <main>

	<br>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a id="nav-head-link" class="navbar-brand" href="index.php"><img id="nav-img" class="pull-left"/>MyMentor.Codes</a>
        </div>
		
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo BASE_URI; ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			
			<?php if(!isLoggedIn()) : ?>
				<li><a href="<?php echo BASE_URI; ?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="<?php echo BASE_URI; ?>register"><span class="glyphicon glyphicon-user"></span> Create An Account</a></li>
				<li><a href="<?php echo BASE_URI; ?>about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
			<?php else : ?>
				<li><a href="<?php echo BASE_URI; ?>find-mentor"><span class="glyphicon glyphicon-search"></span> Find a Mentor</a></li>
				<li><a href="<?php echo BASE_URI; ?>create"><span class="glyphicon glyphicon-pencil"></span> Create Topic</a></li>
				<li><a href="<?php echo BASE_URI; ?><?php echo $user['username']; ?>"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
				<!-- Logout Link that acts as form -->
				<form method="post" action="<?php echo BASE_URI; ?>logout.php" class="inline">
					<input type="hidden" name="do_logout" value="Logout">
					<button type="submit" name="do_logout" value="Logout" class="logout-button"><span class="glyphicon glyphicon-log-out"></span> Logout</button>
				</form>
			<?php endif; ?>
			
          </ul>
        </div><!--/.nav-collapse -->
		
      </div>
    </nav>

    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block" id="first-block">
						<h1 class="pull-left"><?php echo $title; ?></h1>
						<h4 class="pull-right">An Online Mentorship Program for Programmers</h4>
						<div class="clearfix"></div>
						<hr>
						
						<?php displayMessage(); ?>