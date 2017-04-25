<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.04.2017
 * Time: 15:21
 */
class Ainstainer_Category_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
//        die('test');
        return $this->getResponse()->setBody($this->getFullActionName());
    }
}