<?php


namespace TrainingShubham\OrderProcessing\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use TrainingShubham\OrderProcessing\Helper\Data;

class ApplyAdditionalFee implements ObserverInterface
{
    protected $helper;

    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if($this->helper->isEnable() && $this->helper->isFeeApply())
        {
            $item = $observer->getEvent()->getData('quote_item');
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
            $product = $item->getProduct();
            $percentageOff = $this->helper->getOrderProcessingFee();
            $originalPrice = $product->getFinalPrice();
            $additionalPrice = $originalPrice * ($percentageOff/100);
            $price = $originalPrice + $additionalPrice;
            $item->setCustomPrice($price);
            $item->setOriginalCustomPrice($price);
            $item->getProduct()->setIsSuperMode(true);
        }
    }
}