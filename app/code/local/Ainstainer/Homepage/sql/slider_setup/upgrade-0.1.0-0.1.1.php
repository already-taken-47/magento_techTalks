<?php
$data = array(
    'type'      => 'int',
    'input'     => 'select',
    'global'    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'required'  => false,
    'user_defined' => true,
    'searchable' => false,
    'filterable' => false,
    'comparable' => false,
    'visible_on_front' => true,
    'unique' => true,
    'used_in_product_listing' => true,
    'label' => 'Homepage Slide'
);

$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();
$installer->addAttribute('catalog_product', 'slide_id', $data);

$installer->endSetup();