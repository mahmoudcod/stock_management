<?php

require_once 'core.php';

$valid['success'] = array ('success' => false, 'messages' => array());

if($_POST) {
    $brandName = $_POST['brandName'];
    $brandStatus = $_POST['brandStatus'];

    $sql = "INSERT INTO brand (brand_name, brand_active, brand_status) VALUES ('$brandName', '$brandStatus', 1)";

    if($connect->query($sql) === TRUE) {

        $valid['success'] = true;
        $valid['messages'] = 'Successfully Added';

    }//IF CONNECT
else{
     
    $valid['success'] = false;
    $valid['messages'] = 'error while adding the brand';
} //else
$connect->close();
echo json_encode($valid);
}//if _post
