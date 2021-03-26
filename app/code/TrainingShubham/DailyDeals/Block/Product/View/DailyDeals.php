<?php


namespace TrainingShubham\DailyDeals\Block\Product\View;


use Magento\Framework\View\Element\Template;
use TrainingShubham\DailyDeals\Helper\Data;

class DailyDeals extends Template
{
    protected $helper;

    public function __construct(Template\Context $context,Data $helper, array $data = [])
    {
        parent::__construct($context, $data);
        $this->helper = $helper;
    }

    public function getDealStatus()
    {
        $productCollection = $this->helper->getProductCollection();
        foreach ($productCollection as $product)
        {
            $data =$product->getData();
            return $data['deal_status'];
        }
    }


    public function getDealEndData()
    {
        $productCollection = $this->helper->getProductCollection();
        foreach ($productCollection as $product)
        {
            $data =$product->getData();
            return $data['deal_end'];
        }
    }


}