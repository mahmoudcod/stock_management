<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];

if($productId) {
    $sql = "UPDATE product SET active = 2, status = 2 WHERE product_id = {$productId}";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "successfully Remove";
    }else{
        $valid['success'] = false;
        $valid['messages'] = "error while removing the product";
    }
    $connect->close();
  echo json_encode($valid);

}