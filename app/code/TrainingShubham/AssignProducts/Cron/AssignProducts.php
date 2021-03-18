<?php


namespace TrainingShubham\AssignProducts\Cron;


use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class AssignProducts
{

    protected $collectionFactory;
    protected $_date;

    public function __construct(CollectionFactory $collectionFactory, TimezoneInterface $date)
    {
        $this->collectionFactory = $collectionFactory;
        $this->_date = $date;
    }

    public function execute()
    {
        $this->assignProductsToCategory();
    }

    public function assignProductsToCategory()
    {
        $today = $this->_date->date()->format('Y-m-d H:i:s');
        $fromdate = date('Y-m-d H:i:s', strtotime('-3 days'));

        $productCollection = $this->collectionFactory->create();
        $productCollection->addAttributeToFilter('created_at', array(
            'from'  => $fromdate,
            'to'    => $today
        ));

        $productCollection->getSelect()->__toString();


        foreach ($productCollection as $product){
            $this->getCategoryLinkManagement()
                 ->assignProductToCategories(
                    $product->getSku(),
                    $product->getCategoryIds()
                );
        }

        return true;

    }
    private function getCategoryLinkManagement() {

        if (null === $this->categoryLinkManagement) {
            $this->categoryLinkManagement = \Magento\Framework\App\ObjectManager::getInstance()
                ->get('Magento\Catalog\Api\CategoryLinkManagementInterface');
        }

        return $this->categoryLinkManagement;
    }
}