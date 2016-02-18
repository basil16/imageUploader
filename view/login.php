<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Php - Login </title>
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
	<div style="width: 50%; margin: 0 auto;">
		<!-- Start of login form -->
		<form method="POST" action="../controller/do_login.php">
			<h1 style="margin-bottom: 20px;">Login !</h1>
			<div class="form-group">
				<label for="username">Username</label>
				<input value="<?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>" class="form-control" type="text" name="username" id="username" required>
			</div>	
			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" id="password" required>
			</div>
			<div>
				<button type="submit" class="btn btn-primary" name="login">Login</button> .
					<?php if (isset($_SESSION['error_login'])) : ?>
				<h3 style="float: right;" class="label label-danger">Invalid username/password. !</h3>
			<?php endif; ?>
			</div>
		</form>
		<!-- end of login form -->
	</div>
</div>
<?php include('footer.php'); ?>