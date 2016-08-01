<?php include('includes/header.php'); ?>

<!-- BootStrap ComboBox -->
<script src="<?php echo BASE_URI; ?>templates/js/bootstrap-combobox.js"></script>
<link href="<?php echo BASE_URI; ?>templates/css/bootstrap-combobox.css" rel="stylesheet">

<script type="text/javascript">
  $(document).ready(function(){
    $('.combobox').combobox();
	$('.combobox').val('');
  });
</script>

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
<div class="block tags-block">
	<h2>Tags</h2>
	<?php if (isLoggedIn() && getUser()['username'] == $thisProfile->username) : ?>
	<strong>Add your skills</strong>
		<form role="form" method="post" action="<?php echo BASE_URI; ?>addTag.php">
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<select class="form-control combobox" name="tag">
							<?php foreach(getTags() as $tag) : ?>
								<option><?php echo $tag->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<button name="add_tag" type="submit" class="btn btn-primary">Add</button>
				</div>
			</div>
		</form>
	<?php endif; ?>
	<div class="user-tags">
		<ul>
			<?php foreach(getUserTags($thisProfile->username) as $tag) : ?>
				<li><?php echo $tag->name; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<?php include('includes/footerNoBlock.php'); ?>