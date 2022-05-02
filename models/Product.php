<?php
include_once "abstracts/Base.php";

class Product extends Base 
{
         

    public function __construct($db)
    {
        $this->conn = $db;
    }


  // Get categories
  public function readAll()
  {
    // Create query
    $query = 'SELECT
        id,
        SKU,
        name, 
        price,
        size,
        weight,
        dimentions
      FROM
        ' . $this->table . '
      ORDER BY
        id DESC';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }
      public function create(){

    }


}