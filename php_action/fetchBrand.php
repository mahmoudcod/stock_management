<?php


require_once 'core.php';

$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brand WHERE brand_status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        $brandId = $row[0];


        // active
        if($row[2] == 1){
             $activeBrands = "<label class='label label-success'>Available</label>";
        }else{
            $activeBrands = "<label class='label label-danger'>not available</label>";
        }
       
        $button = '<!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a type="button" data-toggle="modal" data-target="#editBrandModal" onclick="editBrands('.$brandId.')">
            <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
            <li><a type="button" data-toggle="modal" data-target="#removeBrandModal" onclick="removeBrands('.$brandId.')">
            <i class="glyphicon glyphicon-trash"></i>remove</a></li>
          </ul>
        </div>';
        $output['data'][] = array(
            $row[1],
            $activeBrands,
            $button
        );
    }
    
}
$connect->close();
echo json_encode($output);