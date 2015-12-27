<?php

$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();
$installer->addAttributeToGroup('catalog_product', '4', 'General', 'slide_id');
$installer->endSetup();