<?php

class Ainstainer_Homepage_Block_Homepage extends Mage_Core_Block_Template {

    public function __construct(){
        parent::__construct();
        $this->setPopularProductsCollection();
    }

    public function setPopularProductsCollection() {
        $storeId = Mage::app()->getStore()->getId();
        $products = Mage::getResourceModel('reports/product_collection')
            ->addOrderedQty()
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image'))
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addViewsCount();
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);

        $products->setPageSize(5)->setCurPage(1);
        $this->setProductCollection($products);
    }

}