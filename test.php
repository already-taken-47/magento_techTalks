<?php
require_once 'app/Mage.php';

Mage::app();
//$customers = Mage::getModel('customer/customer')->getCollection()
//    ->addAttributeToSelect('*');
//$customers = Mage::getModel('customer/customer')->getCollection()
//->addAttributeToSelect('country');

//foreach($customers as $customer) {
//    var_dump($customer->getData());
//    var_dump($customer->getAttributecode());
//}

//$attributes = Mage::getModel('customer/customer')->getAttributes();
//foreach($attributes as $attribute) {
//    var_dump($attribute->getId());
//    var_dump($attribute->getStoreLabel());
//}
//SE

$customers = Mage::getResourceModel('customer/customer_collection');

foreach ($customers as $customer) {

    // customer object
    $customer = Mage::getModel('customer/customer')->load($customer->getId());
    $address = Mage::getModel('customer/address');
    var_dump($customer->getData());
//    if ($default_shipping_id = $customer->getDefaultShipping()) {
//        $address->load($default_shipping_id);
//    } else {
//        $address
//            ->setCustomerId($customer->getId())
//            ->setIsDefaultShipping('1')
//            ->setSaveInAddressBook('1')
//        ;
//        $address_arr = $address->getData();
//
//        // country
//        if ( !isset($address_arr['country_id']) ) {
//
//            $address->setCountryId('United States');
//
//            try {
//                $address->save();
//                fwrite(STDOUT, '++ COUNTRY UPDATED FOR ' . $customer->getId() . "\n");
//            } catch(Exception $e) {
//                error_log(json_encode($e->getMessage()));
//            }
//        }
//    }

}