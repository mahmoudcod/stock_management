<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $brandName = $_POST['brandName'];
    $categoryName = $_POST['categoriesName'];
    $productStatus = $_POST['productStatus'];
    // for product image
    $type = explode('.', $_FILES['productImage']['name']);
    $type = $type[count($type) - 1];
    $url = '../assets/images/stock/' .uniqid(rand()).'.'.$type;
if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
    if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {
        if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
            // insert into the database
            $sql = "INSERT INTO  (product_name, product_image, brand_id, categories_id, quantity, rate, active, status) VALUES ('$productName', '$url', $brandName, $categoryName, $quantity, $rate, $productStatus 1)";

    if($connect->query($sql) === TRUE){
        $valid['success'] = true;
        $valid['messages'] = 'Successfully Added';
    }else{
        $valid['success'] = false;
        $valid['messages'] = 'Error while added';
    }//else connect to data
    }else{
        return false;
    }
}
}
$connect->close();
echo json_encode($valid);
}