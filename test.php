<?php
require_once 'app/Mage.php';

Mage::app();
$user_name = Mage::helper('contacts/data')->getUserName();
var_dump($user_name);