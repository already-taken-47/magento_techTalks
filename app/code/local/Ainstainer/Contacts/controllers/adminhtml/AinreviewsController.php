<?php

class Ainstainer_Contacts_adminhtml_AinreviewsController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction() {
        $this->_title($this->__('Ainreviews'));
        $this->loadLayout();
        $this->_setActiveMenu('ainstainer_reviews');
        $this->_addContent($this->getLayout()->createBlock('ainreviews/adminhtml_ainreviews'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id', null);
        $model = Mage::getModel('aincontacts/ainreview');
        if ($id) {
            $model->load((int) $id);

            if ($model->getId()) {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if ($data) {
                    $model->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ainreviews')->__('Review does not exists'));
                $this->_redirect('*/*/');
            }
        }
        Mage::register('review_data', $model);

        $this->_title($this->__('Review'))->_title($this->__('Edit Review'));

        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

        $this->_addContent($this->getLayout()->createBlock('ainreviews/adminhtml_ainreviews_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost())
        {
            $model = Mage::getModel('aincontacts/ainreview');
            $id = $this->getRequest()->getParam('id');

            foreach ($data as $key => $value)
            {
                if (is_array($value))
                {
                    $data[$key] = implode(',',$this->getRequest()->getParam($key));
                }
            }

            if ($id) {
                $model->load($id);
            }
            $model->setData($data);

            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try {
                if ($id) {
                    $model->setId($id);
                }
                $model->save();

                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('ainreviews')->__('Error saving review'));
                }

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ainreviews')->__('Review was successfully saved.'));

                Mage::getSingleton('adminhtml/session')->setFormData(false);

                // The following line decides if it is a "save" or "save and continue"
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }

            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }

            return;
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ainreviews')->__('No data found to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $model = Mage::getModel('aincontacts/ainreview');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ainreviews')->__('The review has been deleted.'));
                $this->_redirect('*/*/');
                return;
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find the review to delete.'));
        $this->_redirect('*/*/');
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

}