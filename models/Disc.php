<?php

include_once "../../abstracts/Base.php";
include_once "../../interfaces/IDisc.php";

class Disc extends Base implements IDisc
{
    protected $size;
 

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
        $query = "INSERT INTO " . $this->table . " SET SKU = :SKU, name = :name, price = :price, size = :size, productType = :productType";

        //* Prepare Statement
        $stmt = $this->conn->prepare($query);

        //* Clean data
        $this->SKU = htmlspecialchars(strip_tags($this->SKU));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->size = htmlspecialchars(strip_tags($this->size));
        $this->productType = htmlspecialchars(strip_tags($this->productType));

        //* Bind data
        $stmt->bindParam(":SKU", $this->SKU);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":size", $this->size);
        $stmt->bindParam(":productType", $this->productType);

        //* Execure query
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
