<?php
include_once "interfaces/IProduct.php"; 

 abstract class Base implements IProduct
{

    private $conn;

    protected $table = 'products';
    protected $SKU;
    protected $name;
    protected $price;
    protected $productType;
 
 
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

    public function setProductType($productType){
        return $this->productType = $productType;
    }
 
     
    // Read Data

    abstract public function create();
}
