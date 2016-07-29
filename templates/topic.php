<?php include('includes/header.php'); ?>

<!-- Topics Area -->
<ul id="topics">
	<li id="main-topic" class="topic topic">
		<div class="row">	
			<div class="col-md-2">
				<a href="<?php echo BASE_URI . $topic->username; ?>">
				<div class="user-info">
						<img class="avatar pull-left" src="<?php echo BASE_URI; ?>img/avatars/<?php echo $topic->user_id . '/' . $topic->avatar; ?>" style="float:left;"/>
					
					<ul>
						<li><strong><?php echo $topic->username; ?></strong></li>
						<li><a href="<?php echo BASE_URI . $topic->username; ?>/<?php echo urlFormat($topic->title); ?>"><?php echo userTopicCount($topic->user_id); ?> Posts</a></li>
					</ul>
				</div>
				</a>
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
			<a href="<?php echo BASE_URI . $reply->username; ?>">
				<div class="user-info">
					<img class="avatar pull-left" src="<?php echo BASE_URI; ?>img/avatars/<?php echo $reply->top_user_id . '/' . $reply->avatar; ?>" />
					<ul>
						<li><strong><?php echo $reply->username; ?></strong></li>
						<li><a href="<?php echo BASE_URI; ?><?php echo $reply->username; ?>/topics"><?php echo userTopicCount($reply->user_id); ?> Topics</a></li>
						<li><a href="<?php echo BASE_URI; ?><?php echo $reply->username; ?>/replies"><?php echo userReplyCount($reply->user_id); ?> Replies</a></li>
						
					</ul>
				</div>
				</a>
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
<form role="form" method="post" action="<?php echo BASE_URI; ?><?php echo $topic->username; ?>/<?php echo urlFormat($topic->title); ?>">
	<div class="form-group">
		<textarea id="reply" rows="10" cols="80" class="form-control" name="body"></textarea>
		<script>CKEDITOR.replace('reply');</script>
	</div>
	<button name="do_reply" type="submit" class="btn btn-default">Submit</button>
</form>
<?php endif; ?>

<?php include('includes/footer.php'); ?>