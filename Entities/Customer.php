<?php
require_once(__DIR__ . '/Address.php');
require_once(__DIR__ . '/CreditCard.php');

class Customer
{
    private $_creditCard;
    private $_address;
    private $_id;

    public function setAddress(Address $address)
    {
        $this->_address = $address;

        return $this;
    }

    public function getAddress()
    {
        return $this->_address;
    }

    public function setCreditCard(CreditCard $cc)
    {
        $this->_creditCard = $cc;

        return $this;
    }

    public function getCreditCard()
    {
        return $this->_creditCard;
    }

    public function setId(int $id)
    {
        $this->_id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }
}