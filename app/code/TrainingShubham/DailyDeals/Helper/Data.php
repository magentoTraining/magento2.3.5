<?php


namespace TrainingShubham\DailyDeals\Helper;


use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    protected $productCollectionFactory;

    public function __construct(Context $context, CollectionFactory $productCollectionFactory)
    {
        parent::__construct($context);
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function getProductCollection()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
//        $collection->addAttributeToFilter('deal_status', array('eq' => 1));
        return $collection;
    }
}