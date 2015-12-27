<?php

class Ainstainer_Homepage_Block_Slider extends Mage_Core_Block_Template {

    public function getActiveSlides() {
        return Mage::getModel('homepage/slider')
            ->getCollection()
            ->addFieldToFilter('status', true)
            ->getData();
    }
}