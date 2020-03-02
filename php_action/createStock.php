<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productName    = $_POST['productName'];
	$quantity       = $_POST['quantity'];
	$price 	        = $_POST['price'];
	$stockDate 		=  date('Y-m-d', strtotime($_POST['stockDate']));	

				
	$sql = "INSERT INTO stock (product_name, quantity, price, stock_date, active) 
			VALUES ('$productName', '$quantity', '$price', '$stockDate',1)";

		if($connect->query($sql) === TRUE) {
				$valid['success'] = true;
				$valid['messages'] = "Successfully Added";	
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error while adding the members";
			}


	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST