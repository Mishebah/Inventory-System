<?php 	

require_once 'core.php';

$USER = (int)$_SESSION['userId'];

$sql = "SELECT order_id, order_date, client_name, client_contact,paid,updateDate, payment_status FROM orders WHERE order_status = 1  ORDER BY order_id DESC";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 

 

 while($row = $result->fetch_array()) {
	 $orderId = $row[0];
	 
	 $orderno = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// active 
 	if($row[6] == 1) {
 		$paymentStatus = "<label class='label label-success'>Full Payment</label>";
 	} else if($row[6] == 2) {
 		$paymentStatus = "<label class='label label-info'>Partial Payment</label>";
 	} else { 		
 		$paymentStatus = "<label class='label label-warning'>No Payment</label>";
 	} // /else


     if ($USER !== 1) {


         $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&i=' . $orderId . '" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder(' . $orderId . ')"> <i class="glyphicon glyphicon-save"></i> Payment</a></li>

	    <li><a type="button" onclick="printOrder(' . $orderId . ')"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	          
	  </ul>
	</div>';
     }
     else{

         $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&i=' . $orderId . '" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder(' . $orderId . ')"> <i class="glyphicon glyphicon-save"></i> Payment</a></li>

	    <li><a type="button" onclick="printOrder(' . $orderId . ')"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder(' . $orderId . ')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

	 }
	 
		$code = "STSO";
 
 		$ordernumber = "$code".(string)$orderno;

 	$output['data'][] = array( 		
 		// image
 		$ordernumber,
 		// order date
 		$row[1],
 		// client name
 		$row[2], 
 		// client contact
 		$row[3],
        $row[4],
        $row[5],
        //$itemCountRow,
 		$paymentStatus,
 		// button
 		$button 		
 		); 	
 
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);