<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: appication/json");
header("Access-Control-Allow-Methods: POST");
header("Acces-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-Width");

include_once "config/Database.php";
include_once "models/Book.php";
// require "autoload.php";

//* Instantiate DB
$database = new Database();
$db = $database->connect();


$data = json_decode(file_get_contents("php://input"));

if ($data->type === "book") {
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
if ($data->type === "disc") {
    //* Create disc product
}
if ($data->type === "furniture") {
    //* Create furniture product
}
