<?php

class Ainstainer_Homepage_Block_Slider extends Mage_Core_Block_Template {

    public function getProductsWithSlides() {
        $products = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('slide_id', array('notnull' => true));

        $products->getSelect()
            ->join('slider_homepage', 'at_slide_id.value = slider_homepage.slide_id',
                array('url', 'description', 'title', 'status', 'position'))
            ->where("slider_homepage.status != '0'")
            ->order('slider_homepage.position ASC');

        return $products->getData();
    }

    public function getActiveSlides() {
        return Mage::getModel('homepage/slider')->getCollection()->ActiveSlidesQuery()->getData();
    }

}