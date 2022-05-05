<?php

include_once "../../abstracts/Base.php";
include_once "../../interfaces/IFurniture.php";

class Furniture extends Base implements IFurniture
{
    private $dimentions;

    public function setDimentions($dimentions)
    {
        $this->dimentions = $dimentions;
    }

    public function getDimentions()
    {
        return $this->dimentions;
    }

    public function create()
    {
        //* Create query
        $query = "INSERT INTO " . $this->table . " SET SKU = :SKU, name = :name, price = :price, 
        dimentions = :dimentions, productType = :productType";

        //* Prepare Statement
        $stmt = $this->conn->prepare($query);

        //* Clean data
        $this->SKU = htmlspecialchars(strip_tags($this->SKU));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->dimentions = htmlspecialchars(strip_tags($this->dimentions)); 
        $this->productType = htmlspecialchars(strip_tags($this->productType)); 

        //* Bind data
        $stmt->bindParam(":SKU", $this->SKU);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":dimentions", $this->dimentions); 
        $stmt->bindParam(":productType", $this->productType); 

        //* Execure query
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
