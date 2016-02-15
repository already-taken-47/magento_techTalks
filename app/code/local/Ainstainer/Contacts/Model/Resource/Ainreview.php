<?php

class Ainstainer_Contacts_Model_Resource_Ainreview extends Mage_Core_Model_Resource_Db_Abstract
{

    protected function _construct() {
        $this->_init('aincontacts/ainreview', 'review_id');
    }

}