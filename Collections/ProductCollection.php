<?php
require_once(dirname(__DIR__) . '/Entities/Product.php');

class ProductCollection
{
    private $_products = [];

    public function hasProduct(Product $product)
    {
        return isset($this->_products[$product->getSku()]);
    }

    public function addProduct(Product $product, int $quantity)
    {
        if (!isset($this->_products[$product->getSku()])) {
            $this->_products[$product->getSku()] = [
                'product'  => $product,
                'quantity' => 0
            ];
        }

        $this->_products[$product->getSku()]['quantity'] += $quantity;
    }

    public function removeProduct(Product $product, int $quantity)
    {
        if (!isset($this->_product[$product->getSku()])) {
            return;
        }

        if ($quantity >= $this->_products[$product->getSku()]) {
            unset($this->_products[$product->getSku()]);
        } else {
            $this->_products[$product->getSku()] -= $quantity;
        }
    }

    public function removeAllOfProduct(Product $product)
    {
        unset($this->_products[$product->getSku()]);
    }

    public function getTotalCost()
    {
        $sum = 0;

        foreach ($this->_products as $productAndQty) {
            $sum += $productAndQty['product']->getPrice() * $productAndQty['quantity'];
        }

        return $sum;
    }
}