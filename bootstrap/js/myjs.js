$(function() {
	
	var first_name = $( 'span#first_name' ).text(),
	    last_name  = $( 'span#last_name' ).text(),
		country    = $( 'span#country' ).text(),
		city       = $( 'span#city' ).text(),
		facebook   = $( 'span#facebook' ).text(),
		twitter    = $( 'span#twitter' ).text();
		

	$( '#update_btn' ).click(function() {
		$( this ).hide();
		$( '#confirm_btn' ).show();
	});
	
	$( '#cancel_btn' ).click(function() {	
		$( '#confirm_btn' ).hide();
		
		$( '#confirm_btn' ).document.getElementById( 'confirm_btn' ).style.display = "none";
		
		$( '#update_btn' ).show();
	});
	
	// This script will update the user information
	$( '#ok_btn' ).click(function() {
		$(this).attr('disabled','disabled');
		$('#update_info_progress').show();
		
		
		$.ajax({
			type : 'POST',
			url  : '../controller/user_update.php',
			data : {
				first_name : $('#first_name_edit').val(),
				last_name  : $('#last_name_edit').val(),
				country    : $('#country_edit').val(),
				city	   : $('#city_edit').val(),
				facebook   : $('#facebook_edit').val(),
				twitter    : $('#twitter_edit').val(),
			    id         : $('#user_id').text()
			},
			success: function(data) {
				$('#update_info_progress').hide();
				
				$('#my_modal').hide();
				alert(data);
				window.location.reload();
			}
		});
	});
	
	// Administrator script area
	var id = "";
		// edit user info
	$( '.edit_btn' ).click(function() {
		id = $( this ).attr('data-id');
		
		// get user account 
		 $.ajax({
			type : "POST",
			url  : '../controller/getUserAccount.php',
			dataType: 'json',
			data : {
				id : id
			},
			success: function( data ) {
					
				$( '#username' ).val( data.username );
				$( '#email' ).val( data.email );
				$( '#user_modal' ).modal();
			}
		}); 
		
	});
	
		// update user account
	
	$( '#update_account_btn' ).click(function() {
		
		var username = $( '#username' ).val();
		var email    = $( '#email' ).val();
		var pass1    = $( '#password' ).val();
		var pass2    = $( '#repeatpassword' ).val();
		
		if ( username != "" && email != "" && pass1 != "" && pass2 != "" ) {
			if ( pass1 == pass2 ) {
				// save new data
				if ( pass1.length > 5 && pass1.length < 9 ) { 
					$.ajax({
						type    : 'POST',
						url     : '../controller/account_update.php',
						data    : {
							id       : id,
							username : username,
							password : pass1,
							email    : email
						},
						success: function( data ) {
							
								$( '#user_new_password' ).text( pass1 );
								$( '#error' ).hide();
								$( '#update_success_message' ).show();
								
								var str = "New Password: " + pass1;
								alert(str);
								$('#user_modal').modal('toggle');
						}
					}); 
				} else {
					$( '#error' ).text( "Password must be 6-8 characters in length." );
				}
				
			} else {
				$( '#error' ).text( "Password not match." );
			}
		} else {
			$( '#error' ).text( "Please input all fields." );
		}
	});
	
	   // Delete user account.
	  
	$('.delete_btn').click(function() {
		var id = $( this ).attr('data-id');
		var row = '#tr_' + $(this).attr('id');
		
		var con = confirm("Are you sure to delete?");
		
		if (con) {
			$.ajax({
				type: 'POST',
				url : '../controller/account_delete.php',
				data : {
					id: id
				},
				success: function(data) {
					alert("User successfully deleted.");
					$(row).slideToggle();
				}
			});
		}
	});
	
	// end administrator script
	
	// search users //
	
	$( '#search' ).keyup(function() {
		var txt = $( this ).val();
	});
});