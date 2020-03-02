var manageUserTable;

$(document).ready(function() {
	// main menu
	$('#navSetting').addClass('active');
	// sub manin
	$('#topNavUser').addClass('active');

	manageUserTable = $('#manageUserTable').DataTable({
		ajax: 'php_action/fetchUser.php',
		order: []
	}); // manage categories Data Table

	// on click on submit categories form modal
	$('#addUserModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$('#submitUserForm')[0].reset();
		// remove the error text
		$('.text-danger').remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit user form function
		$('#submitUserForm').unbind('submit').bind('submit', function() {
			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password').val();

			if (username == '') {
				$('#username').after('<p class="text-danger">User Name is required</p>');
				$('#username').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#username').find('.text-danger').remove();
				// success out for form
				$('#username').closest('.form-group').addClass('has-success');
			}

			if (email == '') {
				$('#email').after('<p class="text-danger">Email field is required</p>');
				$('#email').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#email').find('.text-danger').remove();
				// success out for form
				$('#email').closest('.form-group').addClass('has-success');
			}

			if (password == '') {
				$('#password').after('<p class="text-danger">Password field is required</p>');
				$('#password').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#password').find('.text-danger').remove();
				// success out for form
				$('#password').closest('.form-group').addClass('has-success');
			}

			if (confirmPassword == '') {
				$('#confirmPassword').after('<p class="text-danger">Confirm Password field is required</p>');
				$('#confirmPassword').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#confirmPassword').find('.text-danger').remove();
				// success out for form
				$('#confirmPassword').closest('.form-group').addClass('has-success');
			}

			if (username && email && password && confirmPassword) {
				var form = $(this);
				// button loading
				$('#createUserBtn').button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function(response) {
						// button loading
						$('#createUserBtn').button('reset');

						if (response.success == true) {
							// reload the manage member table
							manageUserTable.ajax.reload(null, false);

							// reset the form text
							$('#submitUserForm')[0].reset();
							// remove the error text
							$('.text-danger').remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-User-messages').html(
								'<div class="alert alert-success">' +
									'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
									'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
									response.messages +
									'</div>'
							);

							$('.alert-success').delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						} // if
					} // /success
				}); // /ajax
			} // if

			return false;
		}); // submit categories form function
	}); // /on click on submit categories form modal
}); // /document

// edit User function
function editUser(userid = null) {
	if (userid) {
		// remove the added categories id
		$('#editUserId').remove();
		// reset the form text
		$('#editUserForm')[0].reset();
		// reset the form text-error
		$('.text-danger').remove();
		// reset the form group errro
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$('#edit-user-messages').html('');
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-categories-result').addClass('div-hide');
		//modal footer
		$('.editCategoriesFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedUser.php',
			type: 'post',
			data: { userid: userid },
			dataType: 'json',
			success: function(response) {
				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-categories-result').removeClass('div-hide');
				//modal footer
				$('.editCategoriesFooter').removeClass('div-hide');

				// set the categories name
				$('#editUserName').val(response.username);
				// set the categories status
				$('#editEmail').val(response.email);
				// add the categories id
				$('.editCategoriesFooter').after(
					'<input type="hidden" name="editUserId" id="editUserId" value="' + response.user_id + '" />'
				);

				// submit of edit categories form
				$('#editUserForm').unbind('submit').bind('submit', function() {
					var username = $('#editUserName').val();
					var email = $('#editEmail').val();

					if (username == '') {
						$('#editUserName').after('<p class="text-danger">User Name field is required</p>');
						$('#editUserName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$('#editUserName').find('.text-danger').remove();
						// success out for form
						$('#editUserName').closest('.form-group').addClass('has-success');
					}

					if (email == '') {
						$('#editEmail').after('<p class="text-danger">Email field is required</p>');
						$('#editEmail').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$('#editEmail').find('.text-danger').remove();
						// success out for form
						$('#editEmail').closest('.form-group').addClass('has-success');
					}

					if (username && email) {
						var form = $(this);
						// button loading
						$('#userid').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success: function(response) {
								// button loading
								$('#editUserBtn').button('reset');

								if (response.success == true) {
									// reload the manage member table
									manageUserTable.ajax.reload(null, false);

									// remove the error text
									$('.text-danger').remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

									$('#edit-user-messages').html(
										'<div class="alert alert-success">' +
											'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
											'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
											response.messages +
											'</div>'
									);

									$('.alert-success').delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // if
							} // /success
						}); // /ajax
					} // if

					return false;
				}); // /submit of edit categories form
			} // /success
		}); // /fetch the selected categories data
	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit categories function

function changePassword(userid = null) {
	if (userid) {
		$.ajax({
			url: 'php_action/fetchSelectedUser.php',
			type: 'post',
			data: { userid: userid },
			dataType: 'json',
			success: function(response) {
				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-categories-result').removeClass('div-hide');
				//modal footer
				$('.editPasswordFooter').removeClass('div-hide');

				$('.editPasswordFooter').after(
					'<input type="hidden" name="editPasswordId" id="editPasswordId" value="' + response.user_id + '" />'
				);

				$('#changePasswordForm').unbind('submit').bind('submit', function() {
					var form = $(this);

					$('.text-danger').remove();

					var currentPassword = $('#currentPassword').val();
					var newPassword = $('#newPassword').val();
					var newConfirmPassword = $('#newConfirmPassword').val();

					if (currentPassword == '' || newPassword == '' || confirmPassword == '') {
						if (currentPassword == '') {
							$('#currentPassword').after(
								'<p class="text-danger">The Current Password field is required</p>'
							);
							$('#currentPassword').closest('.form-group').addClass('has-error');
						} else {
							$('#currentPassword').closest('.form-group').removeClass('has-error');
							$('.text-danger').remove();
						}

						if (newPassword == '') {
							$('#newPassword').after('<p class="text-danger">The New Password field is required</p>');
							$('#newPassword').closest('.form-group').addClass('has-error');
						} else {
							$('#newPassword').closest('.form-group').removeClass('has-error');
							$('.text-danger').remove();
						}

						if (newConfirmPassword == '') {
							$('#newConfirmPassword').after(
								'<p class="text-danger">The confirm Password field is required</p>'
							);
							$('#newConfirmPassword').closest('.form-group').addClass('has-error');
						} else {
							$('#newConfirmPassword').closest('.form-group').removeClass('has-error');
							$('.text-danger').remove();
						}
					} else {
						var form = $(this);
						// button loading

						$('#userid').button('loading');

						$('.form-group').removeClass('has-error');
						$('.text-danger').remove();

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success: function(response) {
								$('#editPasswordBtn').button('reset');
								console.log(response);
								if (response.success == true) {
									$('.changePasswordMessages1').html(
										'<div class="alert alert-success">' +
											'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
											'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
											response.messages +
											'</div>'
									);

									// remove the mesages
									$('.alert-success').delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} else {
									$('.changePasswordMessages1').html(
										'<div class="alert alert-warning">' +
											'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
											'<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> ' +
											response.messages +
											'</div>'
									);

									// remove the mesages
									$('.alert-warning').delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}
							} // /success function
						}); // /ajax function
					} // /else

					return false;
				});
			} // /success
		}); // /fetch the selected categories data
	} else {
		alert('no shiet is happening');
	}
} //

// remove user function
function removeUser(userid = null) {
	$.ajax({
		url: 'php_action/fetchSelectedUser.php',
		type: 'post',
		data: { userid: userid },
		dataType: 'json',
		success: function(response) {
			// remove categories btn clicked to remove the categories function
			$('#removeUserBtn').unbind('click').bind('click', function() {
				// remove categories btn
				$('#removeUserBtn').button('loading');

				$.ajax({
					url: 'php_action/removeUser.php',
					type: 'post',
					data: { userid: userid },
					dataType: 'json',
					success: function(response) {
						if (response.success == true) {
							// remove categories btn
							$('#removeUserBtn').button('reset');
							// close the modal
							$('#removeUserModal').modal('hide');
							// update the manage categories table
							manageUserTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html(
								'<div class="alert alert-success">' +
									'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
									'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
									response.messages +
									'</div>'
							);

							$('.alert-success').delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						} else {
							// close the modal
							$('#removeUserModal').modal('hide');

							// udpate the messages
							$('.remove-messages').html(
								'<div class="alert alert-success">' +
									'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
									'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
									response.messages +
									'</div>'
							);

							$('.alert-success').delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						} // /else
					} // /success function
				}); // /ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function
		} // /response
	}); // /ajax function to fetch the categories data
} // remove user function
