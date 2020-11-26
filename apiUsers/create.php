<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
  
// database connection will be here
// include database and object files
include_once 'database.php';
include_once 'product.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$product->btcdatetime = $data->btcdatetime;
$product->price = $data->price;
$product->volume = $data->volume;
//$product->create();
if($product->create()){
    echo json_encode(
        array("message" => "post created")
    );
}else{
    echo json_encode(
        array("message" => "post not created")
    );
}