<?php

class Ainstainer_Homepage_Block_Banners extends Mage_Core_Block_Template {

    /**
     * @return array of mixed banners paths
     */
    public function getBanners() {
        $banner_path = Mage::getBaseUrl('media') . 'homepage/banners/';
        $banners = array( 'tf-fb.png', 'tf-sp.png', 'tf-tf.png' );
        array_walk( $banners, function(&$item) use ($banner_path) { $item = $banner_path . $item;} );
        shuffle( $banners );
        return $banners;
    }

}