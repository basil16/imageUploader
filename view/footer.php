<!-- start of footer -->
		<footer class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Start of modal -->
					
					<!--
					This modal is used for editing user information.
					-->
					<div id="my_modal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Content -->
							<div class="modal-content">
								<!-- HEADER -->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"> &times; </button>
									<h5 class="text-left">Edit information</h5>
									<div id="update_info_progress" class="progress" style="display: none;">
										<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width: 100%;">
											<span>Updating...</span>
										</div>
									</div>
								</div>
								<!-- BODY -->
								<div class="modal-body" style="padding: 50px 100px; background-color: #eee;">
									<div class="form-group text-left">
										<label for="first_name_edit">First Name</label>
										<input type="text" id="first_name_edit" value="<?php echo $user['first_name']; ?>" class="form-control" name="first_name_edit">
									</div>
									<div class="form-group text-left">
										<label for="last_name_edit">Last Name</label>
										<input type="text" id="last_name_edit" value="<?php echo $user['last_name']; ?>" class="form-control" name="last_name_edit">
									</div>
									<div class="form-group text-left">
										<label for="country_edit">Country</label>
										<input type="text" id="country_edit" value="<?php echo $user['country']; ?>" class="form-control" name="country_edit">
									</div>
									<div class="form-group text-left">
										<label for="city_edit">City</label>
										<input type="text" id="city_edit" value="<?php echo $user['city']; ?>" class="form-control" name="city_edit">
									</div>
									<div class="form-group text-left">
										<label for="facebook_edit">Facebook</label>
										<input type="text" id="facebook_edit" value="<?php echo $user['facebook']; ?>" class="form-control" name="facebbok_edit">
									</div>
									<div class="form-group text-left">
										<label for="twitter_edit">Twitter</label>
										<input type="text" id="twitter_edit" value="<?php echo $user['twitter']; ?>" class="form-control" name="twitter_edit">
									</div>
								</div>
								<!-- Footer  -->
								<div class="modal-footer">
									<div class="text-center">
										<button id="update_btn" class="btn btn-primary">Update Information</button>
										<div id="confirm_btn" style="display: none;">
											<p>Are you sure to update? 
											<button class="btn btn-danger" id="ok_btn">OK</button>
											<span style="margin-left: 20px;color: gray;">|</span>
											<button type="button" class="btn btn-link" data-dismiss="modal" id="cancel_btn"> Cancel</button></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End of modal -->
					
				</div>
			</div>
		</footer> 
		<!-- end of footer -->
		
		<script src="../bootstrap/js/myjs.js"></script>	
	</body>
</html>