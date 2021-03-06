<?php
require_once 'includes/header.php';
?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb style">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Brand</li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> Manage Brand</div>
            <div class="panel-body">
                <div class="remove-messages"></div>
                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-default margin" data-toggle="modal" data-target="#addBrandModal" onclick="addBrand()"> <i
                            class="glyphicon glyphicon-plus-sign"></i>Add Brand</button>
                </div>
                <!--action -->
                <table class="table" id="manageBrandTable">
                    <thead>
                        <tr>
                            <th>brand name</th>
                            <th>status</th>
                            <th style="width: 15%;">Options</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        
    </div> <!-- col-md-12  -->
</div> <!-- .   row -->
<div class="modal fade" tabindex="-1" role="dialog" id="addBrandModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i>Add Brand</h4>
            </div>
            <form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">

                <div class="modal-body">
                    <div id="add-brand-messages"></div>
                    <div class="form-group">
                        <label for="brandName" class="col-sm-3 control-label">Brand name :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="brandName" name="brandName"
                                placeholder="Brand Name" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="brandStatus" class="col-sm-3 control-label">status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="brandStatus" id="brandStatus">
                                <option value="">~~SELECT~~</option>
                                <option value="1">Available</option>
                                <option value="2">not Available</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="createBrandBtn"
                        data-loading-text="loading...">Save changes</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editBrandModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <i class="fa fa-plus" aria-hidden="true"></i> edit Brand</h4>
            </div>

      <form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
      
                <div class="modal-body">
  <div id="edit-brand-messages"></div>
                    <div class="form-group">
                        <label for="editBrandName" class="col-sm-3 control-label">Brand name :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editBrandName" name="editBrandName"
                                placeholder="editBrand Name" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editBrandStatus" class="col-sm-3 control-label">status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="editBrandStatus" id="editBrandStatus">
                                <option value="">~~SELECT~~</option>
                                <option value="1">Available</option>
                                <option value="2">not Available</option>
                            </select>
                        </div>
                    </div>
                </div>
        <div class="modal-footer editBrandFooter">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i>Save changes</button>
        </div>
     </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1"  role="dialog" id="removeBrandModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> remove</h4>
            </div>
            <div class="modal-body">
                <b>Do you relay want to remove ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                <button type="button" id="removeBrandBtn" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="custom/js/brand.js"></script>

<?php require_once 'includes/footer.php';?>