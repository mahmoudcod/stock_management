
<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$brandId = $_POST['brandId'];

if($brandId) {
    $sql = "UPDATE brand SET brand_status = 2 WHERE brand_id = {$brandId}";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "successfully Remove";
    }else{
        $valid['success'] = false;
        $valid['messages'] = "error while removing the brand";
    }
    $connect->close();
  echo json_encode($valid);

}
