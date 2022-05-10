<?php
header('Access-Control-Allow-Origin: https://alisaydam.github.io/');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

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
