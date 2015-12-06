<?php
require_once 'app/Mage.php';

Mage::app();

$product = Mage::getModel('demo/product');
$product->sayHello();
//$product = Mage::getModel('demo/product');
//$product->sayHello();
//$helper = Mage::Helper('demo/customer');
//Mage::Helper('demo')->sayWhat();
//$helper->sayHi();
$cat = Mage::getModel('catalog/category')->load(3);

//var_dump($cat->getChildren());
$customer_data = Mage::Helper('customer/data');
var_dump($customer_data->getCustomerName());

