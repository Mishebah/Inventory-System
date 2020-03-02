<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$stockId = $_POST['stockId'];

if($stockId) { 

 $sql = "UPDATE stock SET active = 2 WHERE stock_id = {$stockId}";

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