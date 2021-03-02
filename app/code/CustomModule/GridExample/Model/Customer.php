<?php


namespace CustomModule\GridExample\Model;


use Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel
{
    /*
     * Cache tag
     */
    const CACHE_TAG = 'custommodule_gridexample';

    protected $_cacheTag = self::CACHE_TAG;

    /*
     * Customer Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('CustomModule\GridExample\Model\ResourceModel\Customer');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG .'_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}