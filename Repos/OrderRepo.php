<?php
require_once(dirname(__DIR__) . '/Entities/Order.php');

class OrderRepo 
{
    private $_instanceStorage = [];
    private $_orderId         = 1;

    public function saveOrder(Order $order)
    {
        $this->_instanceStorage[] = $order;

        return $this->_orderId++;
    }

    public function getOrder(int $id)
    {
        foreach ($this->_instanceStorage as $order) {
            if ($order->getId() === $id) {
                return $order;
            }
        }

        return null;
    }

    public function getCustomerOrders(int $custId)
    {
        return array_filter($this->_instanceStorage, function ($order) use ($custId) {
            return $order->getCustomerId() === $custId;
        });
    }
}