<?php

class Ainstainer_Customer_Helper_Data extends Mage_Customer_Helper_Data
{

public function getCustomerName()
{
    return $this->getCustomer()->getName();
//    return 'some name';
}

}
