<?php


namespace CustomModule\GridExample\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Customer extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('custommodule_gridexample_formexample', 'id');
    }
}