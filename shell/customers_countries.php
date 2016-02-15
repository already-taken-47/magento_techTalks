<?php
require_once 'abstract.php';

class Rehband_Populate_Customers_Countries extends Mage_Shell_Abstract
{
    protected $_argname = array();

    public function __construct() {
        parent::__construct();

        // Time limit to infinity
        set_time_limit(0);

        // Get command line argument named "argname"
        // Accepts multiple values (comma separated)
        if($this->getArg('argname')) {
            $this->_argname = array_merge(
                $this->_argname,
                array_map(
                    'trim',
                    explode(',', $this->getArg('argname'))
                )
            );
        }
    }

    // Shell script point of entry
    public function run() {
//        Mage::getResourceModel('customer/customer_collection');
        $customers = Mage::getModel('customer/customer')->getCollection()
        ->addAttributeToSelect('*');

        print_r($customers->getSelect());
    }

    // Usage instructions
    public function usageHelp()
    {
        return <<<USAGE
Usage:  php -f scriptname.php -- [options]

  --argname <argvalue>       Argument description

  help                   This help

USAGE;
    }
}
// Instantiate
$shell = new Rehband_Populate_Customers_Countries();

// Initiate script
$shell->run();









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