<?php
require_once(dirname(__DIR__) . '/Collections/ProductCollection.php');

class Order
{
    private $_items;
    private $_placedAt;
    private $_placedByCustomerId;
    private $_id;

    public function __construct(ProductCollection $items, DatetimeImmutable $placedAt, int $custId, int $id = null)
    {
        $this->_items              = $items;
        $this->_placedAt           = $placedAt;
        $this->_placedByCustomerId = $custId;
        $this->_id                 = $id;
    }

    public function getItems()
    {
        return $this->_items;
    }

    public function getTotal()
    {
        return $this->_items->getTotalCost();
    }

    public function getPlacedAt()
    {
        return $this->_placedAt;
    }

    public function getCustomerId()
    {
        return $this->_placedByCustomerId;
    }

    public function setId(int $id)
    {
        if ($this->_id) {
            throw new Exception('Id is alread set');
        }

        $this->_id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }
}