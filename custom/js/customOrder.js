var manageCustomTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navCustom').addClass('active');

	manageCustomTable = $('#manageCustomOrdersTable').DataTable({
		ajax: 'php_action/fetchCustom.php',
		order: []
	});

	// on click on submit categories form modal
	$('#addCustomModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$('#submitCustomForm')[0].reset();
		// remove the error text
		$('.text-danger').remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$('#submitCustomForm').unbind('submit').bind('submit', function() {
			var productName = $('#productName').val();
			var quantity = $('#quantity').val();
			var amount = $('#amount').val();
			var paytype = $('#paymentType').val();

			if (productName == '') {
				$('#productName').after('<p class="text-danger">Product Name field is required</p>');
				$('#productName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#productName').find('.text-danger').remove();
				// success out for form
				$('#productName').closest('.form-group').addClass('has-success');
			}

			if (amount == '') {
				$('#amount').after('<p class="text-danger">Amount field is required</p>');
				$('#amount').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#amount').find('.text-danger').remove();
				// success out for form
				$('#amount').closest('.form-group').addClass('has-success');
			}

			if (paytype == '') {
				$('#paymentType').after('<p class="text-danger">Pay Type field is required</p>');
				$('#paymentType').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#paymentType').find('.text-danger').remove();
				// success out for form
				$('#paymentType').closest('.form-group').addClass('has-success');
			}
			if (quantity == '') {
				$('#quantity').after('<p class="text-danger">Quantity field is required</p>');
				$('#quantity').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#quantity').find('.text-danger').remove();
				// success out for form
				$('#quantity').closest('.form-group').addClass('has-success');
			}

			if (productName && quantity && amount && paytype) {
				var form = $(this);
				// button loading
				$('#createCustomBtn').button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function(response) {
						// button loading
						$('#createCustomBtn').button('reset');

						if (response.success == true) {
							// reload the manage member table
							manageCustomTable.ajax.reload(null, false);

							// reset the form text
							$('#submitCustomForm')[0].reset();
							// remove the error text
							$('.text-danger').remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-custom-messages').html(
								'<div class="alert alert-success">' +
									'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
									'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
									response.messages +
									' <br /> <br /> <a type="button" onclick="printCustomeOrder(' +
									response.order_id +
									')" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print </a>' +
									'<a href="customOrders.php?o=manord" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Order </a>' +
									'</div>'
							);

							$('html, body, div.panel, div.pane-body').animate({ scrollTop: '0px' }, 100);
						} // if
					} // /success
				}); // /ajax
			} // if

			return false;
		}); // submit categories form function
	}); // /on click on submit categories form modal
}); // /document

// edit categories function
function editCustom(customId = null) {
	if (customId) {
		// remove the added categories id
		$('#editCustomId').remove();
		// reset the form text
		$('#editCustomForm')[0].reset();
		// reset the form text-error
		$('.text-danger').remove();
		// reset the form group errro
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$('#edit-custom-messages').html('');
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-custom-result').addClass('div-hide');
		//modal footer
		$('.editCustomFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCustom.php',
			type: 'post',
			data: { customId: customId },
			dataType: 'json',
			success: function(response) {
				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-custom-result').removeClass('div-hide');
				//modal footer
				$('.editCustomFooter').removeClass('div-hide');

				// set the categories name
				$('#editProductName').val(response.product_name);
				// set the categories status

				$('#editQuantity').val(response.quantity);
				// set the categories name
				$('#editAmount').val(response.amount);

				$('#editpaymentType').val(response.pay_type);
				// add the categories id
				$('.editCustomFooter').after(
					'<input type="hidden" name="editCustomId" id="editCustomId" value="' + response.order_id + '" />'
				);

				// submit of edit categories form
				$('#editCustomForm').unbind('submit').bind('submit', function() {
					var productName = $('#editProductName').val();
					var quantity = $('#editQuantity').val();
					var amount = $('#editAmount').val();
					var paytype = $('#editpaymentType').val();

					if (productName == '') {
						$('#editProductName').after('<p class="text-danger">Product Name field is required</p>');
						$('#editProductName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$('#editProductName').find('.text-danger').remove();
						// success out for form
						$('#editProductName').closest('.form-group').addClass('has-success');
					}
					if (quantity == '') {
						$('#editQuantity').after('<p class="text-danger">Quantity field is required</p>');
						$('#editQuantity').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$('#editQuantity').find('.text-danger').remove();
						// success out for form
						$('#editQuantity').closest('.form-group').addClass('has-success');
					}

					if (amount == '') {
						$('#editAmount').after('<p class="text-danger">Amount field is required</p>');
						$('#editAmount').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$('#editAmount').find('.text-danger').remove();
						// success out for form
						$('#editAmount').closest('.form-group').addClass('has-success');
					}

					if (paytype == '') {
						$('#editpaymentType').after('<p class="text-danger">Pay Type field is required</p>');
						$('#editpaymentType').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$('#editpaymentType').find('.text-danger').remove();
						// success out for form
						$('#editpaymentType').closest('.form-group').addClass('has-success');
					}

					if (productName && amount && paytype && quantity) {
						var form = $(this);
						// button loading
						$('#editCustomBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success: function(response) {
								// button loading
								$('#editCustomBtn').button('reset');

								if (response.success == true) {
									// reload the manage member table
									manageCustomTable.ajax.reload(null, false);

									// remove the error text
									$('.text-danger').remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

									$('#edit-custom-messages').html(
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

// remove categories function
function removeCustom(customId = null) {
	$.ajax({
		url: 'php_action/fetchSelectedCustom.php',
		type: 'post',
		data: { customId: customId },
		dataType: 'json',
		success: function(response) {
			// remove categories btn clicked to remove the categories function
			$('#removeCustomBtn').unbind('click').bind('click', function() {
				// remove categories btn
				$('#removeCustomBtn').button('loading');

				$.ajax({
					url: 'php_action/removeCustom.php',
					type: 'post',
					data: { customId: customId },
					dataType: 'json',
					success: function(response) {
						if (response.success == true) {
							// remove categories btn
							$('#removeCustomBtn').button('reset');
							// close the modal
							$('#removeCustomModal').modal('hide');
							// update the manage categories table
							manageCustomTable.ajax.reload(null, false);
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
							$('#removeCustomModal').modal('hide');

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
} // remove categories function

function printCustomeOrder(customId = null) {
	if (customId) {
		$.ajax({
			url: 'php_action/printCustomeOrder.php',
			type: 'post',
			data: { customId: customId },
			dataType: 'text',
			success: function(response) {
				var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Order Invoice</title>');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
			} // /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function
