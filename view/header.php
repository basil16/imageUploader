<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Php - Exercise1</title>
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
		<!-- Load Facebook SDK for JavaScript -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<script>
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		if(!d.getElementById(id)){js=d.createElement(s);
		js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);}}
		(document, 'script', 'twitter-wjs');</script>
		