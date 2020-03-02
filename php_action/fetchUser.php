<?php


require_once 'core.php';

$USER = (int)$_SESSION['userId'];

$sql = "SELECT * FROM users WHERE user_id != 1 AND active = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 


 while($row = $result->fetch_array()) {
 	$userid = $row[0];
 
                if ($USER !== 1)
                {
                    $button = '<!-- Single button -->
			<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Action <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
					<li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editUser('.$userid.')"> <i class="glyphicon glyphicon-edit"></i> Edit User</a></li>
					<li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#changePasswordModal" onclick="changePassword('.$userid.')"> <i class="glyphicon glyphicon-edit"></i> Change Password</a></li>
					<li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeCategoriesModalBtn" onclick="removeUser('.$userid.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
				  </ul>
				  </div>';    }
                else{
                    $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
		<li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editUser('.$userid.')"> <i class="glyphicon glyphicon-edit"></i> Edit User</a></li>
		<li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#changePasswordModal" onclick="changePassword('.$userid.')"> <i class="glyphicon glyphicon-edit"></i> Change Password</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeCategoriesModalBtn" onclick="removeUser('.$userid.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

                }
 	$output['data'][] = array( 		
 		$row[1], 		
 		$row[3],
 		$button 		
 		); 	
 } // /while 

}// if num_rows


$connect->close();

echo json_encode($output);