<?php
include_once "../../abstracts/Base.php";
include_once "../../interfaces/IBook.php"; 

class Book extends Base implements IBook
{ 
    protected $weight;

    // SET Parametres
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function create()
    {
        //* Create query
        $query = "INSERT INTO " . $this->table . " SET SKU = :SKU, name = :name, price = :price, weight = :weight, productType = :productType";

        //* Prepare Statement
        $stmt = $this->conn->prepare($query);

        //* Clean data
        $this->SKU = htmlspecialchars(strip_tags($this->SKU));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->weight = htmlspecialchars(strip_tags($this->weight));
        $this->productType = htmlspecialchars(strip_tags($this->productType));

        //* Bind data
        $stmt->bindParam(":SKU", $this->SKU);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":weight", $this->weight);
        $stmt->bindParam(":productType", $this->productType);

        //* Execure query
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
