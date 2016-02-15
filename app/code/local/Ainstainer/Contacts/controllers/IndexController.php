<?php

class Ainstainer_Contacts_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        $this->renderLayout();
    }

    public function saveAction() {
        $data = $this->getRequest()->getPost();
        if($data) {
            try {
                $postObject = new Varien_Object();
                $postObject->setData($data);

                $error = false;
                if (!Zend_Validate::is(trim($data['email']) , 'EmailAddress')) {
                    $error = true;
                }
                if (!Zend_Validate::is(trim($data['name']) , 'NotEmpty')) {
                    $error = true;
                }
                if (!Zend_Validate::is(trim($data['phone']) , 'NotEmpty')) {
                    $error = true;
                }
                if (!Zend_Validate::is(trim($data['description']) , 'NotEmpty')) {
                    $error = true;
                }
                if ($error) {
                    throw new Exception();
                }

                $data['timestamp'] = Mage::getModel('core/date')->timestamp();
                Mage::getModel('aincontacts/ainreview')
                    ->setData($data)
                    ->save();
                Mage::getSingleton('customer/session')
                    ->addSuccess(Mage::helper('ainreviews')
                        ->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.'));
                $this->_redirect('contactus/index/index');

            } catch(Exception $e) {
                Mage::getSingleton('customer/session')
                    ->addError(Mage::helper('ainreviews')
                    ->__('Unable to submit your request. Please, try again later'));
                $this->_redirect('contactus/index/index');
                return;
            }
        }
        else {
            $this->_redirect('contactus/index/index');
            return;
        }
    }

}