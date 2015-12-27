<?php
$productCollection = Mage::getModel('catalog/product')->getCollection();
$counter = 0;
foreach($productCollection as $product)
{
    $counter++;
    $product = Mage::getModel('catalog/product')
        ->load($product
        ->getEntityId());
    $product->setData('slide_id', $counter)
        ->getResource()
        ->saveAttribute($product, 'slide_id');
}