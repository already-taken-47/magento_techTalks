<?php

class Kir_Giftregistry_Block_Adminhtml_Registries extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() {
        $this->_controller = 'adminhtml_registries';
        $this->_blockGroup = 'kir_giftregistry';
        $this->_headerText = Mage::helper('kir_giftregistry')->__('Gift Registry Manager');
        parent::__construct();
    }
}