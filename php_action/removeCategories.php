<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$categoriesId = $_POST['categoriesId'];

if($categoriesId) {
    $sql = "UPDATE category SET categories_status = 2 WHERE categories_id = {$categoriesId}";

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