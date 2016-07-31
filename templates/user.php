<?php include('includes/header.php'); ?>

<div class="row">
	<div class="col-md-2">
		<img class="avatar pull-left" src="<?php echo BASE_URI; ?>img/avatars/<?php echo $thisProfile->id . '/' . $thisProfile->avatar; ?>" />
	</div>
	<div class="col-md-10">
		<h3><?php echo $thisProfile->username; ?></h3>
		<p><?php echo $thisProfile->about; ?></p>
	</div>
</div>

<strong>Location: </strong><?php echo $thisProfile->location; ?>
	
</div> <!-- end block from header -->
<div class="block">
	<h2>Tags</h2>
	<?php if (isLoggedIn() && getUser()['username'] == $thisProfile->username) : ?>
	<div class="form-group">
		<label>Add your skills</label> <input type="text" class="form-control" name="tags" placeholder="e.g. C++, iOS, MySQL">
	</div>
	<?php endif; ?>
	<div class="users-tags"></div>
</div>

<?php include('includes/footerNoBlock.php'); ?>