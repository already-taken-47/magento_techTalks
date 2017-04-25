<?php


class Ainstainer_Category_Model_Observer
{
    /**
     * @param $observer
     * @return $this
     */
    public function setDuplicatedUrlKey($observer)
    {
        /** @var Mage_Catalog_Model_Category $category */
        $category = $observer->getEvent()->getCategory();
        if (($urlKey = $category->getUrlKey())) {
            try {
                $rootId = $this->_getCategoryRootId($category);

                /** @var Mage_Catalog_Model_Resource_Category_Collection $collection */
                $collection = $this->_getCategoryCollection()
                    ->addAttributeToFilter('url_key', $urlKey)
                    ->addFieldToFilter('path', ['like' => "1/{$rootId}/%"]);

                if (count($collection) > 0) {
                    if (count($collection) == 1
                        && $collection->getFirstItem()->getId() == $category->getId()) {
                        return $this;
                    }

                    $category->setUrlKey(
                        $this->_getNewUrlKey($category)
                    );
                }
            }
            catch (\Exception $e) {
                Mage::log($e->getMessage());
                return;
            }

        }

        return $this;
    }

    /**
     * //todo Does we need this?
     *
     * @param $observer
     */
    public function saveDefaultStoreCategoryUrlKey($observer)
    {
        /** @var Mage_Catalog_Model_Category $category */
        $category = $observer->getEvent()->getCategory();

        if ($category->getStoreId() == Mage_Core_Model_App::ADMIN_STORE_ID) {
            return;
        }

        /* @var $resource Mage_Catalog_Model_Resource_Category */
        $resource = Mage::getModel('catalog/category')->getResource();

        $defaultUrlKey = $resource->getAttributeRawValue(
            $category->getId(),
            'url_key',
            Mage_Core_Model_App::ADMIN_STORE_ID
        );

        if (!$defaultUrlKey) {
            $categoryMock = new Varien_Object([
                    'entity_id' => $category->getId(),
                    'url_key'   => $category->getUrlKey(),
                    'store_id'  => Mage_Core_Model_App::ADMIN_STORE_ID]
            );

            try {
                $resource->saveAttribute($categoryMock, 'url_key');
            }
            catch (\Exception $e) {
                Mage::log($e->getMessage());
                return;
            }
        }
    }

    /**
     * @param Mage_Catalog_Model_Category $category
     * @return mixed
     */
    protected function _getCategoryRootId($category) {
        $root = $category->getPathIds();

        return $root[1];
    }

    /**
     * @param Mage_Catalog_Model_Category $category
     * @return string
     */
    protected function _getNewUrlKey($category)
    {
        $cats = $this->_getCategoryCollection()
            ->addAttributeToFilter('url_key', ['like' => $category->getUrlKey() . '%'])
            ->addFieldToFilter('path', ['like' => "1/{$this->_getCategoryRootId($category)}/%"]);

        $catUrlKeyPieces = $this->_getUrlKeyPieces($category->getUrlKey());

        $increments = [];
        /** @var Mage_Catalog_Model_Category $cat */
        foreach ($cats as $cat) {
            $urlKeyPieces = $this->_getUrlKeyPieces($cat->getUrlKey());

            if (!count($urlKeyPieces) ||
                !isset($urlKeyPieces[1]) || !isset($urlKeyPieces[2]) || !isset($urlKeyPieces[3])) {
                continue;
            }
            else {
                if ($urlKeyPieces[1] != $catUrlKeyPieces[1]) {
                    continue;
                }

                $increments[] = (int)$urlKeyPieces[3];
            }
        }

        $increment = (count($increments)) ? max($increments) : 0;
        $urlKey = $catUrlKeyPieces[1] . '-' . ($increment + 1);

        return $urlKey;
    }

    /**
     * $match[1] base url key
     * $match[2] increment with delimeter
     * $match[3] increment
     *
     * @param string $urlKey
     * @return array
     */
    protected function _getUrlKeyPieces($urlKey)
    {
        $match = [];
        preg_match('#^([0-9a-z/-]+?)(-([0-9]+))?(\'-\')?$#i', $urlKey, $match);

        return $match;
    }

    /**
     * @return Mage_Catalog_Model_Resource_Category_Collection
     */
    protected function _getCategoryCollection()
    {
        return Mage::getResourceModel('catalog/category_collection');
    }
}