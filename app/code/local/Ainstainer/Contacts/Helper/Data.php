<?php

class Ainstainer_Contacts_Helper_Data extends Mage_Contacts_Helper_Data {

    public function getUserName()
    {
        $parent_user_name = parent::getUserName();
        return ( !$parent_user_name ) ? 'Joe' : $parent_user_name;
    }

}