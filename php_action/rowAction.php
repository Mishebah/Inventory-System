<?php

require_once 'core.php';


$sql = "SELECT categories.categories_id,categories.categories_name,categories.categories_active ,categories.categories_status  FROM categories WHERE categories_active = 1 AND categories_status = 1";

$result = $connect->query($sql);

$data = $result->fetch_all();


$connect->close();

echo json_encode($data);


