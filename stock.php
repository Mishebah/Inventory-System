<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Stock</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addStockModalBtn" data-target="#addStockModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Stock </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageStockTable">
					<thead>
						<tr>							
							<th>Product</th>
              <th>Quantity</th>
							<th>Price</th>
              <th>Date</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->


			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<!-- add stock -->
<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitStockForm" action="php_action/createStock.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Stock</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-stock-messages"></div>

                <div class="form-group">
                    <label for="productName" class="col-sm-4 control-label">Product Name: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
                        </div>
                </div> <!-- /form-group-->	 
                <div class="form-group">
                    <label for="quantity" class="col-sm-4 control-label">Quantity: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="quantity" placeholder="No. of Items" name="quantity" autocomplete="off">
                        </div>
                </div> <!-- /form-group-->	
                <div class="form-group">
                    <label for="price" class="col-sm-4 control-label">Price: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="price" placeholder="Price" name="price" autocomplete="off">
                        </div>
                </div> <!-- /form-group-->	 
                <div class="form-group">
                    <label for="stockDate" class="col-sm-4 control-label">Date: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="stockDate" placeholder="Date" name="stockDate" autocomplete="off">
                        </div>
                </div> <!-- /form-group-->	
                      	    
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createStockBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->

<!-- remove Stock brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeStockModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Stock</h4>
      </div>
      <div class="modal-body">

      	<div class="removeStockMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeStockFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeStockBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove Product brand -->


<script src="custom/js/stock.js"></script>

<?php require_once 'includes/footer.php'; ?>