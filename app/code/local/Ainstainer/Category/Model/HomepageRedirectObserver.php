<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.04.2017
 * Time: 12:52
 */
class Ainstainer_Category_Model_HomepageRedirectObserver
{
    public function redirect($observer)
    {
        /** @var Mage_Core_Controller_Front_Action $controller */
        $controller = $observer->getData('controller_action');
        if ($this->_isRedirect($controller)) {
            $controller->getResponse()->setRedirect(Mage::getBaseUrl());
        }
    }

    /**
     * @param Mage_Core_Controller_Front_Action $controller
     * @return bool
     */
    public function _isRedirect($controller)
    {
        $isRedirect = false;
        /** @var Mage_Core_Controller_Request_Http $request */
        $request = $controller->getRequest();
        $pageId = $request->getParam('page_id');

        if ($pageId) {
            /** @var Mage_Cms_Model_Page $page */
            $page = Mage::getModel('cms/page')->load($pageId);
        }

        return ($controller instanceof Mage_Cms_PageController)
            && $page->getIdentifier() == 'home';
    }

    public function checkPaymentAndMagentoVersion(Varien_Event_Observer $observer)
    {
        if ((float) Mage::getVersion() > 1.4 && Mage::getStoreConfig('payment/ccsave/active')) {
            Mage::getConfig()->setNode('global/helpers/payment/rewrite/data', 'Ainstainer_Category_Helper_Data');
        }
    }
}