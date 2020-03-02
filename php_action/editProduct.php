<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
date_default_timezone_set('Africa/Nairobi');

if($_POST) {
	$productId = $_POST['productId'];
	$productName 		= $_POST['editProductName']; 
  $quantity 			= $_POST['editQuantity'];
  $rate 					= $_POST['editRate'];
  $price 			= $_POST['editOrigal'];
  $categoryName 	= $_POST['editCategoryName'];
  $productStatus 	= $_POST['editProductStatus'];
 $date = date('Y-m-d H:i:s');
				
	$sql = "UPDATE product SET product_name = '$productName', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate',originalPrice = '$price', active = '$productStatus',updateDate = '$date', status = 1 WHERE product_id = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
