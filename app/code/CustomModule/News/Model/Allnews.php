<?php


namespace CustomModule\News\Model;


use Magento\Framework\Model\AbstractModel;

class Allnews extends AbstractModel
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    const CACHE_TAG = 'custommodule_news';

    protected $_cacheTag = self::CACHE_TAG;

    protected function _construct()
    {
        $this->_init('CustomModule\News\Model\ResourceModel\Allnews');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLE => __('Enabled'), self::STATUS_DISABLE => __('Disabled')];
    }
}