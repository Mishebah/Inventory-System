<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
date_default_timezone_set('Africa/Nairobi');

if($_POST) {

    $productName = $_POST['editProductName'];
    $quantity = $_POST['editQuantity'];
    $amount = $_POST['editAmount'];
    $type = $_POST['editpaymentType'];
    $customId = $_POST['editCustomId'];
    $date = date('Y-m-d H:i:s');

    $sql = "UPDATE customorders SET product_name = '$productName', quantity = '$quantity' , amount = '$amount',pay_type = '$type',  updateDate = '$date' WHERE order_id = '$customId'";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Updated";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while updating the categories";
    }

    $connect->close();

    echo json_encode($valid);

} // /if $_POST