var manageStockTable;

$(document).ready(function() {
	// order date picker
	$('#stockDate').datepicker();

	// active top navbar Stock
	$('#navStock').addClass('active');

	//document.getElementById('wolololololololololo').innerHTML = 5 + 6;

	manageStockTable = $('#manageStockTable').DataTable({
		ajax: 'php_action/fetchStock.php',
		order: []
	}); // manage Stock Data Table

	// on click on submit stock form modal
	$('#addStockModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$('#submitStockForm')[0].reset();
		// remove the error text
		$('.text-danger').remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit Stock form function
		$('#submitStockForm').unbind('submit').bind('submit', function() {
			var productName = $('#productName').val();
			var Quantity = $('#quantity').val();
			var Price = $('#price').val();
			var stockDate = $('#stockDate').val();

			if (productName == '') {
				$('#productName').after('<p class="text-danger">Product Name field is required</p>');
				$('#productName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#productName').find('.text-danger').remove();
				// success out for form
				$('#productName').closest('.form-group').addClass('has-success');
			}

			if (Quantity == '') {
				$('#quantity').after('<p class="text-danger">Quantity field is required</p>');
				$('#quantity').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#quantity').find('.text-danger').remove();
				// success out for form
				$('#quantity').closest('.form-group').addClass('has-success');
			}
			if (Price == '') {
				$('#price').after('<p class="text-danger">Price Name field is required</p>');
				$('#price').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$('#price').find('.text-danger').remove();
				// success out for form
				$('#price').closest('.form-group').addClass('has-success');
			}
			if (stockDate == '') {
				$('#stockDate').after('<p class="text-danger"> The Date field is required </p>');
				$('#stockDate').closest('.form-group').addClass('has-error');
			} else {
				$('#stockDate').closest('.form-group').addClass('has-success');
			} // /else

			if (productName && Quantity && Price && stockDate) {
				var form = $(this);
				// button loading
				$('#createStockBtn').button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function(response) {
						// button loading
						$('#createStockBtn').button('reset');

						if (response.success == true) {
							// reload the manage member table
							manageStockTable.ajax.reload(null, false);

							// reset the form text
							$('#submitStockForm')[0].reset();
							// remove the error text
							$('.text-danger').remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-stock-messages').html(
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
});

// remove stock
function removeStock(stockId = null) {
	if (stockId) {
		// remove stock button clicked
		$('#removeStockBtn').unbind('click').bind('click', function() {
			// loading remove button
			$('#removeStockBtn').button('loading');
			$.ajax({
				url: 'php_action/removeStock.php',
				type: 'post',
				data: { stockId: stockId },
				dataType: 'json',
				success: function(response) {
					// loading remove button
					$('#removeStockBtn').button('reset');
					if (response.success == true) {
						// remove stock modal
						$('#removeStockModal').modal('hide');

						// update the stock table
						manageStockTable.ajax.reload(null, false);

						// remove success messages
						$('.remove-messages').html(
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
						// remove success messages
						$('.removeStockMessages').html(
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
					} // /error
				} // /success function
			}); // /ajax fucntion to remove the stock
			return false;
		}); // /remove stock btn clicked
	} // /if stock
} // /remove stock function
