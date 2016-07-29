<?php include('includes/header.php'); ?>
<ul id="topics">
						
	<?php if($replies) : ?>
		<?php foreach($replies as $reply) : ?>
			<li class="topic">
				<div class="row">
					<div class="col-md-2">
						<a href="<?php echo BASE_URI . $reply->top_username; ?>">
							<img class="avatar pull-left" src="<?php echo BASE_URI; ?>img/avatars/<?php echo $reply->user_id . '/' . $reply->avatar; ?>"/>
						</a>
					</div>
					<div class="col-md-10">
						<div class="topic-content">
							<h3><a href="<?php echo BASE_URI; ?><?php echo urlFormat($reply->top_username); ?>/<?php echo urlFormat($reply->title); ?>"><?php echo $reply->title; ?></a></h3>
							<div class="topic-info">
								<a href="<?php echo BASE_URI; ?>topics/<?php echo urlFormat($reply->cat_name); ?>"><?php echo $reply->cat_name; ?></a> >> 
								<a href="<?php echo BASE_URI; ?><?php echo urlFormat($reply->top_username); ?>/topics"><?php echo $reply->top_username; ?></a> >>
								<?php echo formatDate($reply->create_date); ?>
								<span class="badge pull-right"><?php echo replyCount($reply->top_id); ?></span>
							</div>
						</div>
					</div>
				</div>
			</li>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No topics to display</p>
	<?php endif; ?>
</ul>
	<h3>MyMentor.Codes Stats</h3>
<ul>
	<li>Total Users: <strong><?php echo $totalUsers; ?></strong></li>
	<li>Total Topics: <strong><?php echo $totalTopics; ?></strong></li>
</ul>
<?php include('includes/footer.php'); ?>