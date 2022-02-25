<?php require_once 'includes/header.php';?>


<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb style">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">category</li>
        </ol>
        
        <div class="panel panel-default">
            <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> Manage categories</div>
            <div class="panel-body">
                <div class="remove-messages"></div>
                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-default margin" data-toggle="modal" data-target="#addCategoriesModal" id="addCategoriesModalBtn" onclick="addCategories()">
                        <i class="glyphicon glyphicon-plus-sign"></i> Add
                        categories</button>
                </div>
                <table class="table" id="manageCategoriesTable">
                    <thead>
                        <tr>
                            <th>categories Name</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addCategoriesModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Add categories</h4>
            </div>

            <form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCategories.php"
                method="POST">

                <div class="modal-body">
                    <div id="add-categories-messages"></div>
                    <div class="form-group">
                        <label for="categoriesName" class="col-sm-4 control-label">Categories Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="categoriesName" name="categoriesName"
                                placeholder="categories name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoriesStatus" class="col-sm-4 control-label">Status :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="categoriesStatus" name="categoriesStatus">
                                <option value="">~~SELECT~~</option>
                                <option value="1">Available</option>
                                <option value="2">Not Available</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="loading...">Save changes</button>
                </div>

            </form>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editCategoriesModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> edit category</h4>
            </div>
            <form class="form-horizontal" id="editCategoriesForm" action="php_action/editCategories.php" method="POST">
            <div class="modal-body">
            <div id="edit-categories-messages"></div>
                    <div class="form-group">
                        <label for="editCategoriesName" class="col-sm-4 control-label">Categories Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="editCategoriesName" name="editCategoriesName" placeholder="categories name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editCategoriesStatus" class="col-sm-4 control-label">Status :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
                                <option value="">~~SELECT~~</option>
                                <option value="1">Available</option>
                                <option value="2">Not Available</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer editCategoriesFooter" >
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
           </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>Remove category</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to remove</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="removeCategoriesBtn">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" src="custom/js/categories.js"></script>

<?php require_once 'includes/footer.php'; ?>