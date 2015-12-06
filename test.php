<?php
require_once 'app/Mage.php';

Mage::app();
$product = Mage::getModel('demo/product');
$product->sayHello();