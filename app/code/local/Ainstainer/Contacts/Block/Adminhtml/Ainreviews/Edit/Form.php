<?php

class Ainstainer_Contacts_Block_Adminhtml_Ainreviews_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        if (Mage::registry('review_data'))
        {
            $data = Mage::registry('review_data')->getData();
        }
        else
        {
            $data = array();
        }

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ));

        $form->setUseContainer(true);

        $this->setForm($form);

        $fieldset = $form->addFieldset('review_form', array(
            'legend' => Mage::helper('ainreviews')->__('Review Information')
        ));

        $fieldset->addField('name', 'text', array(
            'label'     => Mage::helper('ainreviews')->__('Reviewer Name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'name'
        ));

        $fieldset->addField('email', 'text', array(
            'label'     => Mage::helper('ainreviews')->__('Reviewer Email'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'email'
        ));

        $fieldset->addField('phone', 'text', array(
            'label'     => Mage::helper('ainreviews')->__('Reviewer Phone'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'phone'
        ));

        $fieldset->addField('description', 'textarea', array(
            'label'     => Mage::helper('ainreviews')->__('Reviewer description'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'description'
        ));

        $form->setValues($data);

        return parent::_prepareForm();
    }
}