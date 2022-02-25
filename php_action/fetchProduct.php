<?php

require_once 'core.php';
$sql = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id, product.categories_id,
product.quantity, product.rate, product.active, product.status, brand.brand_name, category.categories_name FROM product
 INNER JOIN brand ON product.brand_id = brand.brand_id
 INNER JOIN category ON product.categories_id= category.categories_id
 WHERE product.status = 1";

 $result = $connect->query($sql);

 $output = array('data' => array());
 if($result->num_rows > 0) {
     $active = "";

     while($row = $result->fetch_array()) {
         $productId = $row[0];
         if($row[7] == 1) {
             $active = "<label class='label label-success'>available</label>";
             
         }else{
            $active = "<label class='label label-danger'>ont available</label>";
         }
         $button = '<!-- Single button -->
         <div class="btn-group">
           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Action <span class="caret"></span>
           </button>
           <ul class="dropdown-menu">
             <li><a type="button" data-toggle="modal" data-target="#editProductModal" onclick="editProduct"('.$productId.')>
             <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
             <li><a type="button" data-toggle="modal" data-target="#removeProductModal" onclick="removeProduct('.$productId.')">
             <i class="glyphicon glyphicon-trash"></i>remove</a></li>
           </ul>
         </div>';

         $brand = $row[9];
         $category = $row[10];
         $imageUrl = substr($row[2], 3);
         $productImage = "<img class='img-round' src='".$imageUrl."' style='height:30px;width:50px;' />";

         $output['data'][] = array(
             $productImage,
             $row[1],
             $row[6],
             $row[5],
             $brand,
             $category,
             $active,
             $button,

         );

     }
 }
 $connect->close();

 echo json_encode($output);