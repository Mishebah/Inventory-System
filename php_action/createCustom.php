<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $type = $_POST['paymentType'];
    $date = date('Y-m-d');

    $sql = "INSERT INTO customorders (product_name,quantity, amount, pay_type,custom_status,createDate) 
	VALUES ('$productName','$quantity','$amount','$type',1,'$date')";

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
