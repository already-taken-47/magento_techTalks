<?php

class Kir_Giftregistry_Model_Mysql4_Entity_Collection extends
    Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        $this->_init('kir_giftregistry/entity');
        parent::_construct();
    }

}