<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: appication/json");
header("Access-Control-Allow-Methods: POST");
header("Acces-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-Width");

include_once "config/Database.php";
include_once "abstracts/Product.php";
// require "autoload.php";

//* Instantiate DB
$database = new Database();
$db = $database->connect(); 
 

echo Product($db)::readAll();