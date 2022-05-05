<?php
include_once "../../abstracts/Base.php";

class Product extends Base
{
  protected $products = [];


  public function setProducts($products)
  {
    $this->products = $products;
  }

  public function getProducts()
  {
    return $this->products;
  }

  // Get categories
  public function readAll()
  {
    // Create query
    $query =
      'SELECT
        id, SKU, name, price, productType, size, weight, dimentions FROM
        ' . $this->table .
      '
      ORDER BY id DESC';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function delete()
  {
    $products = implode("','", $this->products);

    $query = "DELETE FROM " . $this->table . " WHERE id IN ('" . $products . "')";

    $stmt = $this->conn->prepare($query);

    if ($stmt->execute()) {
      return true;
    }

    printf("Error: ", $stmt->error);

    return false;
  }
}
