<?php
require_once 'app/Mage.php';

Mage::app();

// new demo model
$product = Mage::getModel('demo/product');
$product->sayHello();

// new demo helper
$helper = Mage::Helper('demo/customer');
Mage::Helper('demo')->sayWhat();
$helper->sayHi();

// model rewriting
$cat = Mage::getModel('catalog/category')->load(3);
var_dump($cat->getChildren());

// helper rewriting
$customer_data = Mage::Helper('customer/data');
var_dump($customer_data->getCustomerName());