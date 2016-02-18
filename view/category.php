<?php session_start(); ?>
<?php include('../model/ImageCategory.php'); ?>
<?php include('../model/Database.php'); ?>
<?php include('header.php'); ?>
		<!--- start of section -->
		<div class="container section"> 
			<div class="row">
				<div class="col-md-2">
					<aside>
						<div style="position: fixed;">
							<a href="index.php" style="float: rigth; margin: 20px 0 0 20px; color: #fff;" class="text-info"> 
								<span class="glyphicon glyphicon-arrow-left"></span> Back
							</a>
						</div>
					</aside>
				</div>
				<div class="col-md-8" style="padding-top: 15px;">	
					<div class="row">
						<!-- Display image. -->
						<div class="col-md-4 text-center">
							<?php $user = $_SESSION['user']; ?>
							<span id="user_id" style="display: none;"><?php echo $user['id']; ?></span>
						
							<h4 class="text-left">User: <span class="text-info"><?php echo $user['first_name'].' '. $user['last_name']; ?></span></h4>
							<div class="bg-info" style="border-radius: 5px;padding: 15px;overflow: auto;">
								<a class="btn btn-link btn-sm" style="float: right;color: darkred" href="../controller/logout.php">Logout</a>
								<div style="clear: both;">
								<?php if (isset($_SESSION['user']['image'])) : ?>
								<!-- Display user image -->
								<img alt="img-logo" src="../images/User/<?php echo $_SESSION['user']['image'];?>" width="100" height="100" style="border: 2px solid #ccc;margin-bottom: 10px;">
								<?php else : ?>
								<!-- Display default icon image -->
								<img alt="img-logo" src="../images/User/default.png" width="100" height="100" style="border: 2px solid #ccc;margin-bottom: 10px;">
								<?php endif; ?>
								</div>
								<div class="text-left">
									<p><span class="text-info">First name:</span><span id="first_name"> <?php echo $user['first_name']; ?></span>  </p>
									<p><span class="text-info">Last name:</span><span id="last_name"> <?php echo $user['last_name']; ?></span> </p>
									<p><span class="text-info">Country:</span><span id="country"> <?php echo $user['country']; ?></span></p>
									<p><span class="text-info">City:</span><span id="city"> <?php echo $user['city']; ?></span></p>
									<p><span class="text-info">Facebook: </span> <span id="facebook"><a href="<?php echo $user['facebook']; ?>"><img style="margin: 0" src="../images/logo/fb.png" alt="facebook logo" width="20" height="20"></a></span></p>
									<p><span class="text-info">Twitter: </span> <span id="twitter"><a href="<?php echo $user['twitter']; ?>"><img style="margin: 0" src="../images/logo/tw.png" alt="twitter logo" width="25" height="25"></a></span></p>
								</div> 
								<div>
									<button class="btn btn-link btn-sm" style="color: darkred;" id="modal_btn" data-toggle="modal" data-target="#my_modal">Change info</button>
								</div>
							</div>
						</div>
						<div class="col-md-8 text-left">						
							<?php if (isset($_SESSION['images'])) : ?>
								<?php $count = count($_SESSION['images']); ?>
									<div style="padding-right: 15px">
									
									<?php if ($count > 0): ?>
									<?php $cat = new ImageCategory(); ?>
									<?php $category = $cat->getCategoryName($_SESSION['category']); ?>
									<h3>Category: <span class="text-info"><?php echo  $category; ?> </span></h3>
									<?php $images = $_SESSION['images'];?>
									
									<?php foreach ($images as $img) : ?>
										<!-- Display Images -->
										<img class="user-image" src="../images/<?php echo $img['category'] . '/' . $img['name']; ?>" width="100%" height="auto" style="margin: 0 0 10px 0;" alt="image">
										<div style="float: right" class="fb-share-button" data-href="http://basil.eventesten.info/exercises/ex7%20-%20PHP/images/<?php echo $img['category'] . '/' . $img['name']; ?>" data-layout="button_count"></div>
										<p><b>File:</b> <span class="text-info"><?php echo $img['name'];?> </span></p>
										<p><b>Description:</b> <span class="text-info"><?php echo $img['description']; ?></span> </p>
										<p><b>Poster:</b><span class="text-info"> <?php echo $img['first_name'] .' '.$img['first_name']; ?> </span> </p>
										
										<hr>
		
									<?php endforeach; ?>
								<?php else : ?>
									<h1>No images.</h1>
								<?php endif; ?>
									</div>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
				<div class="col-md-2" >
					<aside>
						<form action="../controller/category.php" method="GET" class="form_category" style="width: 100%">
							<select name="category" class="form-control">
								<option>-- Category --</option>
								<!--- GET ALL CATEGORY FROM DATABASE -->
								<?php 
									$category = new ImageCategory();
									$result = $category->getAll();
								?>
								<?php if ($result->num_rows > 0) : ?> 
									<?php while($row = $result->fetch_assoc()) : ?>
										<option value="<?php echo $row['id']; ?>" ><?php echo $row['category']; ?></option>
									<?php endwhile; ?>
								<?php endif; ?>
							</select>
							<input type="submit" name="submit" value="Go" class="btn btn-primary">
						</form>
					</aside>
				</div>
			</div>
		</div> <!--- end of section -->
<?php include('footer.php'); ?>