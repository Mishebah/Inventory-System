<?php 	

require_once 'core.php';

$sql = "SELECT stock_id,product_name, quantity, price, stock_date FROM stock WHERE 	active = 1  ORDER BY stock_id DESC";
$result = $connect->query($sql);


$output = array('data' => array());

if($result->num_rows > 0) { 

  //$row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {

    $stockId = $row[0];

    $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#removeStockModal" id="removeStockModalBtn" onclick="removeStock('.$stockId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';
 

    $productName = $row[1];
    $Quantity = $row[2];
    $Price = $row[3];
    $Date = $row[4];
    
    $output['data'][] = array( 		
        // product name
        $productName,
        // quantity 		
        $Quantity, 
        // price
        $Price,
        // date
        $Date,
        //button
        $button 		
        ); 
    }

    // print_r($output);
    // die();
       
}// if num_rows

$connect->close();
echo json_encode($output);