<?php
include_once "interfaces/IProduct.php"; 

 abstract class Product implements IProduct
{

    private $conn;

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
    
    public static function readAll()
    {
 
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        echo "Read";

        return $stmt;
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

    abstract public function create();
}
