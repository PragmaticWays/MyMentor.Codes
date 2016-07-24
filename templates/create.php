<?php include('includes/header.php'); ?>

<!-- Create Topic Form -->
						<form role="form">
							<div class="form-group">
								<label>Topic Title</label>
								<input type="text" class="form-control" name="title" placeholder="Enter Post Title">
							</div>
							<div class="form-group">
								<label>Category</label>
								<select class="form-control">
									<option>Web</option>
									<option>iOS</option>
									<option>Android</option>
								</select>
							</div>
							<div class="form-group">
								<label>Topic Body</label>
								<textarea id="body" rows="10" cols="80" class="form-control" name="body"></textarea>
								<script>CKEDITOR.replace('body');</script>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>

<?php include('includes/footer.php'); ?>