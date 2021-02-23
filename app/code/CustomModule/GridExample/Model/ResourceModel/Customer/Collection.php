<?php


namespace CustomModule\GridExample\Model\ResourceModel\Customer;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('CustomModule\GridExample\Model\Customer', 'CustomModule\GridExample\Model\ResourceModel\Customer');
    }
}