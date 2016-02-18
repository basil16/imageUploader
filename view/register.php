<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<meta name="description" content="php exercise">
		<meta name="keywords" content="php, exercises, image upload">
		<meta name="author" content="Basil">
		
		<!-- facebook tags -->
		<meta property="og:url"           content="http://basil.eventesten.info/exercises/ex7%20-%20PHP/view/category.php" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Image Uploader" />
		<meta property="og:description"   content="Image upload website" />
		<meta property="og:image"         content="http://basil.eventesten.info/exercises/ex7%20-%20PHP/images/Animal/puppy.jpg" />
	
		<!-- twitter tags -->
		<meta name="twitter:card" content="photo" />
		<meta name="twitter:site" content="Uploader" />
		<meta name="twitter:title" content="Image Uploader" />
		<meta name="twitter:image" content="http://basil.eventesten.info/exercises/ex7%20-%20PHP/images/Animal/puppy.jpg" />
		<meta name="twitter:url" content="http://basil.eventesten.info/exercises/ex7%20-%20PHP/view/category.php" />
		
		<link rel="shortcut icon" type="img/png" href="../images/Animals/puppy.jpg">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/css/mystyle.css">
		<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
			
	</head>
	<body>
<div class="container">
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            
            <a class="navbar-brand" href="index.php"><-- Back</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
     </nav>
	<div style="width: 70%; margin: 0 auto;">
		<form method="POST" action="../controller/do_register.php">
			<?php if (isset($_SESSION['result'])) : ?>
				<?php if ($_SESSION['result']) : ?>
					<?php foreach($_SESSION['result'] as $error): ?>
					<p><span class="label label-danger"><?php echo $error; ?></span></p>
					<?php endforeach; ?>
				
				<?php else: ?>
				<div class="text-right" >
					<p><span class="text-info"> Registraion Successful. <a href="login.php">Login here...</a></span><span style="color: green;font-size: 40px;"> &#10004 </span></p>
				</div>
				<?php endif; ?>
			<?php endif; ?>
			<?php unset($_SESSION['result']); ?>
			
			<h1 style="margin-bottom: 20px;">Register... !</h1>
			<div class="row">
				<div class="col-md-12 text-left">
					<h4 class="text-primary text-right">Personal Information</h4>
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input class="form-control" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['first_name']; ?>" type="text" name="first_name" id="first_name" required>
					</div>	
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input class="form-control" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['last_name']; ?>" type="text" name="last_name" id="last_name" required>
					</div>
					<div class="form-group">
						<label for="country">Country</label>
						<input type="text" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['country']; ?>" class="form-control" id="country" name="country" required>
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<input type="text" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['city']; ?>" class="form-control" id="city" name="city" required>
					</div>
					<div class="form-group">
						<label for="facebook_link">Facebook Page/URL</label>
						<input type="text" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['facebook']; ?>" class="form-control" id="facebook_link" name="facebook_link" required>
					</div>
					<div class="form-group">
						<label for="twitter_link">Twitter Page/URL</label>
						<input type="text" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['twitter']; ?>" class="form-control" id="twitter_link" name="twitter_link" required>
					</div>							
					<hr style="border-top: 1px solid #fff">
					<h4 class="text-primary text-right">User Account</h4>
						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['username']; ?>" type="text" name="username" id="username" required>
						</div>	
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" value="<?php if(isset($_SESSION['user_data'])) echo $_SESSION['user_data']['email']; ?>" type="email" name="email" id="email" required> 
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" name="password" id="password" required>
						</div>
						<div class="form-group">
							<label for="repeatpassword">Repeat Password</label>
							<input class="form-control" type="password" name="repeatpassword" id="repeatpassword" required>
						</div>
						<div>
							<button type="submit" class="btn btn-primary" name="register">Submit</button>
						</div>
					
				</div>
			</div>
		</form>
	</div>
</div>
<?php include('footer.php'); ?>