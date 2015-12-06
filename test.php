<?php
require_once 'app/Mage.php';

Mage::app();

$products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect( array('name', 'price') )
            ->addFieldToFilter( 'price', array( 'lt' => 550 ) );
//echo $product->getDescription();
foreach($products as $product) {
    var_dump( $product->getName() );
    var_dump( $product->getPrice() );
}
//echo $product->getData('url_key');
//echo $product->getUrlKey();
//echo $product->getDescription();
//$product->setData('meta_title', 'updated')->save();

//echo $product->delete();