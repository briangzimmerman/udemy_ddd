<?php

// Value obj
class CreditCard
{
    private $_number;
    private $_expMonth;
    private $_expYear;
    private $_cvn;
    private $_id;
    private static $_nextId = 1;

    public function __construct(string $number, int $expMonth, int $expYear, string $cvn)
    {
        $this->_number   = $number;
        $this->_expMonth = $expMonth;
        $this->_expYear  = $expYear;
        $this->_cvn      = $cvn;
        $this->_id       = self::$_nextId++;

    }

    public function getNumber()
    {
        return $this->_number;
    }

    public function getExpMonth()
    {
        return $this->_expMonth;
    }

    public function getExpYear()
    {
        return $this->_expYear;
    }

    public function getCvn()
    {
        return $this->_cvn;
    }

    public function getId()
    {
        return $this->_id;
    }
}