 <?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
    $categoryName 	= $_POST['categoryName'];
    $productName 		= $_POST['productName'];
    $quantity 			= $_POST['quantity'];
	 $price 			= $_POST['original'];
    $rate 					= $_POST['rate'];
    $productStatus 	= $_POST['productStatus'];


				$sql = "INSERT INTO product (categories_id, product_name, quantity,originalPrice,rate, active, status) 
				VALUES ('$categoryName','$productName', '$quantity','$price', '$rate', '$productStatus', 1)";

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