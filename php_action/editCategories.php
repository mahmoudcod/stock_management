<?php


require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
    
    $categoriesName = $_POST['editCategoriesName'];
    $categoriesStatus = $_POST['editCategoriesStatus'];
    $categoriesId = $_POST['editCategoriesId'];
    $sql = "UPDATE category SET categories_name = '$categoriesName', categories_active = '$categoriesStatus' WHERE categories_id = $categoriesId";
    
    if($connect->query($sql) === TRUE){
        $valid['success'] = true;
        $valid['messages'] = "Successfully Update";

    }else{
        $valid['success'] = false;
        $valid['messages'] = "Error while updating brand";

    }
}
    $connect->close();
    
    echo json_encode($valid);
    