<?php
include "abstracts/Product.php";
include "interfaces/IBook.php";
// namespace Book;

// use Baseclass\Product;
// use BookInterface\IBook;

class Book extends Product implements IBook
{
    private $conn;

    protected $weight;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }


    // SET Parametre
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
        $query = "INSERT INTO " . $this->table . " SET SKU = :SKU, name = :name, price = :price, weight = :weight";

        //* Prepare Statement
        $stmt = $this->conn->prepare($query);

        //* Clean data
        $this->SKU = htmlspecialchars(strip_tags($this->SKU));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->weight = htmlspecialchars(strip_tags($this->weight));

        //* Bind data
        $stmt->bindParam(":SKU", $this->SKU);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":weight", $this->weight);

        //* Execure query
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
