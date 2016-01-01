<?php

class Ainstainer_Contacts_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction() {
        $data = $this->getRequest()->getPost();
        $data['timestamp'] = Mage::getModel('core/date')->timestamp();
        Mage::getModel('aincontacts/ainreview')
            ->setData($data)
            ->save();
        $this->_redirect('contactus/index/index');
    }

}