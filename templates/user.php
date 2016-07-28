<?php include('includes/header.php'); ?>


	<img id="prof-pic" class="avatar pull-left" src="<?php echo BASE_URI; ?>img/avatars/<?php echo $thisProfile->id . '/' . $thisProfile->avatar; ?>" />
	<h3>About <?php echo $thisProfile->username; ?></h3>
	<p><?php echo $thisProfile->about; ?></p>
	
	<br style="clear: both">
	<strong>Location: </strong><?php echo $thisProfile->location; ?>
	
	</div> <!-- end block from header -->
	
	<div class="block"></div>


<?php include('includes/footerNoBlock.php'); ?>