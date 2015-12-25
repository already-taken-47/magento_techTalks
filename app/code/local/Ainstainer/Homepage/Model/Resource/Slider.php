<?php

class Ainstainer_Homepage_Model_Resource_Slider extends Mage_Core_Model_Resource_Db_Abstract {

    protected function _construct()
    {
        $this->_init('homepage/slider', 'slide_id');
    }

}