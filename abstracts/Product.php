<?php
include "interfaces/IProduct.php";
// namespace Baseclass;

// use ProductInterface\IProduct;


abstract class Product implements IProduct
{

    protected $table = 'products';
    protected $SKU;
    protected $name;
    protected $price;


    // $mymap = [
    //     1=>'book',
    //     2=>'disc',
    //     3=>'furniture'
    //   ];
    //   $mydata = [3,3,1];
    //   var_dump(array_map(function($v) use ($mymap) {return $mymap[$v];}, $mydata));

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // SET Parametres
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }
    public function getSKU()
    {
        return $this->SKU;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    // Read Data
    public function readAll()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }


    // Create Data
    public function create()
    {
        // //* Create query
        // $query = "INSERT INTO " . $this->table . " SET SKU = :SKU, name = :name, price = :price, size = :size,
        // weight = :weight, height = :height, width = :width, length = :length";

        // //* Prepare Statement
        // $stmt = $this->conn->prepare($query);

        // //* Clean data
        // $this->SKU = htmlspecialchars(strip_tags($this->SKU));
        // $this->name = htmlspecialchars(strip_tags($this->name));
        // $this->price = htmlspecialchars(strip_tags($this->price));
        // $this->size = htmlspecialchars(strip_tags($this->size));
        // $this->weight = htmlspecialchars(strip_tags($this->weight));
        // $this->height = htmlspecialchars(strip_tags($this->height));
        // $this->width = htmlspecialchars(strip_tags($this->width));
        // $this->length = htmlspecialchars(strip_tags($this->length));

        // //* Bind data
        // $stmt->bindParam(":SKU", $this->SKU);
        // $stmt->bindParam(":name", $this->name);
        // $stmt->bindParam(":price", $this->price);
        // $stmt->bindParam(":size", $this->size);
        // $stmt->bindParam(":weight", $this->weight);
        // $stmt->bindParam(":height", $this->height);
        // $stmt->bindParam(":width", $this->width);
        // $stmt->bindParam(":length", $this->length);

        // //* Execure query
        // if ($stmt->execute()) {
        //     return true;
        // }
        // printf("Error: %s.\n", $stmt->error);
        // return false;
    }
}
