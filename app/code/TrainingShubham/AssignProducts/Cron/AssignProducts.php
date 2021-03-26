<?php


namespace TrainingShubham\AssignProducts\Cron;


use Magento\Catalog\Api\CategoryLinkManagementInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class AssignProducts
{

    protected $collectionFactory;
    protected $_date;
    protected $categoryLinkManagement;

    public function __construct(CollectionFactory $collectionFactory, TimezoneInterface $date, CategoryLinkManagementInterface $categoryLinkManagement)
    {
        $this->collectionFactory = $collectionFactory;
        $this->_date = $date;
        $this->categoryLinkManagement = $categoryLinkManagement;
    }

    public function execute()
    {
        $this->assignProductsToCategory();
    }

    public function assignProductsToCategory()
    {
        $categoryId = array(41);
        $today = $this->_date->date()->format('Y-m-d H:i:s');
        $fromdate = date('Y-m-d H:i:s', strtotime('-3 days'));

        $productCollection = $this->collectionFactory->create();
        $productCollection->addAttributeToFilter('created_at', array(
            'from'  => $fromdate,
            'to'    => $today
        ));

        $productCollection->getSelect()->__toString();


        foreach ($productCollection as $product){
            $this->categoryLinkManagement->assignProductToCategories(
                    $product->getSku(),
                    $categoryId
                );
        }
        return true;
    }
}