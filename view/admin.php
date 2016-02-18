<?php
session_start();
include('../model/Database.php');
include('../model/User.php');
include('header.php');
$u = new User();
$users = $u->getAll();

?>
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
						
							<h4 class="text-left">Administrator	</h4>
							<div class="bg-info" style="border-radius: 5px;padding: 15px;overflow: auto;">
							<a class="btn btn-link btn-sm" style="float: right;color: darkred" href="../controller/logout.php">Logout</a>
								<div style="clear: both;">
								<?php if (isset($_SESSION['user']['image'])) : ?>
								
								<!-- Display user image -->
								<img src="../images/User/<?php echo $_SESSION['user']['image'];?>" width="100" height="100" style="border: 2px solid #ccc;margin-bottom: 10px;">
								<?php else : ?>
								<!-- Display default icon image -->
								<img src="../images/User/default.png" width="100" height="100" style="border: 2px solid #ccc;margin-bottom: 10px;" alt="image logo">
								<?php endif; ?>
								</div>
								<div class="text-left">
									<p><span class="text-info">First name:</span><span id="first_name"> <?php echo $user['first_name']; ?></span>  </p>
									<p><span class="text-info">Last name:</span><span id="last_name"> <?php echo $user['last_name']; ?> </span></p>
									<p><span class="text-info">Country:</span><span id="country"> <?php echo $user['country']; ?></span></p>
									<p><span class="text-info">City:</span><span id="city"> <?php echo $user['city']; ?></span></p>
									<p><span class="text-info">Facebook: </span> <span id="facebook"><a href="<?php echo $user['facebook']; ?>"><img style="margin: 0" src="../images/logo/fb.png" alt="facebook logo" width="20" height="20"></a></span></p>
									<p><span class="text-info">Twitter: </span> <span id="twitter"><a href="<?php echo $user['twitter']; ?>"><img style="margin: 0" src="../images/logo/tw.png" alt="twitter logo" width="25" height="25"></a></span></p>
								</div> 
								<div style="color: darkred;font-size: 14px;">
									<a class="btn btn-link btn-sm"  id="modal_btn" data-toggle="modal" data-target="#my_modal">Change info</a>
									<br>
									
								</div>
							</div>
						</div>
						<div class="col-md-8 text-left" style="border-left: 1px solid #eee;border-radius: 0;">						
							<!-- Display Users -->
							
							<div id="users_div">
								<h4>User List...</h4>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Firstname</th>
											<th>Lastname</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php while ($user_row = $users->fetch_assoc()): ?>
									
										<tr id="<?php echo 'tr_' . $user_row['id'];?>" >
											<td><?php echo $user_row['id']; ?></td>
											<td><?php echo $user_row['first_name']; ?></td>
											<td><?php echo $user_row['last_name']; ?></td>
											<td class="text-center">
												<a data-id="<?php echo $user_row['account_id']; ?>" class="btn btn-link btn-sm edit_btn" href="#">Edit Account</a>
												<span>|</span>
												<a id="<?php echo $user_row['id'];?>" data-id="<?php echo $user_row['account_id']; ?>" class="btn btn-link btn-sm delete_btn" href="#">Delete <span class="glyphicon glyphicon-remove text-danger"></span></a>
											</td>
										</tr>
								
									<?php endwhile;?>
									</tbody>
								</table>
							
							</div>
							<!-- Modal for user manipulation -->
							<div id="user_modal" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4>Edit Account</h4>
										</div>
										<div class="modal-body" style="background-color: #eee;">
											<form id="form_admin">
												<div class="form-group">
													<label for="username">Username</label>
													<input type="text" id="username" class="form-control"/>
												</div>
												<div class="form-group">
													<label for="password">New Password</label>
													<input type="password" id="password" class="form-control"/>
												</div>
												
												<div class="form-group">
													<label for="repeatpassword">Retype Password</label>
													<input type="password" id="repeatpassword" class="form-control"/>
												</div>
												<div class="form-group">
													<label for="email">Email</label>
													<input type="text" id="email" class="form-control"/>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<span style="float: left;" class="text-left text-danger" id="error"></span>
											<div id="update_success_message" style="display: none;" class="text-left">
												<h3><span class="text-info">Update successful...</span></h3>
												
											</div>
											<button type="button" id="update_account_btn" class="btn btn-primary">Update Account</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2" >
					<aside>
					</aside>
				</div>
			</div>
		</div> <!--- end of section -->
<?php include('footer.php'); ?>