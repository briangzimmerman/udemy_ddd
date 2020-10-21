<?php

class Product
{
    private $_sku;
    private $_price;
    private $_stock;
    private $_title;

    public function __construct(string $sku, int $price, int $stock, string $title)
    {
        $this->_sku   = $sku;
        $this->_price = $price;
        $this->_stock = $stock;
        $this->_title = $title;
    }

    public function getSku()
    {
        return $this->_sku;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function getStock()
    {
        return $this->_stock;
    }

    public function getTitle()
    {
        return $this->_title;
    }
}