<?php


require_once 'core.php';

$USER = (int)$_SESSION['userId'];

$sql = "SELECT order_id, product_name, quantity, amount,pay_type,createDate,updateDate FROM customorders WHERE custom_status = 1 ORDER BY order_id DESC";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

    // $row = $result->fetch_array();
    $activeCustom = "";

    while($row = $result->fetch_array()) {
      
        $customId = $row[0];
        $orderno = $row[0];

        $code = "STSOM";
 
        $ordernumber = "$code".(string)$orderno;
        // active
        if($row[1] == 1) {
            // activate member
            $activeCustom = "<label class=''>Milk</label>";
        } elseif($row[1] == 2) {
            // deactivate member
            $activeCustom = "<label class=''>Oil</label>";
        }
        else{
            $activeCustom = "<label class=''>Error</label>";
        }
        if ($USER !== 1)
        {
            $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" disabled="true" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
    <ul class="dropdown-menu">
      <li><a type="button" onclick="printCustomeOrder(' . $customId . ')"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    <li><a type="button" data-toggle="modal" id="editCustomModalBtn" data-target="#editCustomModal" onclick="editCustom('.$customId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCustomModal" id="removeCustomModalBtn" onclick="removeCustom('.$customId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
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
      <li><a type="button" onclick="printCustomeOrder(' . $customId . ')"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    <li><a type="button" data-toggle="modal" id="editCustomModalBtn" data-target="#editCustomModal" onclick="editCustom('.$customId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
      <li><a type="button" data-toggle="modal" data-target="#removeCustomModal" id="removeCustomModalBtn" onclick="removeCustom('.$customId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>      
	  </ul>
	</div>';

        }
        $output['data'][] = array(
            $ordernumber,
            $activeCustom,
            $row[2],
            $row[3],
            $row[5],
            $row[6],
            $button
        );
    } // /while

}// if num_rows

$connect->close();

echo json_encode($output);