<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Origin: *');
header("Content-Type: appication/json"); 
header("Acces-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-Width");

include_once "../../config/Database.php";
include_once "../../models/Furniture.php";
include_once "../../models/Book.php";
include_once "../../models/Disc.php";
// require "autoload.php";

//* Instantiate DB  
$database = new Database();
$db = $database->connect();


$data = json_decode(file_get_contents("php://input"));



if ($data->productType === "Book") {
    //* Create book
    $book = new Book($db);
    $book->setSKU($data->SKU);
    $book->setName($data->name);
    $book->setPrice($data->price);
    $book->setWeight($data->attribute);
    $book->setProductType($data->productType);

    if ($book->create()) {
        echo json_encode(
            array("success" => true, "mesage" => "book created")
        );
    } else {
        echo json_encode(
            array("success" => false, "mesage" => "furniture not created")
        );
    }
}

if ($data->productType === "DVD") {

    //* Create Disc
    $disc = new Disc($db);
    $disc->setSKU($data->SKU);
    $disc->setName($data->name);
    $disc->setPrice($data->price);
    $disc->setSize($data->attribute);
    $disc->setProductType($data->productType);

    if ($disc->create()) {
        echo json_encode(
            array("success" => true, "mesage" => "disc created")
        );
    } else {
        echo json_encode(
            array("success" => false, "mesage" => "disc not created")
        );
    }
}
if ($data->productType === "Furniture") {

    //* Create Furniture
    $furniture = new Furniture($db);
    $furniture->setSKU($data->SKU);
    $furniture->setName($data->name);
    $furniture->setPrice($data->price);
    $furniture->setDimentions($data->attribute);
    $furniture->setProductType($data->productType);

    if ($furniture->create()) {
        echo json_encode(
            array("success" => true, "mesage" => "furniture created")
        );
    } else {
        echo json_encode(
            array("success" => false, "mesage" => "furniture not created")
        );
    }
}
