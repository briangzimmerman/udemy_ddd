<?php
require_once(dirname(__DIR__) . '/Entities/Order.php');
require_once(dirname(__DIR__) . '/Entities/Customer.php');
require_once(dirname(__DIR__) . '/Repos/OrderRepo.php');
require_once(dirname(__DIR__) . '/Collections/ProductCollection.php');

class OrderService
{
    private $_orderRepo;
    
    public function __construct(OrderRepo $orderRepo)
    {
        $this->_orderRepo = $orderRepo;
    }

    public function placeOrder(Customer $cust, ProductCollection $cart)
    {
        $order   = new Order($cart, new DatetimeImmutable(), $cust->getId());
        $orderId = $this->_orderRepo->saveOrder($order);
        
        return $order->setId($orderId);
    }

    public function getCustomerOrders(int $custId)
    {
        return $this->_orderRepo->getCustomerOrders($custId);
    }
}