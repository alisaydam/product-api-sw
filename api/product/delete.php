<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

include_once '../../config/Database.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate the product object
$product = new Product($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Get IDs of products to be deleted
$product->setProducts($data->products);

// Delete the products
if ($product->delete()) {
    echo json_encode(
        array('message' => 'Products deleted')
    );
} else {
    echo json_encode(
        array('message' => 'Products not deleted')
    );
}
