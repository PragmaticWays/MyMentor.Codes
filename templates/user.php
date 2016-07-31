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
	
<div class="block"></div>

<?php include('includes/footerNoBlock.php'); ?>