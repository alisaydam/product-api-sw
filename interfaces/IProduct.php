<?php

// namespace ProductInterface;

interface IProduct
{
    public function getSKU();
    public function setSKU($SKU);
    public function  getName();
    public function  setName($name);
    public function  getPrice();
    public function  setPrice($price);
}
