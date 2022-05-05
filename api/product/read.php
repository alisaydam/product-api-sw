<?php

header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");
header("Content-Type: appication/json");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Acces-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-Width");

include_once "../../config/Database.php";
include_once "../../abstracts/Base.php";
include_once "../../models/Product.php";
// require "autoload.php";

$database = new Database();
$db = $database->connect();

// Instantiate products object
$product = new Product($db);

// Products read query
$result = $product->readAll();

// Get row count
$num = $result->rowCount();

// Check if there is any products
if ($num > 0) {
    // Products array
    $product_arr = array();
    $product_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $product_item = array(
            'id' => $id,
            'SKU' => $SKU,
            'name' => $name,
            'price' => $price,
            'productType' => $productType,
            'weight' => $weight,
            'size' => $size,
            'dimentions' => $dimentions,
        );

        // Push to "data"
        array_push($product_arr['data'], $product_item);
    }

    // Turn to JSON & output
    echo json_encode($product_arr);
} else {
    // No Products
    echo json_encode(
        array('message' => 'No Products Found')
    );
}
