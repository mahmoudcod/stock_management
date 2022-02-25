<?php
 
 $localhost = "127.0.0.1";
 $username = "root";
 $password = "";
$dbname = "stock";


// db connection 
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error){
    die("connection field :"  . $connect->connection_error); 
}else{
    // echo "successfully connected";
}