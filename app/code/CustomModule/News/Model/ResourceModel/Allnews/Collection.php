<?php


namespace CustomModule\News\Model\ResourceModel\Allnews;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'news_id';
    protected $_eventPrefix = 'news_allnews_collection';
    protected $_eventObject = 'allnews_collection';

    /*
     * Define Model and Resource Model
     */
    protected function _construct()
    {
        $this->_init('CustomModule\News\Model\Allnews', 'CustomModule\News\Model\ResourceModel\Allnews');
    }
}