<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$userName = $_POST['username'];
	$userEmail = $_POST['email'];
	$password = $_POST['password'];
  


	$sql = "INSERT INTO users (	username, email, password, active) 
	VALUES ('$userName', '$userEmail', '$password', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST