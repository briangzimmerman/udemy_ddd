<?php
require_once(__DIR__ . '/Collections/ProductCollection.php');
require_once(__DIR__ . '/Entities/Address.php');
require_once(__DIR__ . '/Entities/CreditCard.php');
require_once(__DIR__ . '/Entities/Customer.php');
require_once(__DIR__ . '/Entities/Order.php');
require_once(__DIR__ . '/Entities/Product.php');
require_once(__DIR__ . '/Repos/OrderRepo.php');
require_once(__DIR__ . '/Service/OrderService.php');

// Should make factories for this stuff

//--------------------------------------
// Addresses

$address1 = new Address(
    'Address 1 Street 1',
    'Address 1 Street 2',
    'Address 1 City',
    'Address 1 State',
    'Address 1 Zip'
);

$address2 = new Address(
    'Address 1 Street 1',
    'Address 1 Street 2',
    'Address 1 City',
    'Address 1 State',
    'Address 1 Zip'
);

//----------------------------------------
// Credit Cards

$cc1 = new CreditCard('12345', 3, 2021, 'cvn');
$cc2 = new CreditCard('6789', 5, 2021, 'cvn');

//-----------------------------------------
// Customers

$cust1 = new Customer();
$cust1->setAddress($address1)->setCreditCard($cc1)->setId(1);

$cust2 = new Customer();
$cust2->setAddress($address2)->setCreditCard($cc2)->setId(2);

//------------------------------------------
// Products

$product1 = new Product('sku1', 500, 5, 'Product 1');
$product2 = new Product('sku2', 1000, 8, 'Product 2');

//------------------------------------------
// Carts

$cart1 = new ProductCollection();
$cart1->addProduct($product1, 2);
$cart1->addProduct($product2, 1);

$cart2 = new ProductCollection();
$cart2->addProduct($product1, 5);
$cart2->addProduct($product2, 3);

//--------------------------------------------
// OrderService;

$orderService = new OrderService(new OrderRepo());

//--------------------------------------------

$orderService->placeOrder($cust1, $cart1);
$orderService->placeOrder($cust2, $cart2);

//---------------------------------------------

echo "Customer 1:\n";
echo "\tAddress Street 1: " . $cust1->getAddress()->getStreet1() . "\n";
echo "\tCC num: " . $cust1->getCreditCard()->getNumber() . "\n";
$orders = $orderService->getCustomerOrders($cust1->getId());
echo "\tTotal orders: " . count($orders) . "\n";
foreach ($orders as $order) {
    echo "\tOrder total: $" . $order->getTotal() / 100 . "\n";
}

echo "\nCustomer 2:\n";
echo "\tAddress Street 1: " . $cust2->getAddress()->getStreet1() . "\n";
echo "\tCC num: " . $cust2->getCreditCard()->getNumber() . "\n";
$orders = $orderService->getCustomerOrders($cust2->getId());
echo "\tTotal orders: " . count($orders) . "\n";
foreach ($orders as $order) {
    echo "\tOrder total: $" . $order->getTotal() / 100 . "\n";
}