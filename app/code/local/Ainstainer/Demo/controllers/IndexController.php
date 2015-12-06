<?php

class Ainstainer_Demo_IndexController extends Mage_Core_Controller_Front_Action {

    public function sayHelloAction() {
//        var_dump( $this->getRequest()->getParams() );
        $this->loadLayout();
//        $this->renderLayout();
//        print_r( $this->getLayout()->getUpdate()->getHandles() );
        header('Content type: text-xml');
        die($this->getLayout()->getNode()->asXML());
    }

    public function sayHelloPostAction() {

    }

    public function indexAction() {
//        echo 'default action';
        var_dump( $this->getRequest()->getParams() );
    }



}