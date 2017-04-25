<?php
require_once(Mage::getModuleDir('controllers','Mage_Customer').DS.'AccountController.php');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.04.2017
 * Time: 16:08
 */
class Ainstainer_Category_AccountController extends Mage_Customer_AccountController
{
    public function logoutAction()
    {
        $session = $this->_getSession();
        $session->logout()->renewSession();
        $category = Mage::getResourceModel('catalog/category_collection')
            ->setStore(Mage::app()->getStore()->getId())
            ->addAttributeToFilter('url_key', 'asd')
            ->getFirstItem();

        if (Mage::getStoreConfigFlag(Mage_Customer_Helper_Data::XML_PATH_CUSTOMER_STARTUP_REDIRECT_TO_DASHBOARD)) {
            $session->setBeforeAuthUrl($category->getUrl());
        } else {
            $session->setBeforeAuthUrl($category->getUrl());
        }
        $this->_redirect('*/*/logoutSuccess');
    }
}