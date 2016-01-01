<?php

class Ainstainer_Contacts_Block_Adminhtml_Ainreviews_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct() {
        parent::__construct();
        $this->setId('ainreviews_grid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('aincontacts/ainreview')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {

        $this->addColumn('id', array(
            'header'    => 'ID',
            'align'     => 'left',
            'index'     => 'review_id',
        ));


        $this->addColumn('name', array(
            'header'    => 'Name',
            'align'     =>'left',
            'index'     => 'name',
        ));

        $this->addColumn('email', array(
            'header'    => 'E-mail',
            'align'     => 'left',
            'index'     => 'email',
        ));

        $this->addColumn('phone', array(
            'header'    => 'Phone',
            'align'     => 'left',
            'index'     => 'phone',
        ));

        $this->addColumn('description', array(
            'header'    => 'Description',
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'description',
        ));

        $this->addColumn('date', array(
            'header'    => 'Created at',
            'align'     => 'left',
            'index'     => 'timestamp',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}