<?php


namespace CustomModule\News\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Allnews extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /*
     * Define Main Table.
     *
     */
    protected function _construct()
    {
        $this->_init('custommodule_news', 'news_id');
    }
}