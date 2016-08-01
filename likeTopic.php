<?php include('core/init.php'); ?>
<?php 

	if(isset($_POST['like_topic'])) {
		
		// Create topic object
		$topic = new Topic();
		
		// Create validator object
		$validate = new Validator();
		
		// If user has not liked this topic
		if ($validate->userNotLikeTopic($_POST['topic_id'])) {
			// If user has not disliked this topic
			if ($validate->userNotDislikeTopic($_POST['topic_id'])) {
				// Proceed to insert
				if($topic->likeTopic($_POST['topic_id'])) {
					redirect($_SERVER['HTTP_REFERER'], 'You liked it!', 'success');
				}
			} else {
				// Delete user's Dislike record for this topic, then like it
				if ($topic->likeFromDislike($_POST['topic_id'])) {
					redirect($_SERVER['HTTP_REFERER'], 'You liked it!', 'success');
				}
			}
		} else {
			// Error: you already liked this topic
			redirect($_SERVER['HTTP_REFERER'], 'You already liked it!', 'error');
		}
	} else if (isset($_POST['dislike_topic'])) {
		
		// Create topic object
		$topic = new Topic();
		
		// Create validator object
		$validate = new Validator();
		
		// If user has not disliked this topic
		if ($validate->userNotDislikeTopic($_POST['topic_id'])) {
			// If user has not liked this topic
			if ($validate->userNotLikeTopic($_POST['topic_id'])) {
				// Proceed to insert
				if($topic->dislikeTopic($_POST['topic_id'])) {
					redirect($_SERVER['HTTP_REFERER'], 'You did not like that topic.', 'success');
				}
			} else {
				// Delete user's Like record for this topic, then dislike it
				if ($topic->dislikeFromLike($_POST['topic_id'])) {
					redirect($_SERVER['HTTP_REFERER'], 'You did not like that post!', 'success');
				}
			}
		} else {
			// Error: you already disliked this topic
			redirect($_SERVER['HTTP_REFERER'], 'You already disliked it!', 'error');
		}
	} else {
		redirect('./');
	}
?>