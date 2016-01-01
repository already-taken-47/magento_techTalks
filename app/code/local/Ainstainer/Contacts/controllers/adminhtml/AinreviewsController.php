<?php

class Ainstainer_Contacts_adminhtml_AinreviewsController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction() {
        $this->_title('Ainreviews');
        $this->loadLayout();
        $this->_setActiveMenu('ainstainer_reviews');
        $this->_addContent($this->getLayout()->createBlock('ainreviews/adminhtml_ainreviews'));
        $this->renderLayout();
    }

}