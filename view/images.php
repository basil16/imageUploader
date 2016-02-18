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
				<div class="col-md-8" style="padding-top: 15px; height: auto;">	
					<div class="row" style="height: auto;">
						<div class="col-md-12 text-left">		
							<!-- Display image. -->						
							<?php if (isset($_SESSION['images'])) : ?>
								<?php $count = count($_SESSION['images']); ?>
									<div style="padding-right: 15px;">
									
									<?php if ($count > 0): ?>
									<?php $cat = new ImageCategory(); ?>
									<?php $category = $cat->getCategoryName($_SESSION['category']); ?>
									<h3>Category: <span class="text-info"><?php echo  $category; ?> </span></h3>
									<?php $images = $_SESSION['images'];?>
									
									<?php foreach ($images as $img) : ?>
							
										<img class="user-image" src="../images/<?php echo $img['category'] . '/' . $img['name']; ?>" width="100%" height="auto" style="margin: 0 0 10px 0;" alt="image">
										<div class="text-right">
											<div style="float: right; margin-left: 5px;" class="fb-share-button" data-href="http://basil.eventesten.info/exercises/ex7%20-%20PHP/images/<?php echo $img['category'] . '/' . $img['name']; ?>" data-layout="button"></div>
											<a href="https://twitter.com/share?>" class="twitter-share-button" data-href="http://basil.eventesten.info/exercises/ex7%20-%20PHP/images/<?php echo $img['category'] . '/' . $img['name']; ?>" data-via="abakitz16">Tweet</a>										
										</div>
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
							<input type="hidden" name="images_page" value="1">
							<input type="submit" name="submit" value="Go" class="btn btn-primary">
						</form>
					
					</aside>
				</div>
			</div>
		</div> <!--- end of section -->
<?php include('footer.php'); ?>