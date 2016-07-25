<?php include('includes/header.php'); ?>

<!-- Topics Area -->
<ul id="topics">
	<li id="main-topic" class="topic topic">
		<div class="row">	
			<div class="col-md-2">
				<div class="user-info">
					<img class="avatar pull-left" src="<?php echo BASE_URI; ?>img/avatars/<?php echo $topic->user_id . '/' . $topic->avatar; ?>" />
					<ul>
						<li><strong><?php echo $topic->username; ?></strong></li>
						<li><?php echo userPostCount($topic->user_id); ?> Posts</li>
						<li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php echo $topic->user_id; ?>">View topics</a>
					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="topic-content pull-left">
					<?php echo $topic->body; ?>
				</div>
			</div>
		</div>
	</li>
	
	<!-- Replies -->
	<?php foreach($replies as $reply) : ?>
	<li class="topic topic">
		<div class="row">
			<div class="col-md-2">
				<div class="user-info">
					<img class="avatar pull-left" src="<?php echo BASE_URI; ?>img/avatars/<?php echo $reply->user_id . '/' . $reply->avatar; ?>" />
					<ul>
						<li><strong><?php echo $reply->username; ?></strong></li>
						<li><?php echo userPostCount($reply->user_id); ?> Posts</li>
						<li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php echo $reply->user_id; ?>">View topics</a>
					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="topic-content pull-left">
					<?php echo $reply->body; ?>
				</div>
			</div>
		</div>
	</li>
	<?php endforeach; ?>
</ul>

<!-- Create reply if logged in-->
<?php if(isLoggedIn()) : ?>
<h3>Reply To Topic</h3>
<form role="form" method="post" action="topic.php?id=<?php echo $topic->id; ?>">
	<div class="form-group">
		<textarea id="reply" rows="10" cols="80" class="form-control" name="body"></textarea>
		<script>CKEDITOR.replace('reply');</script>
	</div>
	<button name="do_reply" type="submit" class="btn btn-default">Submit</button>
</form>
<?php endif; ?>

<?php include('includes/footer.php'); ?>