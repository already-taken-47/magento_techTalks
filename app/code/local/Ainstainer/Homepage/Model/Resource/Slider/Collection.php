<?php
class Ainstainer_Homepage_Model_Resource_Slider_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    protected function _construct()
    {
        $this->_init('homepage/slider');
    }

    public function ActiveSlidesQuery() {
        return $this->addFieldToFilter('status', true)
            ->setOrder('position', 'ASC');
    }



}