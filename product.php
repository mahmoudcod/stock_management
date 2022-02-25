<?php require_once 'includes/header.php';?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb style">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Product</li>
        </ol>
        
        <div class="panel panel-default">
            <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> Manage Product</div>
            <div class="panel-body">
                <div class="remove-messages"></div>
                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-default margin" data-toggle="modal" data-target="#addProductModal"
                        id="addProductModalBtn">
                        <i class="glyphicon glyphicon-plus-sign"></i> Add
                        product</button>
                </div>
                <table class="table" id="manageProductTable">
                    <thead>
                        <tr>
                            <th style="width:10%;">photo</th>
                            <th>Product Name</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addProductModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
            </div>

            <form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body" style="max-height:450px;overflow:auto;">
                    <div id="add-product-messages"></div>
                    <div class="form-group">
                        <label for="productImage" class="col-sm-4 control-label">Product Image</label>
                        <div class="col-sm-8">
                            <input id="productImage" name="productImage" type="file">
                        
                    </div>
                        </div>
                        <div class="form-group">
                            <label for="productName" class="col-sm-4 control-label">Product name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="productName" name="productName"
                                    placeholder="product name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-4 control-label">Quantity</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    placeholder="quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rate" class="col-sm-4 control-label">Rate</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rate" name="rate"
                                    placeholder="rate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandName" class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                               <select class="form-control" name="brandName" id="brandName">
                                   <option value="">~~select~~</option>
                                   <?php
                                   $sql = "SELECT brand_id, brand_name FROM brand WHERE brand_status = 1 AND brand_active = 1";
                                   $result = $connect->query($sql);
                                   while ($row = $result->fetch_array()) {
                                       echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                   }
                                   ?>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoriesName" class="col-sm-4 control-label">Category Name</label>
                            <div class="col-sm-8">
                            <select class="form-control" name="categoriesName" id="categoriesName">
                                   <option value="">~~select~~</option>
                                   <?php
                                   $sql = "SELECT categories_id, categories_name FROM category WHERE categories_status = 1 AND categories_active = 1";
                                   $result = $connect->query($sql);
                                   while ($row = $result->fetch_array()) {
                                       echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                   }
                                   ?>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productStatus" class="col-sm-4 control-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="productStatus" name="productStatus">
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">Available</option>
                                    <option value="2">Not Available</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="createProductBtn"
                            data-loading-text="loading...">Save changes</button>
                    </div>
                    
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editProductModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> edit product</h4>
            </div>
           
                <div class="modal-body" style="height:450px;overflow:auto;">

<div class="edit-product-messages"></div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">photo</a></li>
                    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Product info</a></li>
                 
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="photo">

                    </div>
                    <div role="tabpanel" class="tab-pane" id="productInfo">
                        <br>
                         <form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">
                    <div class="form-group">
                        <label for="editProductName" class="col-sm-4 control-label">product Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="editProductName" name="editProductName"
                                placeholder="product name" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="editQuantity" class="col-sm-4 control-label">Quantity</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editQuantity" name="editQuantity"
                                    placeholder="quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editRate" class="col-sm-4 control-label">Rate</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editRate" name="editRate"
                                    placeholder="rate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editBrandName" class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                               <select class="form-control" name="editBrandName" id="editBrandName">
                                   <option value="">~~select~~</option>
                                   <?php
                                   $sql = "SELECT brand_id, brand_name FROM brand WHERE brand_status = 1 AND brand_active = 1";
                                   $result = $connect->query($sql);
                                   while ($row = $result->fetch_array()) {
                                       echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                   }
                                   ?>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editCategoriesName" class="col-sm-4 control-label">Category Name</label>
                            <div class="col-sm-8">
                            <select class="form-control" name="editCategoriesName" id="editCategoriesName">
                                   <option value="">~~select~~</option>
                                   <?php
                                   $sql = "SELECT categories_id, categories_name FROM category WHERE categories_status = 1 AND categories_active = 1";
                                   $result = $connect->query($sql);
                                   while ($row = $result->fetch_array()) {
                                       echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                   }
                                   ?>
                               </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="editProductStatus" class="col-sm-4 control-label">Status :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="editProductStatus" name="editProductStatus">
                                <option value="">~~SELECT~~</option>
                                <option value="1">Available</option>
                                <option value="2">Not Available</option>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="modal-footer editProductFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
                    </div>
                    </div>
                    

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>Remove product</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to remove</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="removeProductBtn">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>