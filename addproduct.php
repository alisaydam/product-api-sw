<?php
echo "It works";
 
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: *");
header("Content-Type: appication/json");
header("Access-Control-Allow-Methods: POST");
header("Acces-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-Width");
echo "It works";

include_once "config/Database.php";
include_once "models/Furniture.php";
include_once "models/Book.php";
include_once "models/Disc.php";
// require "autoload.php";

//* Instantiate DB
$database = new Database();
$db = $database->connect();


$data = json_decode(file_get_contents("php://input"));

echo  json_encode(
    array(($data))
);

if ($data->productType === "Book") {
    //* Create book
    $book = new Book($db);
    $book->setSKU($data->SKU);
    $book->setName($data->name);
    $book->setPrice($data->price);
    $book->setWeight($data->weight);

    if ($book->create()) {
        echo json_encode(
            array("Message" => "Book Created")
        );
    } else {
        echo json_encode(
            array("Message" => "Book not created")
        );
    }
}
if ($data->productType === "DVD") {
    $disc = new Disc($db);
    $disc->setSKU($data->SKU);
    $disc->setName($data->name);
    $disc->setPrice($data->price);
    $disc->setSize($data->size);

    if ($disc->create()) {
        echo json_encode(
            array("Message" => "disc Created")
        );
    } else {
        echo json_encode(
            array("Message" => "disc not created")
        );
    }
}
if ($data->productType === "Furniture") {
    $furniture = new Furniture($db);
    $furniture->setSKU($data->SKU);
    $furniture->setName($data->name);
    $furniture->setPrice($data->price);
    $furniture->setDimentions($data->dimentions);

    if ($furniture->create()) {
        echo json_encode(
            array("Message" => "furniture Created")
        );
    } else {
        echo json_encode(
            array("Message" => "furniture not created")
        );
    }
}
