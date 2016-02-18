<?php session_start(); ?>
<?php include('header.php'); ?>
<!--- start of header-->
		<header class="container">
			<div class="row">
				<div class="col-md-12 text-right">
					<h1><a href="images.php" class="btn btn-link"><span class="glyphicon glyphicon-hand-right text-danger"></span> Go to uploaded images.</a></h1>
				</div>
			</div>
		</header> <!--- end of header-->
		<!--- start of section -->
		<div class="container section"> 
			<div class="row">
				<div class="col-md-2">
					<aside>
					
					</aside>
				</div>
				<div class="col-md-8">
					
					<?php if (isset($_SESSION['errors'])) : ?>
						<?php $errors = $_SESSION['errors']; ?>
						<?php foreach ($errors as $error): ?>
							<h3><span class="label label-danger">
							<?php echo $error; ?>
						</span>
						</h3>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php session_destroy(); ?>
					
					<h1>Upload Image...</h1>

					<form action="../controller/upload.php" method="POST" enctype="multipart/form-data">
						<div class="text-left">
							<div class="form-group">
								<input type="file" id="file" name="user_file[]" multiple="multiple" required>
								<p class="help-block">File must not exceed 2mb.</p>
							</div>
							<div class="form-group">
								<label for="category">Category</label>
								<select name="category" id="category" class="form-control" required>
									<option value="">Select</option>
									<option value="Animal">Animal</option>
									<option value="Human">Human</option>
									<option value="Nature">Nature</option>
									<option value="Scary">Scary</option>
									<option value="House">House</option>
									<option value="Funny">Funny</option>
									<option value="Other">Other</option>
								</select>
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" class="form-control" id="description" name="description">
							</div>
						</div>
						<div class="image_info text-left">
							<div class="form-group">
								<label>User picture</label>
								<input type="file" name="user_image" required>
							</div>
							<div class="form-group">
								<label for="first_name">First name</label>
								<input type="text" class="form-control" id="first_name" name="first_name" required>
							</div>
							<div class="form-group">
								<label for="last_name">Last name</label>
								<input type="text" class="form-control" id="last_name" name="last_name" required>
							</div>
							<div class="form-group">
								<label for="country">Country</label>
								<input type="text" class="form-control" id="country" name="country" required>
							</div>
							<div class="form-group">
								<label for="city">City</label>
								<input type="text" class="form-control" id="city" name="city" required>
							</div>
							<div class="form-group">
								<label for="facebook_link">Facebook Page/URL</label>
								<input type="text" class="form-control" id="facebook_link" name="facebook_link" required>
							</div>
							<div class="form-group">
								<label for="twitter_link">Twitter Page/URL</label>
								<input type="text" class="form-control" id="twitter_link" name="twitter_link" required>
							</div>
							<input type="submit" name="submit" id="btn-submit" class="btn btn-primary btn-lg btn-upload" value="Click to upload">
						</div>
						
					</form>
				</div>
				<div class="col-md-2">
					<aside>
						<a style="color: #fff;" href="login.php">Login</a> 
						<span class="text-info">|</span>
						<a style="color: #fff;" href="register.php">Sign Up</a>
					</aside>
				</div>
			</div>
		</div> <!--- end of section -->
		
<?php include('footer.php'); ?>