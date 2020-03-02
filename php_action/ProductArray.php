<?php


require_once 'core.php';

$productId =  $_POST['productId'];

$sql = "SELECT  product.product_id,
 		product.categories_id, product.product_name,product.quantity,categories.categories_id,categories.categories_name FROM product 
		INNER JOIN categories ON product.categories_id = categories.categories_id  
        WHERE product.status = 1  AND product.quantity > 0 AND product.categories_id = $productId";

//$sql = "SELECT sub_categories_id, sub_categories_name FROM sub_categories  WHERE categories_id = $productId ";
$result = $connect->query($sql);

$sucategories = array();



    while( $row = mysqli_fetch_array($result) ){
        $userid = $row[0];
        $name = $row[2];
        $sucategories[] = array("id" => $userid, "name" => $name);

}

$connect->close();
// encoding array to json format
echo json_encode($sucategories);




