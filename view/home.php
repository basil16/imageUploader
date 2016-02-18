<?php session_start(); ?>
<?php include('../model/ImageCategory.php'); ?>
<?php include('../model/Database.php'); ?>
<?php include('header.php'); ?>
		<!--- start of section -->
		<div class="container section"  style="border: 1px solid #fff;"> 
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
					
					<!-- Display errors -->
					
					<?php if (isset($_SESSION['file_error'])) : ?> 
					<div class="row">
						<div class="col-md-12 text-left">
						<h4>File Error: <span class="label label-danger">An error occured, please check file size and file type.<span></h4>
						
						<?php $count = count($_SESSION['file_error']); ?>
						<?php for ($i = 0; $i < $count; $i++) : ?>
						<p class="text-danger" style="margin-left: 30px;">File <span class="glyphicon glyphicon-hand-right"> </span> <span class="text-info"><?php echo $_SESSION['file_error'][$i]['name']; ?></span></p>
						<?php endfor; ?>
						</div>
					</div>
					<?php endif; ?>
					
					<div class="row">
					
						<?php $user = $_SESSION['user']; ?>
						
						<div class="col-md-4 text-center" style="padding: 0 15px;">
						
						<span id="user_id" style="display: none;"><?php echo $user['id']; ?></span>
							<h4 class="text-left"> User: <span class="text-info"><?php echo $user['first_name'].' '. $user['last_name']; ?></span></h4>
						
							<div class="bg-info" style="border-radius: 5px;padding: 15px;">
								<a class="btn btn-link btn-sm" style="float: right;color: darkred" href="../controller/logout.php">Logout</a>
								<div style="clear: both;">
								<?php if (isset($_SESSION['user']['image'])) : ?>
								<img alt="img logo" src="../images/User/<?php echo $_SESSION['user']['image'];?>" width="100" height="100" style="border: 2px solid #ccc;margin-bottom: 10px;clear:both;">
								<?php else : ?>
								<img alt="img logo" src="../images/User/default.png" width="100" height="100" style="border: 2px solid #ccc;margin: 10px auto;">
								<?php endif; ?>
								</div>
							<div class="text-left">
								<p><span class="text-info">First name: </span><?php echo $_SESSION['user']['first_name']; ?>  </p>
								<p><span class="text-info">Last name: </span><?php echo $_SESSION['user']['last_name']; ?> </p>
								<p><span class="text-info">Country:</span> <?php echo $_SESSION['user']['country']; ?></p>
								<p><span class="text-info">City:</span> <?php echo $_SESSION['user']['city']; ?></p>
								<p><span class="text-info">Facebook: </span> <a href="<?php echo $user['facebook']; ?>"><img style="margin: 0" src="../images/logo/fb.png" alt="facebook logo" width="20" height="20"></a></p>
								<p><span class="text-info">Twitter: </span> <a href="<?php echo $user['twitter']; ?>"><img style="margin: 0" src="../images/logo/tw.png" alt="twitter logo" width="25" height="25"></a></p>
								
							</div> 
							<div>
							<button class="btn btn-link btn-sm" style="color: darkred;" id="modal_btn" data-toggle="modal" data-target="#my_modal">Change info</button>
								</div>
							</div>
						</div>
						<div class="col-md-8 text-left" style="overflow: auto; border-left: 1px solid #ccc;" >
							<!-- Display image. -->
							<?php if (isset($_SESSION['file_success'])) : ?>
							<h4>File success:</h4>
								<div style="">
								<?php foreach ($_SESSION['file_success'] as $file) : ?>
									<img  style="margin: 0 0 10px 0;" class="user-image" src="../images/<?php echo $file['category'] . '/' . $file['name']; ?>" width="100%" height="auto" style="border: 5px solid #ccc;">
									<div class="text-right">
										<div style="float: right; margin-left: 5px;" class="fb-share-button" data-href="http://basil.eventesten.info/exercises/ex7%20-%20PHP/images/<?php echo $img['category'] . '/' . $img['name']; ?>" data-layout="button"></div>
										<a href="https://twitter.com/share?>" class="twitter-share-button" data-href="http://basil.eventesten.info/exercises/ex7%20-%20PHP/images/<?php echo $img['category'] . '/' . $img['name']; ?>" data-via="abakitz16">Tweet</a>
									</div>
										
									<h6> <b>File:</b> <?php echo $file['name']; ?></h6>
									
									<p><span class="text-info">Description:</span> <?php echo $file['description']; ?></p>
									<p><span class="text-info">Category:</span> <?php echo $file['category']; ?></p>
									
									<hr>
								<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-md-2" >
					<aside>
						<form action="../controller/category.php" method="GET" class="form_category" style="width: 100%;">
							<select name="category" class="form-control">
								<option>-- Category --</option>
								<?php 
									$category = new ImageCategory();
									$result = $category->getAll();
								?>
								<?php if ($result->num_rows > 0) : ?> 
									<?php while ($row = $result->fetch_assoc()) : ?>
										<option value="<?php echo $row['id'];?>" ><?php echo $row['category']; ?></option>
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