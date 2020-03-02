
<?php require_once 'includes/header.php';



?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">User</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Users</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

                <?php
                if ($USER !== 1)
                {
                    ?>
                    <div class="div-action pull pull-right" style="padding-bottom:20px;">
                        <button class="btn btn-default button1" data-toggle="modal" id="addUserModalBtn"  disabled="true" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add User </button>
                    </div> <!-- /div-action -->
                    <?php
                }
                else {
                    ?>
                    <div class="div-action pull pull-right" style="padding-bottom:20px;">
                        <button class="btn btn-default button1" data-toggle="modal" id="addUserModalBtn"
                                data-target="#addUserModal"><i class="glyphicon glyphicon-plus-sign"></i> Add
                            User
                        </button>
                    </div> <!-- /div-action -->
                    <?php
                }
                ?>
				
				<table class="table" id="manageUserTable">
					<thead>
						<tr>							
							<th>User Name</th>
							<th>Email Adress</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-User-messages"></div>

	        <div class="form-group">
	        	<label for="username" class="col-sm-4 control-label">UserName: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="username" placeholder="User Name" name="username" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

            <div class="form-group">
	        	<label for="email" class="col-sm-4 control-label">Email: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

            <div class="form-group">
	        	<label for="password" class="col-sm-4 control-label">Password: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

            <div class="form-group">
	        	<label for="confirmPassword" class="col-sm-4 control-label">Confirm Password: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	

    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add User -->


<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="changePasswordForm" action="php_action/changeUserPassword.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Change Password</h4>
	      </div>
	      <div class="modal-body">

		  <div class="changePasswordMessages1"></div>

			  <div class="form-group">
	        	<label for="currentPassword" class="col-sm-4 control-label">Current Password: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="password" class="form-control" id="currentPassword" placeholder="current Password" name="currentPassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->


            <div class="form-group">
	        	<label for="newPassword" class="col-sm-4 control-label">New Password: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="password" class="form-control" id="newPassword" placeholder="Password" name="newPassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

            <div class="form-group">
	        	<label for="newConfirmPassword" class="col-sm-4 control-label">Confirm Password: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="password" class="form-control" id="newConfirmPassword" placeholder="Confirm Password" name="newConfirmPassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        	         	        
	      </div> <!-- /modal-body -->
	      
		  <div class="modal-footer editPasswordFooter">
		 	 <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary"  id="editPasswordBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>				      
				</div> 
			</div>	 
			</div>
     	</form> <!-- /.form -->	

    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add User -->


<!-- edit User -->
<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">


        <?php
        if ($USER !== 1)
        {
            ?>

            <?php
        }
        else {
            ?>
           
            <?php
        }
        ?>
    	
    	<form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit User Details</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-user-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

					<div class="form-group">
						<label for="editUserName" class="col-sm-4 control-label">UserName: </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-7">
							<input type="text" class="form-control" id="editUserName" placeholder="User Name" name="editUserName" autocomplete="off">
							</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="editEmail" class="col-sm-4 control-label">Email: </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-7">
							<input type="text" class="form-control" id="editEmail" placeholder="Email" name="editEmail" autocomplete="off">
							</div>
					</div> <!-- /form-group-->
				
	      </div> <!-- /modal-body -->

	      <div class="modal-footer editCategoriesFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

	        <button type="submit" class="btn btn-success" id="editUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- remove User -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Brand</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeCategoriesFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeUserBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove user -->

<script src="custom/js/users.js"></script>

<?php require_once 'includes/footer.php'; ?>