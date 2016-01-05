<?php

class Ainstainer_Contacts_Block_Adminhtml_Ainreviews extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'ainreviews';
        $this->_controller = 'adminhtml_ainreviews';
        $this->_headerText = Mage::helper('ainreviews')->__('Reviews');
        parent::__construct();
    }
}