<?php


namespace CustomModule\GridExample\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Customer extends AbstractDb
{
	public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
	{
		patrent::__construct($context);
	}

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('custommodule_gridexample_formexample', 'customer_id');
    }
}