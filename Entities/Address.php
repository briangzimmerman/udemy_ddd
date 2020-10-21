<?php

// Value object
class Address
{
    private $_street1;
    private $_street2;
    private $_city;
    private $_state;
    private $_zip;

    public function __construct(string $street1, string $street2, string $city, string $state, string $zip)
    {
        $this->_steet1 = $street1;
        $this->_steet2 = $street2;
        $this->_city   = $city;
        $this->_state  = $state;
        $this->_zip    = $zip;
    }

    public function getStreet1()
    {
        return $this->_street1;
    }

    public function getStreet2()
    {
        return $this->_street2;
    }

    public function getCity()
    {
        return $this->_city;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function getZip()
    {
        return $this->_zip;
    }
}