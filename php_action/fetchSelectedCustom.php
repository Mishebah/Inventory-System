<?php
require_once 'core.php';

$customId = $_POST['customId'];

$sql = "SELECT order_id, product_name, quantity, amount, pay_type FROM customorders WHERE order_id = $customId";
$result = $connect->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
