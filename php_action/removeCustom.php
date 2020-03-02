<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$customId = $_POST['customId'];

if($customId) {

    $sql = "UPDATE customorders SET custom_status = 2 WHERE order_id = {$customId}";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Removed";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while remove the brand";
    }

    $connect->close();

    echo json_encode($valid);

} // /if $_POST
