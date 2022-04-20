<?php

include "models/Product.php";

class Disc extends Product implements IDisc
{
    protected $size;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }


    // SET Parametre
    public function setSize($size)
    {
        $this->size = $size;
    }
    public function getSize()
    {
        return   $this->size;
    }

    public function create()
    {
        //* Create query
        $query = "INSERT INTO " . $this->table . " SET SKU = :SKU, name = :name, price = :price, size = :size";

        //* Prepare Statement
        $stmt = $this->conn->prepare($query);

        //* Clean data
        $this->SKU = htmlspecialchars(strip_tags($this->SKU));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->size = htmlspecialchars(strip_tags($this->size));

        //* Bind data
        $stmt->bindParam(":SKU", $this->SKU);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":size", $this->size);

        //* Execure query
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
