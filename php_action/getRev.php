<?php

require_once 'core.php';


    $today = date('m/d/Y');
    $date = DateTime::createFromFormat('m/d/Y',$today);
    $today = $date->format("Y-m-d");

  //  echo $today;

    $sql = "SELECT * FROM orders WHERE order_date = '$today' and order_status = 1";
    $query = $connect->query($sql);

    $totalAmount = 0;
    while ($result = $query->fetch_assoc()) {

        $totalAmount += $result['grand_total'];
    }

echo $totalAmount;



?>
