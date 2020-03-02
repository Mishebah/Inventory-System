<?php require_once 'includes/header.php';

$USER = (int)$_SESSION['userId'];
?>


    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb">
                <li><a href="dashboard.php">Home</a></li>
                <li class="active">Custom Orders</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Custom Orders</div>
                </div> <!-- /panel-heading -->
                <div class="panel-body">

                    <div class="remove-messages"></div>

                    <div class="div-action pull pull-right" style="padding-bottom:20px;">
                            <button class="btn btn-default button1" data-toggle="modal" id="addCustomModalBtn"
                                    data-target="#addCustomModal"><i class="glyphicon glyphicon-plus-sign"></i> Add Order
                            </button>
                        </div> <!-- /div-action -->



                    <table class="table" id="manageCustomOrdersTable">
                        <thead>
                        <tr>
                        <th>Order No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                        </thead>
                    </table>
                    <!-- /table -->

                </div> <!-- /panel-body -->
            </div> <!-- /panel -->
        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->


    <!-- add order -->
    <div class="modal fade" id="addCustomModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="form-horizontal" id="submitCustomForm" action="php_action/createCustom.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Order</h4>
                    </div>
                    <div class="modal-body">

                        <div id="add-custom-messages"></div>


                        <div class="form-group">
                            <label for="product" class="col-sm-4 control-label"> Product Name:</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <select class="form-control" name="productName" id="productName">
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">Milk</option>
                                    <option value="2">Oil</option>
                                </select>
                            </div>
                        </div> <!--/form-group-->

                        <div class="form-group">
                            <label for="quantity" class="col-sm-4 control-label">Quantity: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="quantity" placeholder=" Quantity preferably in litres" name="quantity" autocomplete="off">
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="amount" class="col-sm-4 control-label">Cost: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="amount" placeholder=" Amount" name="amount" autocomplete="off">
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="paymentType" class="col-sm-4 control-label">Payment Type</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7">
                                <select class="form-control" name="paymentType" id="paymentType">
                                    
                                    <option value="1">Cash</option>
                                    <option value="2">Lipa Na Mpesa</option>
                                </select>
                            </div>
                        </div> <!--/form-group-->
                    </div> <!-- /modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                        <button type="submit" class="btn btn-primary" id="createCustomBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                    </div> <!-- /modal-footer -->
                </form> <!-- /.form -->
            </div> <!-- /modal-content -->
        </div> <!-- /modal-dailog -->
    </div>
    <!-- /add categories -->

    <!-- edit categories brand -->
    <div class="modal fade" id="editCustomModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">




                <form class="form-horizontal" id="editCustomForm" action="php_action/editCustom.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Order</h4>
                    </div>
                    <div class="modal-body">

                        <div id="edit-custom-messages"></div>

                        <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Loading...</span>
                        </div>

                        <div class="edit-custom-result">
                            <div class="form-group">
                                <label for="editProductName" class="col-sm-4 control-label">Product Name: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7">


                                    <select class="form-control" id="editProductName" name="editProductName">
                                        <option value="">~~SELECT~~</option>
                                        <option value="1">Milk</option>
                                        <option value="2">Oil</option>
                                    </select>

                                     </div>
                            </div> <!-- /form-group-->

                            <div class="form-group">
                                <label for="editQuantity" class="col-sm-4 control-label">Quantity: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="editQuantity" placeholder=" Quantity preferably in litres" name="editQuantity" autocomplete="off">
                                </div>
                            </div> <!-- /form-group-->


                            <div class="form-group">
                                <label for="editAmount" class="col-sm-4 control-label">Cost: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="editAmount" placeholder="Amount" name="editAmount" autocomplete="off">
                                </div>
                            </div> <!-- /form-group-->



                            <div class="form-group">
                                <label for="editpaymentType" class="col-sm-4 control-label">Payment Type: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="editpaymentType" name="editpaymentType">
                                        <option value="">~~SELECT~~</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Lina na Mpesa</option>
                                    </select>
                                </div>
                            </div> <!-- /form-group-->
                        </div>
                        <!-- /edit brand result -->

                    </div> <!-- /modal-body -->

                    <div class="modal-footer editCustomFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                        <button type="submit" class="btn btn-success" id="editCustomBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
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


    <!-- categories brand -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeCustomModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Order</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to remove ?</p>
                </div>
                <div class="modal-footer removeCustomFooter">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="button" class="btn btn-primary" id="removeCustomBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /categories brand -->


    <script src="custom/js/customOrder.js"></script>

<?php require_once 'includes/footer.php'; ?>