<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$userName = $_POST['editUserName'];
	$userEmail = $_POST['editEmail'];
	$userid = $_POST['editUserId'];

	$sql = "UPDATE users SET username = '$userName', email = '$userEmail' where user_id = '$userid'";

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
