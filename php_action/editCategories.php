<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
date_default_timezone_set('Africa/Nairobi');

if($_POST) {	

	$brandName = $_POST['editCategoriesName'];
  $brandStatus = $_POST['editCategoriesStatus']; 
  $categoriesId = $_POST['editCategoriesId'];
  $date = date('Y-m-d H:i:s');

$sql = "UPDATE categories SET categories_name = '$brandName', categories_active = '$brandStatus',
	updateDate = '$date'  WHERE categories_id = '$categoriesId'";

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